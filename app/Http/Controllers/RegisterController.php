<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|min:4|max:50',
            'username' => 'required|max:50|min:4|unique:users,username',
            'email' => 'required|email|max:50|min:5|unique:users,email',
            'password' => 'required|max:50|min:7'

        ]);


        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
