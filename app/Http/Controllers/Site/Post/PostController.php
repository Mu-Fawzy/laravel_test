<?php

namespace App\Http\Controllers\Site\Post;

use App\Events\VisitPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::select('id', 'views', 'title','content','image')->where('slug', $post)->first();
        event(new VisitPost($post));
        return view('site.show', compact('post'));
    }

}
