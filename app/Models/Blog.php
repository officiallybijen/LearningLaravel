<?php

    namespace App\Models;

    use Illuminate\Support\Facades\File;
    use Spatie\YamlFrontMatter\YamlFrontMatter;

    class Blog{

        public $title;
        public $slug;
        public $body;

        public function __construct($title, $slug, $body){
            $this->title=$title;
            $this->slug=$slug;
            $this->body=$body;
        }

        public static function all(){

            // $files=File::files(resource_path("blogs/"));
            // return array_map(function($file){
            //     return $file->getContents();
            // },$files);

            return collect(File::files(resource_path("blogs")))
            ->map(function($file){
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function($document){
                return new Blog(
                    $document->title,
                    $document->slug,
                    $document->body()
                );
            });

        //    return File::files(resource_path("blogs/"));
        }

        public static function find($slug){
            
            return static::all()->firstWhere('slug',$slug);

        // $path = resource_path("blogs/$slug.html");
        

        // if(! file_exists($path)){
        //     abort(404);
        // }

        // $blog = cache()->remember('blog.{which}',2,fn() => file_get_contents($path));

        // return $blog;

        // }
    }
    }
?>