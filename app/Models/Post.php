<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = [
        'category',
        'author',
        'tags'
    ];
    
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'thumbnail',
        'slug',
        'excerpt',
        'body'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    
    public function scopeFilter($query, $filters){        
        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query->where(fn() =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')));
        
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category',fn ($query) => 
                $query->where('slug',$category)
                )
            );
        
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author',fn ($query) =>
                $query->where('username',$author)
                )
            );
        
        $query->when($filters['tags'] ?? false, fn ($query, $tags) =>
            $query->whereHas('tags',fn ($query) =>
                $query->where('tag_id',$tags)
                )
            );
    }
}



