@extends('layouts.prova')
@section('ruta', '/')
@section('title', 'detall post')
@section('descripcio', 'entrades blog una columna vertical de tailblocks i amb un filtre per categories')
@section('content')


<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
        
        <!-- Contingut -->
        <div class="lg:col-span-2">
            <div class="py-8 lg:pe-8">
                <a href="{{ url('/') }}" class="text-blue-500 hover:underline">
                    <i class="fas fa-arrow-left"></i> Tornar al Blog
                </a>

                <h1 class="text-3xl font-bold mt-4">{{ $post->title }}</h1>
                
                <div class="text-gray-500 text-sm mt-2">
                    Categoria: <span class="font-semibold">{{ $post->category->name ?? 'Sense categoria' }}</span> | 
                    Publicat el {{ $post->created_at->format('d M, Y') }}
                </div>

                <!-- Xarxes Socials -->
                <div class="mt-2 space-x-3">
                    @if ($post->url) <a href="{{ $post->url }}" class="text-blue-500"target="_blank"><i class="fas fa-link"></i></a> @endif
                    @if ($post->ins) <a href="{{ $post->ins }}" class="text-pink-500"><i class="fab fa-instagram"></i></a> @endif
                    @if ($post->face) <a href="{{ $post->face }}" class="text-blue-700"><i class="fab fa-facebook"></i></a> @endif
                    @if ($post->youtube) <a data-fancybox="gallery" href="{{ $post->youtube }}" class="text-red-600"><i class="fab fa-youtube"></i></a> @endif
                </div>

                @if ($post->img)
                    <img src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title }}" class="mt-4 rounded-lg w-full">
                @endif

                <div class="mt-4 text-lg">
                    {!! $post->content !!}
                </div>
				
				<!-- Incloure scripts de NanoGallery2 -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/jquery.nanogallery2.min.js"></script>

@if ($post->category_id == 7)
    <div class="uk-margin-large-top">
        <div id="nanogallery2" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4"
             data-nanogallery2='{
                "thumbnailHeight": 350,
                "thumbnailWidth": 350,
                "itemsBaseURL": "{{ asset('storage/people/' . urlencode($post->title)) }}/"
             }'>
            
            @for ($i = 1; $i <= 18; $i++)
                <a href="{{ asset('storage/people/' . urlencode($post->title) . '/' . $i . '.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('storage/people/' . urlencode($post->title) . '/' . $i . '.jpg') }}"
                         alt="{{ $post->title }} {{ $i }}"
                         class="w-full h-auto rounded-lg shadow-md hover:shadow-lg transition">
                </a>
            @endfor

        </div>
    </div>
@endif



                <!-- Etiquetes -->
                <div class="mt-6">
                    <h3 class="font-semibold text-lg">Etiquetes:</h3>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($tags as $tag)
                            <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Navegació -->
                <div class="flex justify-between mt-6 text-blue-500">
                    @if ($previousPost)
                        <a href="{{ route('post.show', $previousPost->id) }}" class="hover:underline">
                            &larr; {{ $previousPost->title }}
                        </a>
                    @else
                        <span class="text-gray-400">No hi ha cap post anterior</span>
                    @endif

                    @if ($nextPost)
                        <a href="{{ route('post.show', $nextPost->id) }}" class="hover:underline">
                            {{ $nextPost->title }} &rarr;
                        </a>
                    @else
                        <span class="text-gray-400">No hi ha cap post següent</span>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1 py-8 lg:ps-8">
            <h3 class="text-lg font-semibold dark:text-white mb-3">Articles Relacionats</h3>
            @forelse ($relatedPosts as $related)
                <a class="group flex gap-x-4 mb-4 p-3 bg-white dark:bg-neutral-800 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-neutral-700 transition"
                   href="{{ route('post.show', $related->id) }}">

                    <div class="relative w-20 h-20 rounded-lg overflow-hidden shrink-0">
                        <img class="size-full absolute top-0 start-0 object-cover rounded-lg"
                             src="{{ asset('storage/' . ($related->img ?? 'default.jpg')) }}"
                             alt="{{ $related->title }}">
                    </div>

                    <div class="flex flex-col justify-center px-2 w-full">
                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200 leading-tight">
                            {{ $related->title }}
                        </span>
						<span class="block text-sm text-gray-600 dark:text-neutral-200 leading-tight">
                            {{ $related->excerpt }}
                        </span>
                    </div>

                </a>
            @empty
                <p class="text-sm text-gray-600 dark:text-neutral-400">No hi ha articles relacionats.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection
