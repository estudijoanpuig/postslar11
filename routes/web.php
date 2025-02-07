<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyTestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostFinanzaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Galleryb5Controller;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BookController;

use App\Models\Post;

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/inici', [PostController::class, 'inici'])->name('inici');

Route::middleware('auth')->group(function () {
    Route::get('/yajra', [PostController::class, 'getPosts'])->name('posts.datatables');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/', [PostController::class, 'indexGallery'])->name('posts.gallery');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/detalle/{title}', [GalleryController::class, 'detalle'])->name('gallery.detalle');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/category/{id}', [PostController::class, 'filterByCategory'])->name('posts.category');
Route::get('/etiqueta/{id}', [PostController::class, 'filterByEtiqueta'])->name('posts.etiqueta');

Route::get('/posts/category/{id}', [PostController::class, 'filterByCategory'])->name('posts.category');
Route::get('/posts/etiqueta/{id}', [PostController::class, 'filterByEtiqueta'])->name('posts.etiqueta');
Route::get('/posts/detalle/{id}', [PostController::class, 'detalle'])->name('posts.detalle');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/example', function () {
    // Ejecutar una consulta simple para obtener todos los posts ordenados alfabéticamente por título
    $posts = Post::orderBy('title', 'asc')->get();

    // Retornar una vista con los resultados
    return view('example', ['posts' => $posts]);
})->name('example');


Route::get('/conexio', function () {
    return view('exemples_php.conexio');
});

Route::get('/array', function () {
    return view('exemples_php.array');
});


Route::get('/swiper', [PostController::class, 'swiperIndex'])->name('swiper.index');
Route::get('/project-gallery', [PostController::class, 'projectGallery'])->name('project.gallery');



Route::get('/routes', [RouteController::class, 'index']);
Route::view('/list-routes', 'list-routes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
