@extends('layouts.prova')
@section('ruta', '/')
@section('title', 'Gallery Index')
@section('descripcio', 'Galería de posts en formato de grid masonry')
@section('content')

    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">

            <!-- Div con background image -->
            <div class="w-full mx-auto text-center bg-cover bg-center mb-8"
                style="background-image: url('/path/to/your/image.jpg');">
                <h1
                    class="mb-2 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight text-center">
                    @yield('ruta')<span
                        class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">@yield('title')</span>
                </h1>
                <p class="font-mono font-light italic text-center "><a href="https://tailblocks.cc/">@yield('descripcio')</a></p>
            </div>

            <!-- Lista horizontal de categorías -->
            <div class="flex flex-wrap justify-center py-4 mb-8">
                @foreach ($categories as $category)
                    <a href="{{ route('posts.gallery', ['category_id' => $category->id]) }}"
                        class="uppercase text-gray-900 font-extrabold hover:text-teal-700 mx-2">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Formulario de búsqueda -->
            <form method="GET" action="{{ route('posts.gallery') }}" class="mb-8">
                <div class="flex items-center border-b border-orange-500 py-2">
                    <input type="text" name="search" placeholder="Busca por título del post"
                        class="appearance-none border-none w-full text-teal-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        value="{{ request('search') }}">
                    <button type="submit"
                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                        Buscar
                    </button>
                </div>
            </form>

            <!-- Grid Masonry -->
            <div class="masonry">
                @foreach ($posts as $post)
                    <div class="masonry-item bg-white p-6 rounded-lg shadow-lg">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="/storage/{{ $post->img }}" class="w-full h-90 object-cover object-center mb-6"
                                alt="{{ $post->title }}">
                            <h2 class="text-lg text-cyan-600 font-medium title-font mb-4 break-words">{{ $post->title }}</h2>
                            <p class="leading-relaxed text-sm mb-4">{!! $post->excerpt !!}
							@foreach ($post->books as $book)
    @if (!empty($book->pdf_url))
        <a data-fancybox data-type="pdf" href="{{ asset('storage/' . $book->pdf_url) }}" 
           class="text-red-600 text-lg" title="Veure PDF">
            <i class="fas fa-file-pdf"></i>
        </a>
    @endif
@endforeach
							
							</p>
                        </a>
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
                        <div class="mt-4">
                            @foreach ($post->etiquetas as $etiqueta)
                                <a href="{{ route('posts.gallery', ['etiqueta_id' => $etiqueta->id]) }}"
                                    class="inline-block bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded hover:bg-green-200">
                                    {{ $etiqueta->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
