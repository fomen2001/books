<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        if(!auth()->user()->can('role-list')){
            abort(403, 'Unauthorized action.');
        }
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        if(!auth()->user()->can('role-create')){
            abort(403, 'Unauthorized action.');
        }
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        if(!auth()->user()->can('role-create')){
            abort(403, 'Unauthorized action.');
        }
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $permissions = $request->input('permission');
        
        
        $permissions = array_map(function ($item) {
            return (int)$item;
        }, $permissions);
        
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        if(!auth()->user()->can('role-view')){
            abort(403, 'Unauthorized action.');
        }
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        if(!auth()->user()->can('role-edit')){
            abort(403, 'Unauthorized action.');
        }
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        if(!auth()->user()->can('role-edit')){
            abort(403, 'Unauthorized action.');
        }
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        // $role->syncPermissions($request->input('permission'));

        // return redirect()->route('roles.index')
        //     ->with('success', 'Role updated successfully');

        $permissions = $request->input('permission');
        
        $permissions = array_map(function ($item) {
            return (int)$item;
        }, $permissions);
        
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
         

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');

    }

    public function destroy($id)
    {
        if(!auth()->user()->can('role-delete')){
            abort(403, 'Unauthorized action.');
        }
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}