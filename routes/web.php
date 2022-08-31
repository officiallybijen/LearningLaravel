<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;



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
    $blogs=Blog::with('category')->get();
    return view('hi',[
        'blogs'=>$blogs
    ]);
    // $doc=YamlFrontMatter::parseFile(
    //     resource_path('blogs/firstblog.html')
    // );


    // $files=File::files(resource_path("blogs"));


    // $blogs=array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Blog(
    //         $document->title,
    //         $document->slug,
    //         $document->body()
    //     );
    // },$files);

    // foreach($files as $file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     $blog[] =new Blog(
    //         $document->title,
    //         $document->slug,
    //         $document->body()
    //     );
    // }
    // $blogs=Blog::all();
});

Route::get('/blog/{blog:slug}',function(Blog $blog){

    //find post by its slug and pass it to view called post

    // $blog=Blog::find($blog)->first();    

    return view('blog',[
        'blog'=>$blog
    ]);

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
})->where('which','[A-z_\-0-9]+');

Route::get('/categories/{category:slug}',function(Category $category){
    return view('hi',[
        'blogs'=>$category->blog
    ]);
});