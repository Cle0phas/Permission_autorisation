<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $permissions= Permission::all();
        return view('admin.assignations.assignRole.index',compact('permissions'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::whereNotIn('name', ['admin',])->get();  
        $permissions= Permission::all();
        return view('admin.assignations.assignRole.create',compact('roles','permissions'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $permission=Permission::findByName($request->permission);
        //  dd($request->permission);
         if ($permission->hasRole($request->role)) {
             return back()->with('success','Role exist');
         }
         $permission->assignRole($request->role);  
             return back()->with('success','Role added');
    
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
       $permission=Permission::findById($id);      
        return view('admin.assignations.assignRole.edit',compact('permission'));
    
    
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
    public function destroy(string $assignRole)
    {
        $string = $assignRole;
        $parts = explode("§", $string);
        $permissionId= $parts[0];
        $roleId= $parts[1];

        $permission=Permission::findById($permissionId);  
        $role=Role::findById($roleId);

        $permission->removeRole($role);

        return back()->with('success','Role deleted');
    }
}
