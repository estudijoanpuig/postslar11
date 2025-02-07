<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Etiqueta;

class GalleryController extends Controller
{
    public function index(Request $request)
{
    $category = Category::where('name', 'people')->first();

    if (!$category) {
        return view('gallery.index', ['posts' => [], 'etiquetas' => []]);
    }

    $query = Post::where('category_id', $category->id)->with('etiquetas');

    if ($request->has('etiqueta_id')) {
        $etiquetaId = $request->input('etiqueta_id');
        $query->whereHas('etiquetas', function ($q) use ($etiquetaId) {
            $q->where('etiquetas.id', $etiquetaId);
        });
    }

    if ($request->has('title')) {
        $title = $request->input('title');
        $query->where('title', 'like', '%' . $title . '%');
    }

    $posts = $query->get();

    // Recuperar las etiquetas de la categoría 'people' y ordenarlas alfabéticamente
    $etiquetas = Etiqueta::whereHas('posts', function ($query) use ($category) {
        $query->where('category_id', $category->id);
    })->orderBy('name', 'asc')->get();

    return view('gallery.index', compact('posts', 'etiquetas'));
}


    public function detalle($title)
    {
        $images = [];
        for ($i = 1; $i <= 12; $i++) {
            $images[] = asset("img/people/{$title}/{$i}.jpg");
        }

        return view('gallery.detalle', compact('title', 'images'));
    }
}
