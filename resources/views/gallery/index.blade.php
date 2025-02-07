@extends('layouts.prova')
@section('ruta', 'gallery')
@section('title', 'people')
@section('descripcio', 'amb tailwind 3 i un filtre al controlador')
@section('content')

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 mx-auto">

            <!-- ponerle tailwind background image a este div -->
            <div class="container w-full mx-auto text-center bg-cover bg-center mb-8" style="">
                <h1
                    class="mb-2 text-2xl font-extrabold leading-none tracking-normal text-gray-900 md:text-3xl md:tracking-tight text-center">
                    @yield ('ruta')<span
                        class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">
                        - @yield ('title')</span>
                </h1>
                <p class="font-mono font-light italic text-center text-gray-900"><a href="https://tailblocks.cc/">
                    @yield ('descripcio') </a></p>
            </div>
			
			<div class="flex justify-center mb-4">
    <ul class="flex flex-wrap space-x-6">
        @foreach($etiquetas as $etiqueta)
            <li>
                <a href="{{ route('gallery.index', ['etiqueta_id' => $etiqueta->id]) }}"
                   class="uppercase  text-gray-400 hover:text-blue-600">
                    {{ $etiqueta->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
				<!-- Formulario de búsqueda -->
            <form method="GET" action="{{ route('gallery.index') }}" class="mb-8">
                <div class="flex items-center border-b border-orange-500 py-2">
                   <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}"
                        class="appearance-none border-none w-full text-teal-500 mr-3 py-1 px-2 leading-tight focus:outline-none">
                    <button type="submit"
                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                        Buscar
                    </button>
                </div>
            </form>
            
            </h1>
            <div class="masonry">
                @foreach ($posts as $post)
                    <div class="masonry-item bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title }}"
                            class="w-full h-100 object-cover">
                        <div class="p-4">
                            <a href="{{ route('gallery.detalle', ['title' => $post->title]) }}">
                                <h2 class="text-xl font-bold">{{ $post->title }}</h2>

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
                                        <a data-fancybox="gallery"href="{{ $post->youtube }}" target="_blank"
                                            class="text-red-500">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    @endif
                                </div>

                                <p class="mt-2">{{ $post->excerpt }}</p>
                                <div class="mt-4">
                                    @foreach ($post->etiquetas as $etiqueta)
                                        <a href="{{ route('gallery.index', ['etiqueta_id' => $etiqueta->id]) }}"
                                            class="inline-block bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $etiqueta->name }}</a>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @stop
