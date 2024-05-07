<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function index(){
        $users=User::whereNotIn('name',['admin'])->get();
        // dd($users);
        return view('admin.index',compact('users'));
    }

    public function assign(){
        return view('admin.assign');
    }
}
