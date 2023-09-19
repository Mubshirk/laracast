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
            'name' => 'required|max:50',
            'username' => 'required|max:50|min:4',
            'email' => 'required|email|max:50|min:5',
            'password' => 'required|max:50|min:7'

        ]);


        User::create($attributes);

        return '<a href="/"> congratulations </a>';
    }
}
