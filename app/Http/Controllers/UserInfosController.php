<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        
        $cur_user=User::findOrFail($id);
        $cur_user_name=$cur_user->name;
        $roles=Role::whereNotIn('name', ['admin',])->get(); 
        // $users=User::whereNotIn('name', ['admin',$cur_user_name])->get();  
        return view('admin.user.assignRole',compact('roles','cur_user') );  //'users',
    }
    public function edit2(string $id)
    {
        
        $cur_user=User::findOrFail($id);
        $cur_user_name=$cur_user->name;
        $roles=Role::whereNotIn('name', ['admin',])->get(); 
        // $users=User::whereNotIn('name', ['admin',$cur_user_name])->get();  
        return view('admin.user.removeRole',compact('roles','cur_user') );  //'users',
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->methode=='delete'){
            $user= User::findOrFail($request->user);
            if ($user->hasRole($request->role)) {
              
            $user->removeRole($request->role);    
            return back()->with('success','Role deleted');
        }
            return back()->with('success','Role inexistant');

        }

        $user= User::findOrFail($request->user);
        
         if ($user->hasRole($request->role)) {
             return back()->with('success','Role exist');
         }
         $user->assignRole($request->role);  
             return back()->with('success','Role added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
