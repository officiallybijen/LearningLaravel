<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;
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
Route::post('/newsletter',function(){

    request()->validate([
        'email'=>'required|email']);

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
	'apiKey' => config('services.mailchimp.key'),
	'server' => 'us18'
]);

$response = $mailchimp->lists->addListMember("2ca5f15b04", [
    "email_address" => request('email'),
    "status" => "subscribed",
]);

return redirect('/')->with('success','you are signed up for newsletter');

});


Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class,'store']);

Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('/',[BlogController::class,'index']);

Route::get('/blog/{blog:slug}',[BlogController::class,'show'])->where('which','[A-z_\-0-9]+');

Route::post('/blog/{blog:slug}/comment',[CommentController::class,'store']);
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


// admin

Route::get('admin/posts/create',[BlogController::class,'create'])->middleware('admin');
Route::post('admin/post/',[BlogController::class,'store'])->middleware('admin');
