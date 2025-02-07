@extends('layouts.prova')
@section('title', 'llista de Posts datatables tw')
@section('subtitle', 'inici')
@section('content')

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-6 mx-auto">
            <h1
                class="mb-8 text-2xl font-extrabold leading-none tracking-normal text-gray-900 md:text-3xl md:tracking-tight text-center">@yield ('title') <img src="{{ asset('img/datatablestw.png') }}"  align="left" width="50" height="" />
                <span
                    class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">
                    @yield ('subtitle') </span>
            </h1>

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>category</td>
                        <td>title</td>
                        <td>resum</td>
                        <td>url</td>
                        <td>ins</td>
                        <td>face</td>
                        <td>youtube</td>
                        <td>gallery</td>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            
							
							<td>{{ $post->category ? $post->category->name : 'Sin categoría' }}</td>

                            <td>
                                <p class="font-semibold text-blue-600"><a
                                        href="posts/detalle/{{ $post->id }}">{{ $post->title }} </a></p>
                            </td>
                            <td>
                                <p class="text-gray-500">{!! $post->excerpt !!}</p>
                            </td>
                            <td>
                                @if ($post->url)
                                    <a href="{{ $post->url }}" target="_blank" class="text-blue-300"><i
                                            class="fas fa-link"></i> </a>
                                @endif
                            </td>
                            <td>
                                @if ($post->ins)
                                    <a href="{{ $post->ins }}" target="_blank" class="text-pink-500"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                            </td>
                            <td>
                                @if ($post->face)
                                    <a href="{{ $post->face }}" target="_blank" class="text-blue-600"><i
                                            class="fab fa-facebook"></i></a>
                                @endif
                            </td>
                            <td>
                                @if ($post->youtube)
                                    <a data-fancybox="gallery"href="{{ $post->youtube }}" target="_blank"
                                        class="text-red-500"><i class="fab fa-youtube"></i></a>
                                @endif
                            </td>
                            <td>@php
                                $directory = public_path('img/people/' . $post->title);
                            @endphp
                                @if (file_exists($directory) && is_dir($directory))
                                    <a href="{{ route('gallery.detalle', ['title' => $post->title]) }}"
                                        class="text-blue-500 hover:underline">
                                        <i class="fas fa-folder-open text-yellow-500 mr-2"></i>

                                    </a>
                                @else
                                    <p class="text-red-500">No te gal.leria</p>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </td>
                    </tr>
                </tbody>

            </table>


        </div>
        </div>


        </div>
        <!--/Card-->


        </div>
        <!--/container-->

        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>

    @stop
