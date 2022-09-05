<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog){
        request()->validate([
            'comment'=>'required'
        ]);

        $blog->comments()->create([
            'user_id'=>auth()->id(),
            'body'=>request('comment')
        ]);

        return back();
    }
}
