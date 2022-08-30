<?php

    namespace App\Models;

    use Illuminate\Support\Facades\File;

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

            $files=File::files(resource_path("blogs/"));
            return array_map(function($file){
                return $file->getContents();
            },$files);


        //    return File::files(resource_path("blogs/"));
        }

        public static function find($slug){
            

        $path = resource_path("blogs/$slug.html");
        

        if(! file_exists($path)){
            abort(404);
        }

        $blog = cache()->remember('blog.{which}',2,fn() => file_get_contents($path));

        return $blog;

        }
    }

?>