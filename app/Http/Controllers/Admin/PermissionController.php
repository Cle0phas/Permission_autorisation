<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    public function create(){
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $request->validate(['name']);
        $new_permission = new Permission();
        $new_permission->name = $request->name;
        $new_permission->save();

        return redirect()->route('admin.permissions.index')->with('success','permission cree');
    }

    public function edit(string $id){
        $current_permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('current_permission'));
    }

    public function update(Request $request,$id){
        
        $current_permission = Permission::findOrFail($id);
        $validated=$request->validate(['name'=>'required']);
        $current_permission->update($validated);

        return redirect()->route('admin.permissions.index')->with('success','permission modifiee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $current_permission= Permission::findOrFail($id);
        $current_permission->delete();
       
        return back()->with('success','permission supprime');

        
    }
}
