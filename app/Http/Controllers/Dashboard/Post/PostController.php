<?php

namespace App\Http\Controllers\Dashboard\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select('id', 'slug', 'title', 'description', 'image','active','views')->get();
        return view('admin.posts.all', compact('posts'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->select('id', 'title', 'description', 'image','active')->get();
        $trash = true;
        return view('admin.posts.all', compact(['posts','trash']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //Create Post
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'content' => $request->content,
            'active' => $request->active,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('posts','posts');
        }
        $post = Post::create($data);

        $request->session()->flash('success', 'Post Created succesfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->only('title', 'content', 'description', 'active');
        if ($request->hasFile('image')) {
            Storage::disk('posts')->delete('posts/'.basename($post->image));
            $data['image'] = $request->image->store('posts','posts');
        }
        $post->update($data);

        Session()->flash('success', 'Post Updated succesfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session()->flash('success', 'Post Deleted succesfully!');
        return redirect()->back();

    }

    public function forceDestroy($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->forcedelete();
        Session()->flash('success', 'Post Deleted succesfully!');
        return redirect()->back();

    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->restore();
        Session()->flash('success', 'Post Restored succesfully!');
        return redirect()->back();

    }
}
