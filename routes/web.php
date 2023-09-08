<?php
use App\Models\Post;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {





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

    return view('posts',[
        'posts' => Post::latest()->get()
    ]);
});

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

Route::get('/posts/{slug:slug}', function (Post $slug) {

    


    return view('post',[
        'post' => $slug
    ]);

});

Route::get('categories/{category:slug}', function(Category $category){


    return view('posts',[
        'posts' => $category->posts
    ]);
    
});

Route::get('aurthers/{aurther:username}', function(User $aurther){


    return view('posts',[
        'posts' => $aurther->posts
    ]);
    
});
   


