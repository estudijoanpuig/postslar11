<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Etiqueta;
use App\Models\Post;

class PostEtiqueta extends Model
{
	protected $table = 'post_etiquetas';
    protected $fillable = ['post_id', 'etiqueta_id']; 

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class);
    }
}