<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware('role:Administrator');
        view()->share('activeUserManagement', TRUE);
        view()->share('activePermission', TRUE);
    }

    public function index()
    {
        // $permission = Permission::create(['name' => 'add user']);
        $permissions = Permission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        // $permission = Permission::create(['name' => 'add user']);
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name|max:255',
        ],[
            'name.required' => 'Enter permission name!',
            'name.unique'   => 'Permission name already exists!',
            'name.max'      => 'Permission names cannot exceed 255 characters!'
        ]);

        $permission = Permission::create(['name' => $request->name]);
        return redirect()->route('permission.index')->with('success','Permission created successfully');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $getData = [ 'permission' => $permission ];
        return view('admin.permission.edit', $getData);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('permissions')->ignore($id)
            ],
        ],[
            'name.required' => 'Enter permission name!',
            'name.unique'   => 'Permission name already exists!'
        ]);

        $permission = Permission::find($id);
        if (!$permission) {
            return redirect()->route('permission.index')->with('danger','Permission deleted failed');
        }
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permission.index')->with('success','Permission updated successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        /**Check this permission does not exists */
        if (!$permission) { return Redirect()->back()->with('danger', 'Permission deleted failed'); }
        /**Check permission has any roles */
        if($permission->roles()->count() > 0) {
            return redirect()->route('permission.index')->with('danger','You cannot delete a permission that has role assigned');
        }
        /**Check the permission is used by the user */
        if($permission->users()->count() > 0) {
            return redirect()->route('permission.index')->with('danger','You cannot delete a permission that has users assigned');
        }
        /**Delete permission if all conditions any met */
        $permission->delete();
        return Redirect()->back()->with('success', 'Permission deteled successfully');
    }
}
