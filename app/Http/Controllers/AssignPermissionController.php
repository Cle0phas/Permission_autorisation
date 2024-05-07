<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::whereNotIn('name', ['admin',])->get();  
        $permissions= Permission::all();
        return view('admin.assignations.assignPermission.index',compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::whereNotIn('name', ['admin',])->get();  
        $permissions= Permission::all();
        return view('admin.assignations.assignPermission.create',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $role=Role::findById($request->role);
        // dd($role);
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('success','Permission exist');
        }
        $role->givePermissionTo($request->permission);  
            return back()->with('success','Permission added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role=Role::findById($id);      
        return view('admin.assignations.assignPermission.edit',compact('role'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $assignPermission)
    {
        $string = $assignPermission;
        $parts = explode("§", $string);
        $roleId= $parts[0];
        $permissionId= $parts[1];

        $role=Role::findById($roleId);
        $permission=Permission::findById($permissionId);

        $role->revokePermissionTo($permission);

        return back()->with('success','Permission deleted');
    }
}
