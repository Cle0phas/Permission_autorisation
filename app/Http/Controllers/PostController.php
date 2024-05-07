<?php

namespace App\Http\Controllers;

use App\Mail\MailGraf;
// use App\Mail\MailNotify;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function __construct(){
        // $this->authorizeResource(Post::class);
        // $this->middleware('permission:user')->only(['destroy]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->hasRole('gamer'));
        // dd(Auth::user()->can(''));
        $validated = $request->validate([
            'name'=>'required',
            'contenu'=>'required',
            'user_id'=>'required'
        ]);
    

        $post = Post::create($validated);
        
        $toEmail='okwuimma@gmail.com';
        $obj="Test Graf";
        
        $response=Mail::to($toEmail)->send(new MailGraf($obj,$post));

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cur_post = Post::findOrFail($id);
    // $this->authorize('update',$cur_post);
        return view('posts.edit', compact('cur_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id); 
        // dd(Auth::user()->can('update',$post));
        // dd($this->authorize('Edit posts',$post));
         $validated = $request->validate([
            'name'=>'required',
            'contenu'=>'required',
            'user_id'=>'required'
        ]);
        
    
        // $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
