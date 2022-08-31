<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Category::truncate();
        Blog::truncate();

        $user = User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

      $travel =  Category::create([
            "name"=>"travel",
            "slug"=>"travel"
        ]);
        
       $personal = Category::create([
            "name"=>"personal",
            "slug"=>"personal"
        ]);
        
       $sports = Category::create([
            "name"=>"sports",
            "slug"=>"sports"
        ]);

        Blog::create([
            "title"=>"my visit",
            "category_id"=>$travel->id,
            "user_id"=>$user->id,
            "slug"=>"visit",
            "body"=>"visit was good"
        ]);

        Blog::create([
            "title"=>"cr",
            "category_id"=>$sports->id,
            "user_id"=>$user->id,
            "slug"=>"cr",
            "body"=>"ronaldo"
        ]);

        Blog::create([
            "title"=>"kd",
            "category_id"=>$sports->id,
            "user_id"=>$user->id,
            "slug"=>"kd",
            "body"=>"kevin durant"
        ]);

        Blog::create([
            "title"=>"my life",
            "category_id"=>$personal->id,
            "user_id"=>$user->id,
            "slug"=>"life",
            "body"=>"life is good"
        ]);

    }
}
