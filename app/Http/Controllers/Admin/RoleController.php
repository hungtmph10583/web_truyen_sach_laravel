<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('role:Administrator');
        view()->share('activeUserManagement', TRUE);
        view()->share('activeRole', TRUE);
    }

    public function index()
    {
        // $role = Role::create(['name' => 'Administrator']);
        $roles = Role::withCount('users')->get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required|unique:roles,name|max:255',
            ],[
                'name.required' => 'Enter role name!',
                'name.unique'   => 'Role name already exists!',
                'name.max'      => 'Role names cannot exceed 255 characters!'
            ]);
        
        $role = Role::create(['name' => $request->name ]);
        if ($request->has('permissions')) { $role->syncPermissions($request->permissions); }
        return redirect()->route('role.index')->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)->get();
        $users = User::join("model_has_roles","model_has_roles.model_id","=","users.id")->where("model_has_roles.role_id",$id)->paginate(5);

        $getData = [
            'role'  => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
            'users' => $users,
        ];
        return view('admin.role.show', $getData);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('admin.role.edit', compact('role', 'permissions','rolePermissions'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
    
        $role = Role::find($id);
        if (!$role) {
            return redirect()->route('role.index')->with('danger','Role update failed');
        }

        $role->name = $request->name;
        $role->save();

        if($request->has('permissions')){
            $role->syncPermissions($request->permissions);
        }else{
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            if ($rolePermissions) {
                $_per = [];
                foreach ($rolePermissions as $key => $value) {
                    $item = Permission::find($value);
                    $_per[] = $item->name;
                }
                $role->revokePermissionTo($_per);
            }
        }
    
        return redirect()->route('role.index')->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        /**Check role does not exists */
        if (!$role) {
            return redirect()->route('role.index')->with('danger','Delete role failed');
        }
        /**Check role has any permissions */
        if($role->permissions()->count() > 0) {
            return redirect()->route('role.index')->with('danger','You cannot delete a role that has permissions assigned');
        }
        /**Check the role is used by the user */
        if($role->users()->count() > 0) {
            return redirect()->route('role.index')->with('danger','You cannot delete a role that has users assigned');
        }

        /** Delete all permissions of this role in the role_has_permissions table*/
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //     ->all();
        // if ($rolePermissions) {
        //     $_per = [];
        //     foreach ($rolePermissions as $key => $value) {
        //         $item = Permission::find($value);
        //         $_per[] = $item->name;
        //     }
        //     $role->revokePermissionTo($_per);
        // }
        
        /**Delete role if all conditions any met */
        $role->delete();
        return redirect()->route('role.index')->with('success','Delete role successfully');
    }

    public function destroyRoleUser($role_id, $user_id)
    {
        $role = Role::find($role_id);
        $user = User::find($user_id);
        /**Check the user does not exists */
        if (!$user) {
            return redirect()->with('danger','User role deletion failed');
        }
        /**Check the role does not exists */
        if (!$role) {
            return redirect()->with('danger','User role deletion failed');
        }
        /**Delete user's role if all conditions are met */
        $user->removeRole($role->name);
        return Redirect::back()->with('success','User role removed successfully');
    }
}
