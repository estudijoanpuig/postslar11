<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'pdf_url',
    ];

    // 🔹 Relació Many-to-Many amb Posts
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_books', 'book_id', 'post_id');
    }
}
