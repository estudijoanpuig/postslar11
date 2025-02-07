@extends('layouts.prova')
@section('ruta', '/')
@section('title', 'productes')
@section('descripcio', 'entrades blog una columna vertical de tailblocks i amb un filtre per categories')
@section('content')

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 mx-auto">

            <!-- ponerle tailwind background image a este div -->
            <div class="container w-full mx-auto text-center bg-cover bg-center mb-8">
                <h1
                    class="mb-2 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight text-center">@yield ('ruta')<span class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">@yield          ('title')</span>
                </h1>
                <p class="font-mono font-light italic text-center "><a href="https://tailblocks.cc/">@yield ('descripcio')
                    </a></p>
            </div>
            <!-- Lista horizontal de categorías -->
            <div class="flex flex-wrap justify-center py-4 mb-8">
                @foreach ($categories as $category)
                    <a href="{{ route('posts.category', $category->id) }}"
                        class="uppercase text-gray-900 font-extrabold hover:text-teal-700 mx-2">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
            <!-- Formulario de búsqueda -->
            <form method="GET" action="{{ route('posts.index') }}" class="mb-8">
                <div class="flex items-center border-b border-orange-500 py-2">
                    <input type="text" name="search" placeholder="Fes una cerca per el nom de l'entrada"
                        class="appearance-none border-none w-full text-teal-500 mr-3 py-1 px-2 leading-tight focus:outline-none">
                    <button type="submit"
                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                        Buscar
                    </button>
                </div>
            </form>
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach ($posts as $post)
                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <a href="{{ route('posts.category', $post->category->id) }}"
                                class="font-semibold title-font text-gray-700">{{ $post->category->name }}</a>
                            <span class="mt-1 text-gray-500 text-sm">{{ $post->updated_at }}</span>
                            <img data-fancybox src="/storage/{{ $post->img }}" align="left" width="250"
                                height="" />
                        </div>
                        <div class="md:flex-grow">
                            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                                <a href="/posts/detalle/{{ $post->id }}">
                                    <h1 class="text-2xl font-bold mb-4 break-words">{{ $post->title }}</h1>
                                    <div class="flex space-x-4 mt-4">
                                        @if ($post->url)
                                            <a href="{{ $post->url }}" target="_blank" class="text-blue-500">
                                                <i class="fas fa-link"></i>
                                            </a>
                                        @endif
                                        @if ($post->ins)
                                            <a href="{{ $post->ins }}" target="_blank" class="text-pink-500">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if ($post->face)
                                            <a href="{{ $post->face }}" target="_blank" class="text-blue-700">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if ($post->youtube)
                                            <a data-fancybox="gallery" href="{{ $post->youtube }}" target="_blank"
                                                class="text-red-500">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        @foreach ($post->etiquetas as $etiqueta)
                                            <a href="{{ route('posts.etiqueta', $etiqueta->id) }}"
                                                class="text-blue-500 hover:underline">{{ $etiqueta->name }}</a>
                                        @endforeach
                                    </div>
                                    <p class="mb-4">{!! $post->excerpt !!}</p>
                                    @php
                                        $directory = public_path('img/people/' . $post->title);
                                    @endphp
                                    @if (file_exists($directory) && is_dir($directory))
                                        <a href="{{ route('gallery.detalle', ['title' => $post->title]) }}"
                                            class="text-blue-500 hover:underline">
                                            <i class="fas fa-folder-open text-yellow-500 mr-2"></i>
                                            View Gallery
                                        </a>
                                    @else
                                        <p class="text-red-500">No images available</p>
                                    @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
