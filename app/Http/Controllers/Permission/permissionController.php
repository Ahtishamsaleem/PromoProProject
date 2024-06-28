<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class permissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('log.user.action')->only(['create','store', 'update', 'destroy']);
    }
    public function index()
    {
        $permissions = Permission::get();
        return view('role-permission.permission.index',['permissions' => $permissions]);
    }
    public function create()
    {
        return view('role-permission.permission.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name',
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);
        return redirect('permissions')->with('status','Permission Created Successfully');
    }
    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('role-permission.permission.edit',['permissions' => $permissions]);
    }
    public function update(Request $request,Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name',
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);
        return redirect('permissions')->with('status','Permission Updated Successfully');
    }
    public function destroy ($id)
    {
        $permissions = Permission::find($id);
        $permissions->delete();
        return redirect('permissions')->with('status','Permission Deleted Successfully');
    }
}
