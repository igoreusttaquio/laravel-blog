<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];

    # Specify with attributes can be mass assign.
    protected $fillable = ['title', 'excerpt', 'body'];

    # Eloquent relationship.
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        $fk = 'user_id';
        return $this->belongsTo(User::class, $fk);
    }

    public function scopeFilter($query, array $filters) # Post::newQuery()->filter()
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', "%".request('search')."%");
        }
    }
}
