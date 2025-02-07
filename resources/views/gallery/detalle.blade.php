@extends('layouts.prova')
@section('title', 'gallery detall')
@section('subtitle', '-people')
@section('p', '')
@section('content')

    <div class="container mx-auto p-4">

        <h1
            class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight text-center">
            @yield ('title')<span
                class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">
                - {{ $title }}</span>
        </h1>

        <h1 class="text-3xl font-bold mb-6">{{ $title }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($images as $image)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img data-fancybox="gallery"src="{{ $image }}" alt="{{ $title }}"
                        class="w-full h-100 object-cover">
                </div>
            @endforeach
        </div>
    </div>

@stop
