<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        // Fetch all roles
        $roles = Role::all();

        // Return roles as JSON
        return response()->json($roles);
    }

    /**
     * Store a newly created role.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255|unique:roles,role',
        ]);

        $role = Role::create([
            'role' => $request->role,
        ]);

        return response()->json([
            'message' => 'Role created successfully.',
            'role' => $role
        ], 201);
    }

    /**
     * Display the specified role.
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return response()->json($role);
    }

    /**
     * Update the specified role.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'role' => 'required|string|max:255|unique:roles,role,' . $id . ',role_id',
        ]);

        $role->update([
            'role' => $request->role,
        ]);

        return response()->json([
            'message' => 'Role updated successfully.',
            'role' => $role
        ]);
    }

    /**
     * Remove the specified role.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully.'
        ]);
    }
}

