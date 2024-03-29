<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $posts = Post::all();
        return view('admin.posts.index', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = $request->all();
        $post = Post::create($data);

        return redirect()->route('admin.posts.show', $post);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //3
        return view('admin.posts.edit', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $data = $request->all();
        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index');

    }
}
