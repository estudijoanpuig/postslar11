@extends('layouts.prova')
@section('title', 'detall post')
@section('content')

    <div class="container mx-auto px-4">

        <!-- Column -->
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center mb-4">
                <h1
                    class="text-2xl font-extrabold leading-none tracking-normal text-gray-900 md:text-4xl md:tracking-tight lg:inline mr-4">
                    @yield('title')<span
                        class="py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500">
                        - {{ $post->title }}</span>
                </h1>
                <p class="mr-4"><strong>Creado en:</strong> {{ $post->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $post->updated_at }}</p>
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded align-items: flex-end">
  <a href="/"><--tornar a / </a>
</button>
            </div>
        </div>

        <div class="container mx-auto px-4 py-2">
            <h2 class="text-2xl uppercase text-red-500 font-semibold">{{ $post->category->name }}</h2>

            <div class="flex items-center space-x-4 mt-4">
                @if ($post->url)
                    <a href="{{ $post->url }}" target="_blank" class="text-blue-500">
                        <i class="fas fa-link"></i> <!-- Icono para el sitio web -->
                    </a>
                @endif
                @if ($post->ins)
                    <a href="{{ $post->ins }}" target="_blank" class="text-blue-500">
                        <i class="fab fa-instagram"></i> <!-- Icono para Instagram -->
                    </a>
                @endif
                @if ($post->face)
                    <a href="{{ $post->face }}" target="_blank" class="text-blue-500">
                        <i class="fab fa-facebook"></i> <!-- Icono para Facebook -->
                    </a>
                @endif
                @if ($post->youtube)
                    <a data-fancybox="gallery" href="{{ $post->youtube }}" target="_blank" class="text-blue-500">
                        <i class="fab fa-youtube"></i> <!-- Icono para YouTube -->
                    </a>
                @endif
            </div>

            <div class="md:container md:mx-auto py-2">
                @foreach ($post->etiquetas as $etiqueta)
                    <span
                        class="inline-block bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-md mr-2">{{ $etiqueta->name }}</span>
                @endforeach
            </div>
        </div>


        <!-- Excerpt -->
        <div class="md:container md:mx-auto py-2">
            <p class="text-xl font-semibold">{{ $post->excerpt }}</p>
        </div>

        <!-- Content Section -->
        <div class="md:container md:mx-auto py-2">
            <div>{!! $post->content !!}</div>
        </div>

        <!-- Gallery Section -->
        @if ($post->category_id == 7)
            <div id="nanogallery2"
                class="container mx-auto px-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4"
                data-nanogallery2='{
            "thumbnailHeight": 350,
            "thumbnailWidth": 350,
            "itemsBaseURL": "{{ url('/img/people/' . urlencode($post->title)) }}/"
        }'>
                @for ($i = 1; $i <= 18; $i++)
                    <a href="{{ url('/img/people/' . urlencode($post->title) . '/' . $i . '.jpg') }}"
                        data-fancybox="gallery" data-ngThumb="{{ $i }}.jpg">
                        <img src="{{ url('/img/people/' . urlencode($post->title) . '/' . $i . '.jpg') }}"
                            alt="{{ $post->title }} {{ $i }}" class="w-full h-auto">
                    </a>
                @endfor
            </div>
        @endif

        <!-- Image Section -->
        <div class="container mx-auto px-4">
            @if ($post->img)
                <div class="w-[300px]">
                    <img data-fancybox="gallery" src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title }}"
                        class="w-full h-auto">
                </div>
            @else
                <p>No image available</p>
            @endif
        </div>

    </div>

@endsection
