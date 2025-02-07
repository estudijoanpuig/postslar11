@extends('layouts.prova')
@section('ruta', 'project-gallery')
@section('title', 'mostra de projectes')
@section('descripcio', 'galeria swiper agrupats per titol del projecte fins-')
@section('content')

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-6 mx-auto">

            <h1
                class="mb-4 text-3xl text-center font-extrabold leading-none tracking-normal text-gray-900 md:text-4xl md:tracking-tight">
                <span>@yield('ruta')</span> <span
                    class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">
                    @yield('title')</span> <span></span>
            </h1>
            <p class="text-center font-mono font-light italic ">Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                (PHP v{{ PHP_VERSION }}), @yield('descripcio') </p>

            <div class="flex flex-wrap m-6">
                @foreach ($projects as $etiqueta => $projectPosts)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full bg-white rounded-lg overflow-hidden shadow-lg">
                            <h2 class="text-2xl font-bold mb-4 text-center">{{ $etiqueta }}</h2>
                            <div class="swiper-container swiper-{{ $loop->index }}">
                                <div class="swiper-wrapper">
                                    @foreach ($projectPosts as $post)
                                        <div class="swiper-slide">
                                            <a href="{{ $post->url }}"target="_blank"> <img
                                                    src="/storage/{{ $post->img }}" alt="{{ $post->title }}"
                                                    class="w-full h-64 object-cover mb-4"></a>
                                        </div>
                                    @endforeach
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination swiper-pagination-{{ $loop->index }}"></div>
                                    <!-- Add Navigation -->

                                    <div class="swiper-button-prev swiper-button-prev-{{ $loop->index }}"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swipers = document.querySelectorAll('.swiper-container');
            swipers.forEach(function(swiperContainer, index) {
                new Swiper('.swiper-' + index, {
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination-' + index,
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next-' + index,
                        prevEl: '.swiper-button-prev-' + index,
                    },
                });
            });
        });
    </script>
@endsection
