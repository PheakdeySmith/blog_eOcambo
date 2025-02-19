<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('backend.pages.permissions.index', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully!');
    }
}
