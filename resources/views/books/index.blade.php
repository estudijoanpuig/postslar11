@extends('layouts.prova')
@section('ruta', '/books')
@section('title', 'Galeria de Llibres')
@section('descripcio', 'Explora la nostra col·lecció de llibres en format digital')

@section('content')

    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">

            <!-- Header amb imatge de fons -->
            <div class="w-full mx-auto text-center bg-cover bg-center mb-8"
                style="background-image: url('/path/to/books-banner.jpg');">
                <h1
                    class="mb-2 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight text-center">
                    @yield('ruta')
                    <span
                        class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-blue-400 to-green-500 lg:inline">
                        @yield('title')
                    </span>
                </h1>
                <p class="font-mono font-light italic text-center">@yield('descripcio')</p>
            </div>

            <!-- Galeria de llibres -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">


                        <a data-fancybox data-type="pdf" href="/storage/{{ $book->pdf_url }}">{{ $book->title }}

                            <img src="/storage/{{ $book->img }}" class="w-full h-60 object-cover rounded-md mb-4"
                                alt="{{ $book->title }}">
                            <h2 class="text-lg text-cyan-600 font-medium title-font mb-4 text-center break-words">
                                {{ $book->title }}</h2>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Paginació -->
            <div class="mt-6">
                {{ $books->links() }}
            </div>

        </div>
    </section>

@endsection
