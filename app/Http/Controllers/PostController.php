<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Etiqueta;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
	
	public function show($id)
    {
        // Obtenir el post amb la seva categoria
        $post = Post::with('category')->findOrFail($id);

        // Obtenir les etiquetes del post
        $tags = Etiqueta::whereIn('id', function ($query) use ($id) {
            $query->select('etiqueta_id')
                  ->from('post_etiquetas')
                  ->where('post_id', $id);
        })->get();

        // Obtenir el post anterior
        $previousPost = Post::where('id', '<', $id)->orderBy('id', 'desc')->first();

        // Obtenir el post següent
        $nextPost = Post::where('id', '>', $id)->orderBy('id', 'asc')->first();

        // Obtenir articles relacionats per etiquetes
        $relatedPosts = Post::whereIn('id', function ($query) use ($tags) {
            $query->select('post_id')
                  ->from('post_etiquetas')
                  ->whereIn('etiqueta_id', $tags->pluck('id'));
        })
        ->where('id', '!=', $id)
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();

        return view('posts.show', compact('post', 'tags', 'previousPost', 'nextPost', 'relatedPosts'));
    }
	
	public function indexGallery(Request $request)
{
    $query = Post::with(['category', 'etiquetas', 'books']); // 🔹 Afegim la relació amb books

    // Aplicar búsqueda
    if ($request->has('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Aplicar filtro de categoría
    if ($request->has('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // Aplicar filtro de etiqueta
    if ($request->has('etiqueta_id')) {
        $query->whereHas('etiquetas', function ($q) use ($request) {
            $q->where('etiquetas.id', $request->etiqueta_id);
        });
    }

    // Ordenar los resultados por el campo 'updated_at' en orden descendente
    $query->orderBy('updated_at', 'desc');
    $posts = $query->get();

    // Obtener todas las categorías para la lista horizontal
    $categories = Category::all();

    return view('posts.index_gallery', compact('posts', 'categories'));
}


	
    public function index(Request $request)
    {
        $query = Post::with(['category', 'etiquetas']);

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Ordenar los resultados por el campo 'updated_at' en orden descendente
        $query->orderBy('updated_at', 'desc');
        $posts = $query->get();

        // Obtener todas las categorías para la lista horizontal
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function inici(Request $request)
    {
        $query = Post::with(['category', 'etiquetas']);

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Ordenar los resultados por el campo 'updated_at' en orden descendente
        $query->orderBy('updated_at', 'desc');
        $posts = $query->get();

        return view('index', compact('posts'));
    }

    public function filterByCategory($id)
    {
        $posts = Post::where('category_id', $id)->with(['category', 'etiquetas'])->get();
        // Obtener todas las categorías para la lista horizontal
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    public function filterByEtiqueta($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        $posts = $etiqueta->posts()->with(['category', 'etiquetas'])->get();
        // Obtener todas las categorías para la lista horizontal
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    // Método para obtener los posts (existente)
    public function getPosts(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('category')->get();
            return DataTables::of($posts)
                ->addColumn('category', function($post) {
                    return $post->category->name;
                })
                ->addColumn('title', function($post) {
                    $url = route('posts.detalle', $post->id);
                    return '<a href="'.$url.'">'.$post->title.'</a>';
                })
                ->addColumn('excerpt', function($post) {
                    return $post->excerpt;
                })
                ->addColumn('action', function($post){
                    $editUrl = route('posts.edit', $post->id);
                    $deleteUrl = route('posts.destroy', $post->id);
                    return '
                        <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    ';
                })
                ->rawColumns(['title', 'excerpt', 'action'])
                ->make(true);
        }

        return view('posts.datatables_eines');
    }

    // Método para la vista de detalle
    public function detalle($id)
    {
        $post = Post::with('category', 'etiquetas')->findOrFail($id);
        return view('posts.detalle', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['success' => 'Post deleted successfully.']);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->excerpt = $request->input('excerpt');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.datatables')->with('success', 'Post updated successfully');
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->excerpt = $request->input('excerpt');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.datatables')->with('success', 'Post created successfully');
    }
	
	public function swiperIndex()
{
    // Filtrar los posts por categoría y etiqueta
    $posts = Post::with(['category', 'etiquetas'])
                ->where('category_id', 7)
                ->whereHas('etiquetas', function ($query) {
                    $query->where('etiquetas.id', 22); // Aquí faltaba mover esta línea dentro del cierre de la función
                })
                ->get();

    $categories = Category::all();
    return view('swiper.index', compact('posts', 'categories'));
}

	
	public function projectGallery()
{
    $allPosts = Post::with(['category', 'etiquetas'])
                ->where('category_id', 10)
                ->get();

    $projects = [];

    foreach ($allPosts as $post) {
        // Obtener título del post y dividirlo por el guion
        $titleParts = explode('-', $post->title);
        // Obtener la parte del título antes del guion
        $titleKey = rtrim(implode('-', array_slice($titleParts, 0, -1)));

        if (!isset($projects[$titleKey])) {
            $projects[$titleKey] = [];
        }

        $projects[$titleKey][] = $post;
    }

    return view('gallery.project', compact('projects'));
}



    
    // Otros métodos...
}

