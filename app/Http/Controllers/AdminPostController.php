<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts',[
            'posts' => Post::all(),
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(){

        $post = new Post();


        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required','image'],
            'excertp' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');


        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.edit',['post' => $post]);
    }

    public function update(Post $post){
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post->id)],
            'thumbnail' => 'image',
            'excertp' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        if (isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success','Post updated successfully !!');
    }

    public function destroy(Post $post){

        $post->delete();
        return back()->with('success','Post Deleted successfully !!');

    }
}
