<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('backend.pages.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    // public function edit($id)
    // {
    //     $role = Role::with('permissions')->findOrFail($id);

    //     // Group permissions by module
    //     $permissions = Permission::get()->groupBy(function ($permission) {
    //         return $permission->module;
    //     });

    //     // Prepare role's assigned permission names
    //     $rolePermissions = $role->permissions->pluck('name')->toArray();

    //     return view('backend.pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    // }

    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::get()->groupBy(function ($data) {
            return $data->module;
        });
        $rolePermissions = [];
        foreach ($role->permissions as $rolePerm) {
            $rolePermissions[] = $rolePerm->name;
        }
        return view('backend.pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        // Fetch the role by ID
        $role = Role::findOrFail($id);

        // Get the permissions from the request
        $permissions = $request->input('permissions', []);

        if (!empty($permissions)) {
            // Validate the permissions
            $validPermissions = Permission::whereIn('name', $permissions)->get();

            // Check if all permissions are valid
            if ($validPermissions->count() != count($permissions)) {
                $notFoundPermissions = array_diff($permissions, $validPermissions->pluck('name')->toArray());
                return redirect()->back()->withErrors(['permissions' => 'Invalid permissions: ' . implode(', ', $notFoundPermissions)]);
            }

            // Sync the valid permissions with the role
            $role->syncPermissions($validPermissions);
        } else {
            // If no permissions are selected, remove all permissions from the role
            $role->syncPermissions([]);
        }

        return redirect()->route('roles.index', $id)->with('message', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }

    public function getPermissions($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions->pluck('id'); // Get the IDs of the assigned permissions

        return response()->json(['permissions' => $permissions]);
    }
}
