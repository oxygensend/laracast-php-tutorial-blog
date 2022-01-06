<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPostController extends Controller
{
    //
    public function index()
    {
        return view("admin.posts.index", ['posts' => Post::paginate(50)]) ;
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->postValidation();
        $image =  Image::make(request()->file('thumbnail'))->resize(1108, 860);
        $fileName   = 'thumbnails/' . time() . '.' . request()->file('thumbnail')->getClientOriginalExtension();
        $image->save(storage_path('app/public/' . $fileName));

        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = $fileName;
        Post::create($attributes);

        return redirect('/')->with('success', 'Successfully added new post.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [ 'post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->postValidation($post);
        if ($attributes['thumbnail'] ?? false) {
            $image =  Image::make(request()->file('thumbnail'))->resize(1108, 860);
            $fileName   = 'thumbnails/' . time() . '.' . request()->file('thumbnail')->getClientOriginalExtension();
            $image->save(storage_path('app/public/' . $fileName));
            $attributes['thumbnail'] = $fileName;
        }
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->user()->id;
        
        
        $post->update($attributes);

        return redirect('/admin/posts/')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts/')->with('success', 'Post deleted.');
    }

    public function publishPost(Post $post)
    {
        $post->update(['published' => !$post->published]);

        $msg = $post->published ? 'published' : 'unpublished';
        return redirect('/admin/posts/')->with('success', 'Post has been ' . $msg);
    }
    public function postValidation(Post $post = null) : array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
            'thumbnail' => [$post->exists() ? '' : 'required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published' => 'boolean'
        ]);
    }
}
