<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('log.user.action')->only(['store', 'update', 'destroy', 'addPermissionToRole' , 'givePermissionToRole']);
    }

    // Display a listing of roles
    public function index()
    {
        $roles = Role::all();
        $user = auth()->user();
        if ($user->hasPermissionTo('View')) {
            return view('role-permission.roles.index', ['roles' => $roles]);
        }else {
            return redirect()->route('home')->withErrors(['permission_error' => 'You do not have permission to access this page.']);
        }
        // return view('role-permission.roles.index', ['roles' => $roles]);
    }

    // Show the form for creating a new role
    public function create()
    {
        return view('role-permission.roles.create');
    }

    // Store a newly created role in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name',
            ],
        ]);

        DB::beginTransaction();
        try {
            Role::create([
                'name' => $request->name,
            ]);
            DB::commit();
            return redirect('roles')->with('status', 'Role Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Role creation failed: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['server_error' => 'An unexpected error occurred. Please try again later.'])->withInput();
        }
    }

    // Show the form for editing the specified role
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('role-permission.roles.edit', ['role' => $role]);
    }

    // Update the specified role in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $id,
            ],
        ]);

        $role = Role::findOrFail($id);

        DB::beginTransaction();
        try {
            $role->update([
                'name' => $request->name,
            ]);
            DB::commit();
            return redirect('roles')->with('status', 'Role Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Role update failed: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['server_error' => 'An unexpected error occurred. Please try again later.'])->withInput();
        }
    }

    // Remove the specified role from storage
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        DB::beginTransaction();
        try {
            $role->delete();
            DB::commit();
            return redirect('roles')->with('status', 'Role Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Role deletion failed: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['server_error' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    // Show the form for adding permissions to the specified role
    public function addPermissionToRole($role_id)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($role_id);
        $rolepermission = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $role_id)->pluck('role_has_permissions.permission_id')->all();
        return view('role-permission.roles.add-permission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolepermission,
        ]);
    }

    // Sync permissions to the specified role
    public function givePermissionToRole(Request $request, $role_id)
    {
        $request->validate([
            'permission' => 'required|array',
            'permission.*' => 'integer|exists:permissions,id',
        ]);

        DB::beginTransaction();
        try {
            // Find the role by ID
            $role = Role::findOrFail($role_id);
            // Check the guard name of the role
            if ($role->guard_name !== 'web') {
                throw new \Exception('Role guard name mismatch');
            }
            // Retrieve permissions by IDs and check the guard name
            $permissions = Permission::whereIn('id', $request->permission)
                ->where('guard_name', $role->guard_name)
                ->get();
            if ($permissions->isEmpty()) {
                throw new \Exception('No matching permissions found for the guard');
            }
            // Sync permissions with the role
            $role->syncPermissions($permissions);
            DB::commit();
            return redirect()->back()->with('status', 'Permissions Added to Role');
        } catch (\Exception $e) {
          
            DB::rollBack();
            Log::error('Adding permissions to role failed: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['server_error' => 'An unexpected error occurred. Please try again later.'])->withInput();
        }
    }
}
