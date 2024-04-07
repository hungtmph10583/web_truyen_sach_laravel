<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('permission:add user|edit user|delete user');
        view()->share('activeUserManagement', TRUE);
        view()->share('activeUser', TRUE);
    }

    public function index()
    {
        $users  = User::select(['id','name','email','status','created_at','avatar'])->paginate(20);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::select('name')->get();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = $request->validate(
            [
                'name'  => 'required|max:255',
                'email' => 'required',
                // 'avatar' => 'image|mimes:jpg,png,jpeg,gì,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ],
            // [
            //     'name.required'     => 'Enter!',
            //     'name.unique'       => 'Tên truyện đã tồn tại!',
            //     'name.max'          => 'Tên truyện không được quá 255 kí tự!',
            //     'email.required'    => 'Chọn thể loại của truyện!',
            //     'avatar.required'   => 'Tải ảnh bìa của truyện!'
            // ]
        );

        $user = new User();
        $user->fill($request->all());
        $user->status   = 1;
        $user->password = Hash::make(000000);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->storeAs('uploads/users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }else{
            $user->avatar = 'admin-theme/assets/app/media/img/users/user_black_violet.jpg';
        }
        
        $user->save();

        if ($request->has('role')) {
            $user->assignRole($request->role);
        }
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user   = User::find($id);
        $roles  = Role::get();
        if (!$user) {
            return redirect()->with('danger','The user was not found in the database');
        }
        return view('admin.user.show', compact('user', 'roles'));
    }

    public function edit($id)
    {
        $user   = User::find($id);
        $roles  = Role::get();
        if (!$user) {
            return redirect()->with('danger','The user was not found in the database');
        }
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'  => 'required|max:255',
                'email' => 'required',
                // 'avatar' => 'image|mimes:jpg,png,jpeg,gì,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ]
        );
        $user = User::find($id); 
        if (!$user) { return redirect()->route('user.index')->with('danger', 'User updated failed'); }
        if ($request->hasFile('uploadfile')) {
            $user->avatar = $request->file('uploadfile')->storeAs('uploads/users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $user->fill($request->all());
        $user->save();
        if ($request->has('role')) {
            if (!$user->roles->isEmpty()) {
                $user->syncRoles([]);
                $user->assignRole($request->role);
            }
            $user->assignRole($request->role);
        }
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) { return redirect()->route('user.index')->with('danger', 'User deteled failed'); }
        if (count($user->roles) > 0) {
            return redirect()->route('user.index')->with('danger', 'You can not delete a user that already has roles');
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deteled successfully');
    }
}
