<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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


        \App\Jobs\PostJob::dispatch();


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

    public function destroyUser(User $user){

        $user->delete();
        return back()->with('success','User Deleted successfully !!');

    }

    public function users(){

        $users = User::all();

        return view('admin.users',[
            'users' => $users
        ]);
    }


    public function comments(){

        $comments = Comment::all();

        return view('admin.comments',[
            'comments' => $comments
        ]);
    }

    public function destroyComment(Comment $comment){

        $comment->delete();
        return back()->with('success','Comment Deleted successfully !!');

    }

}
