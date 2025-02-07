<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Etiqueta extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'etiquetas';
	protected $fillable = ['name', 'svg'];

    public function posts()
		{
			return $this->belongsToMany(Post::class, 'post_etiquetas');
		}
	
		
}
