<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'book_id',
    ];

    // Relació amb Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    // Relació amb Post
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
