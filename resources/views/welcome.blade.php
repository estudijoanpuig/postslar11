@extends('layouts.prova')
@section('ruta', 'welcome')
@section('title', 'presentacio projecte')
@section('descripcio', 'tailwind 3, filament 3, yajra-datatables, swiper.')
@section('content')


<section class="pt-12 ">

    <div class="px-12 mx-auto max-w-7xl">
        <div class="w-full mx-auto text-left md:w-11/12 xl:w-9/12 md:text-center">
		
            <h1 class="mb-8 text-3xl font-extrabold leading-none tracking-normal text-gray-900 md:text-4xl md:tracking-tight">
                <span>@yield('ruta')</span> <span class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline"> @yield('title'): {{ config('app.name') }}</span> <span></span>
            </h1>
			<p class="font-mono font-light italic ">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}), @yield('descripcio') </p>
			
             <div class="px-4 py-3 mt-3 -mx-3 overflow-y-auto whitespace-nowrap ">
			 
					<?php
$servername = "localhost";
$username = "joan";
$password = "queMm88/g62123";
$dbname = "postslar11";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `posts` WHERE `category_id` IN ('3', '4') ORDER BY `title` ASC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { 
?> 

<!-- element que vull repetir -->


				
            <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:my-0" href="<?php echo "$row[url]";?>"target="_blank"><?php echo "$row[title]";?></a>
			
 <?php }
	} else {
	echo "0 results";
}
						$conn->close();
					?> 					
            
        </div>	
            <div class="mb-4 space-x-0 md:space-x-2 md:mb-8">
                <a href="http://administracio.test/?search=Instalaci%C3%B3n+y+Configuraci%C3%B3n+de+Laravel+v11+en+Ubuntu+Server+22.04" class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg text-white bg-green-400 rounded-2xl sm:w-auto sm:mb-0">
                    Get Started
                    <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="https://laravel.com/docs/11.x/installation" class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg bg-gray-100 rounded-2xl sm:w-auto sm:mb-0">
                    Learn More
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full mx-auto mt-20 text-center md:w-10/12">
            <div class="relative z-0 w-full mt-8">
                <div class="relative overflow-hidden shadow-2xl">
                    <div class="flex items-center flex-none px-4 bg-green-400 rounded-b-none h-11 rounded-xl">
                        <div class="flex space-x-1.5">
                            <div class="w-3 h-3 border-2 border-white rounded-full"></div>
                            <div class="w-3 h-3 border-2 border-white rounded-full"></div>
                            <div class="w-3 h-3 border-2 border-white rounded-full"></div>
                        </div>
                    </div>
                    <img src="{{ asset('images/welcome.png') }}">
                </div>
            </div>
        </div>
    </div>
</section>


@stop