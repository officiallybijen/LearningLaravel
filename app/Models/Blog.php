<?php

namespace App\Models;

use App\Models;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');

        $query->when($filters['category'] ?? false,
                fn ($query, $category) =>
                $query
                    ->whereExists(
                        fn ($query) =>
                        $query->from('$categories')
                            ->whereColumn('categories.id', 'blogs.category_id')
                            ->where('categories.slug', $category)
                    )
            );
        });
        // if ($filter['search']) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
