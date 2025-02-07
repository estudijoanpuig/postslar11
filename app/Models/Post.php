<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;




class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title', 'Category_id', 'excerpt', 'content', 
        'img', 'url', 'ins', 'face', 'youtube'
    ];

    // Relació amb categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relació amb etiquetes (many-to-many)
    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class, 'post_etiquetas');
    }

    // Nova relació amb books (many-to-many a través de post_books)
    public function books()
    {
        return $this->belongsToMany(Book::class, 'post_books', 'post_id', 'book_id');
    }

    // Esborrat en cascada per eliminar etiquetes associades
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->etiquetas()->detach();
        });
    }
}
