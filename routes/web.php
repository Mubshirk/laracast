<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

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

Route::get('/',[PostController::class,'index']);



    // collect funtion of laravel

    // $posts = collect(File::files(resource_path("posts/")))
    // ->map(fn($file)=> YamlFrontMatter::parseFile($file))
    // ->map(fn($document) => new Post(
    //      $document->title,
    //      $document->excerpt,
    //      $document->date,
    //      $document->body(),
    //      $document->slug
    //     )
    //  );



    //  arry map

    // $posts = array_map( function($file){

    //    $document = YamlFrontMatter::parseFile($file);

    //    return new Post(
    //     $document->title,
    //     $document->excerpt,
    //     $document->date,
    //     $document->body(),
    //     $document->slug
    //    );
    // },$files);

        // dekh yahaa pr ... mene allu() nhi call kiya .. sirf all().. or ye dikharha he k mene allu() call kiya he



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
////////////////////////////////

Route::get('/posts/{post:slug}',[PostController::class,'show']);

/*  we no longer need this but just for reminder that that we have done it in this way as well

 * Route::get('categories/{category:slug}', function(Category $category){


    return view('posts',[
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()


    ]);*/

//});

Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store']);



