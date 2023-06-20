<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

//        if (request('search') ?? false) {
//            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%');
//        }
//        if($filters['search'] ?? false) {
////        ddd($query);
//            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%');
//        }
        // Before refactor :
//        $query->when($filters['search'] ?? false, function ($query, $search) {
//            $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
//        });
//        $query->when($filters['category'] ?? false, function ($query, $category) {
//            $query->where('title', 'like', '%' . $category . '%')->orWhere('body', 'like', '%' . $category . '%');
//        });
//        $query->when($filters['author'] ?? false, function ($query, $author) {
//            $query->where('title', 'like', '%' . $author . '%')->orWhere('body', 'like', '%' . $author . '%');
//        });
        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        )
        );
        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );
        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author)));
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
