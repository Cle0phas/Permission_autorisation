<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $roles=Role::whereNotIn('name', ['admin',])->get();  // pour avoir tout les roles sauf celui de l'admin  
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $new_role= new Role();
        $new_role->name =$request->name;
        $new_role->save();
        return redirect()->route('admin.roles.index')->with('success','role cree');
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
        $current_role=Role::findOrFail($id);
        return view('admin.roles.edit', compact('current_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $current_role=Role::findOrFail($id);
        $validated= $request->validate(['name']);
        $current_role->update($validated);

        return redirect()->route('admin.roles.index')->with('success','role modifie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $current_role= Role::findOrFail($id);
        $current_role->delete();
       
        return back()->with('success','role supprime');

        
    }
}

