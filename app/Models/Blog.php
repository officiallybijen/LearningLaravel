<?php

namespace App\Models;

use App\Models;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function scopeFilter($query, array $filter){
        $query->when($filter['search'] ?? false,fn($query, $search)=>
                 $query->where(fn($query)=>
                 $query->where('title', 'like', '%' . $search . '%')
                 ->orWhere('body', 'like', '%' . $search . '%')        
                 ));

        $query->when($filter['category'] ?? false,function($query, $category){
            $query
            ->whereHas('category',fn($query)=>$query->where('slug',$category));

   });

   $query->when($filter['author'] ?? false,function($query, $author){
    $query
    ->whereHas('author',fn($query)=>$query->where('username',$author));

});
        
        // if ($filter['search']) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,"user_id");
    }
}
