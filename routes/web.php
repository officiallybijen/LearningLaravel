<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/',[BlogController::class,'index']);

Route::get('/blog/{blog:slug}',[BlogController::class,'show'])->where('which','[A-z_\-0-9]+');

    //find post by its slug and pass it to view called post

    // $blog=Blog::find($blog)->first();    


    // $path = __DIR__ ."/../resources/blogs/$slug.html";
    

    // if(! file_exists($path)){
    //     // abort(404);
    //     return redirect("/hi");
    // }

    // $blog = cache()->remember('blog.{which}',2,fn() => file_get_contents($path));

    // $blog = cache()->remember('blog.{which}',2,function() use ($path){
    //     return file_get_contents($path);
    // });

    // $blog=file_get_contents($path);
    
//     return view('blog',[
//         'blog'=>$blog
//     ]);


Route::get('/categories/{category:slug}',function(Category $category){
    return view('hi',[
        'blogs'=>$category->blog->load(['category','author']),
        'categories'=>Category::all(),
        'currentCategory'=>$category
    ]);
});

Route::get('/author/{author}',function(User $author){ //use username instead
    return view('hi',[
        'blogs'=>$author->blog->load(['category','author']),
        'categories'=>Category::all(),

    ]);
});

