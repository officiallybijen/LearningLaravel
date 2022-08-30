<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/hi', function () {
    return view('hi');
});

Route::get('/blog/{which}',function($slug){
    $path = __DIR__ ."/../resources/blogs/$slug.html";
    

    if(! file_exists($path)){
        // abort(404);
        return redirect("/hi");
    }

    $blog = cache()->remember('blog.{which}',2,fn() => file_get_contents($path));

    // $blog = cache()->remember('blog.{which}',2,function() use ($path){
    //     return file_get_contents($path);
    // });

    // $blog=file_get_contents($path);
    
    return view('blog',[
        'blog'=>$blog
    ]);
})->where('which','[A-z_\-]+');