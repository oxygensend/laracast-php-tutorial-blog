<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function index()
    {
        //ddd(Post::all()->filter(fn ($post) => $post->published == 1));
        return view('posts.index', [
            'posts' => Post::latest()->filter(request()->only('search', 'category', 'author'))
                                    ->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
