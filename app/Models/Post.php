<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    # Specify with attributes can be mass assign.
    protected $fillable = ['title', 'excerpt', 'body'];

    # Eloquent relationship.
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
