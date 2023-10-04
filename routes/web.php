<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;

use \App\services\Newsletter;
use \Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/posts/{post:slug}', 'show');
});

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('/newsletter',NewsletterController::class)->name('newsletter');


Route::middleware('guest')->group(function () {
    Route::prefix('/login')->controller(SessionController::class)->group(function () {
        Route::get('/', 'create');
        Route::post('/', 'store');
    });

    Route::prefix('/register')->controller(RegisterController::class)->group(function () {
        Route::get('/', 'create');
        Route::post('/', 'store');
    });
});

Route::post('/logout', [SessionController::class, 'destroy']);

Route::controller(AdminPostController::class)->prefix('admin')->middleware('can:admin')->group(function (){
    Route::post('/posts','store');
    Route::get('/posts','index');
    Route::get('/create/post','create');
    Route::get('/post/{post}/edit','edit');
    Route::patch('/post/{post}','update');
    Route::delete('/post/{post}','destroy');
    Route::delete('/user/{user}','destroyUser');
    Route::get('/users','users');
    Route::get('/comments','comments');
    Route::delete('/comment/{comment}','destroyComment');
});


