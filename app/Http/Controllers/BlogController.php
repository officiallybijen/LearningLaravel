<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'author')->filter(request(['search','category']))->paginate(5);
        return view('hi', [
            'blogs' => $blogs,
            'categories' => Category::all()
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
    }

    public function show(Blog $blog){
        return view('blog',[
            'blog'=>$blog
        ]);
    
    }
}
