<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="icon" href="{{ asset('images/administracio.png') }}">
    <!-- tailwind 3 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"
        integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- npm run build -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('build/assets/app-gTmIigoR.css.css') }} " />
    <script type="text/javascript" src=" {{ asset('build/assets/app-C1-XIpUa.js') }} "></script>


    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
	
    <!-- copy CSS AL HEAD -->
    <link rel="stylesheet" href="{{ asset('copy/style.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
    <style>
        .preview {
            position: fixed;
            display: none;
            border: 1px solid #ccc;
            background-color: white;
            padding: 10px;
            z-index: 1000;
            width: 70%;
            height: 70%;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            overflow: hidden;
        }

        .preview iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>

    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: transparent;
            /* Cambiado a transparente */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>


    <!-- masonry -->
    <style>
        .masonry {
            column-count: 5;
            column-gap: 1rem;
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1rem;
        }

        @media (max-width: 1200px) {
            .masonry {
                column-count: 3;
            }
        }

        @media (max-width: 992px) {
            .masonry {
                column-count: 2;
            }
        }

        @media (max-width: 768px) {
            .masonry {
                column-count: 1;
            }
        }
    </style>

    <style>
        /*Overrides for Tailwind CSS */
        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #edf2f7;
            background-color: #edf2f7;
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header x-data="{ mobileMenuOpen: false }" class="relative z-30 bg-white">
            <div class="px-8 mx-auto xl:px-5 max-w-7xl">
                <div
                    class="flex items-center justify-between h-24 border-b-2 border-gray-100 md:justify-start md:space-x-6">
                    <div class="inline-flex">
                        <a href="/"
                            class="flex items-center justify-center space-x-3 transition-all duration-1000 ease-out transform text-wave-500">
                            <img src="{{ asset('images/administracio.png') }}" align="left" width="50" height="" />
                        </a>
                        <h1
                            class="font-bold text-3xl text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline basis-1/2">
                            <a href="/welcome">{{ config('app.name') }}<span
                                    class="text-indigo-600 dark:text-indigo-400"></span></a></h1>
                    </div>
                    <div class="flex justify-end flex-grow -my-2 -mr-2 md:hidden">
                        <button @click="mobileMenuOpen = true" type="button"
                            class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                            <svg class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8h16M4 16h16"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- This is the homepage nav when a user is not logged in -->
                    <nav class="flex items-center justify-end flex-1 hidden w-full h-full space-x-10 md:flex">
                        <div @mouseenter="dropdown = true" @mouseleave="dropdown=false" @click.away="dropdown=false"
                            x-data="{ dropdown: false }" class="relative h-full select-none">
                            <div :class="{ 'text-wave-600': dropdown, 'text-gray-500': !dropdown }"
                                class="inline-flex items-center h-full space-x-2 text-base font-medium leading-6 transition duration-150 ease-in-out cursor-pointer select-none group hover:text-wave-600 focus:outline-none focus:text-wave-600 text-gray-500">
                                <span>Pages</span>
                                <svg class="w-5 h-5 transition duration-150 ease-in-out group-hover:text-wave-600 group-focus:text-wave-600 text-gray-400"
                                    x-bind:class="{ 'text-wave-600': dropdown, 'text-gray-400': !dropdown }"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div x-show="dropdown" x-transition:enter="duration-200 ease-out scale-95"
                                x-transition:enter-start="opacity-50 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition duration-100 ease-in scale-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="fixed w-full transform -translate-x-1/2 xl:w-screen xl:max-w-6xl xl:px-2 xl:absolute sm:px-0 lg:ml-0 left-1/2"
                                style="display: none;">
                                <div class="overflow-hidden shadow-lg xl:rounded-xl">
                                    <div
                                        class="flex items-stretch justify-center overflow-hidden bg-white shadow-xs xl:rounded-xl">
                                        <div class="flex flex-col">
                                            <div class="flex h-full">

                                                <div
                                                    class="relative z-20 grid gap-6 px-5 pt-6 pb-8 bg-white border-t border-b border-transparent xl:border-gray-200 sm:gap-8 sm:p-8">
                                                    <p class="text-base font-medium leading-6 text-gray-900 uppercase">
                                                        datatables</p>
                          
                                                    <?php
// Defineix el directori on es troben les imatges
$directory = 'C:\xampp\htdocs\LARAVEL\postslar11\public\images\datatables';

// Obté una llista de fitxers del directori
$files = scandir($directory);

// Filtra només els fitxers que són imatges
$images = array_filter($files, function($file) use ($directory) {
    return is_file($directory . '/' . $file);
});

?>

        <?php foreach ($images as $image): 
            // Obté el nom del fitxer sense l'extensió
            $filename = pathinfo($image, PATHINFO_FILENAME);
            // Divideix el nom del fitxer abans i després del guió (-)
            list($title_before, $title_after) = explode('-', $filename, 2);
        ?>
            <a href="/<?php echo htmlspecialchars($title_before); ?>" 
               class="flex items-start inline-block p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg group">
                <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mt-1 mr-3 transition duration-300 ease-in-out transform scale-100 bg-indigo-100 rounded-full text-wave-600 group-hover:text-white group-hover:bg-wave-600 group-hover:scale-110 group-hover:rotate-3 -rotate-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="none" stroke="#5767e3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15v3a1 1 0 0 0 1 1h4v-4m-5 0v-4m0 4h5m-5-4V6a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v1.99M3 11h5v4m9.47 4.172l-.869-1.439l-2.816-.235l-2.573-4.257l1.487-2.836l1.444 2.389a1.353 1.353 0 1 0 2.316-1.4l-1.444-2.39h3.136l2.61 4.278l-1.072 2.585l.87 1.438"/></svg>
                </div>
                <div class="space-y-1">
                    <p class="text-base font-medium leading-6 text-gray-900">
                        <?php echo htmlspecialchars($title_before); ?>
                    </p>
                    <p class="text-sm leading-5 text-gray-500">
                        <?php echo htmlspecialchars($title_after); ?>
                    </p>
                </div>
            </a>
        <?php endforeach; ?>
    
                                                    
                                                </div>

                                                <div
                                                    class="relative z-20 grid gap-6 px-5 pt-6 pb-8 bg-white border-t border-b border-transparent xl:border-gray-200 sm:gap-8 sm:p-8">
                                                    <p class="text-base font-medium leading-6 text-gray-900 uppercase">
                                                        galleries</p>
                                                    <?php
// Defineix el directori on es troben les imatges
$directory = 'C:\xampp\htdocs\LARAVEL\postslar11\public/images/galleries';

// Obté una llista de fitxers del directori
$files = scandir($directory);

// Filtra només els fitxers que són imatges
$images = array_filter($files, function($file) use ($directory) {
    return is_file($directory . '/' . $file);
});

?>

        <?php foreach ($images as $image): 
            // Obté el nom del fitxer sense l'extensió
            $filename = pathinfo($image, PATHINFO_FILENAME);
            // Divideix el nom del fitxer abans i després del guió (-)
            list($title_before, $title_after) = explode('-', $filename, 2);
        ?>
            <a href="/<?php echo htmlspecialchars($title_before); ?>" 
               class="flex items-start inline-block p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg group">
                <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mt-1 mr-3 transition duration-300 ease-in-out transform scale-100 bg-indigo-100 rounded-full text-wave-600 group-hover:text-white group-hover:bg-wave-600 group-hover:scale-110 group-hover:rotate-3 -rotate-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="#5767e3" d="M18.512 10.077c0 .739-.625 1.338-1.396 1.338s-1.395-.6-1.395-1.338s.625-1.337 1.395-1.337s1.396.598 1.396 1.337"/><path fill="#5767e3" fill-rule="evenodd" d="M18.036 5.532c-1.06-.136-2.414-.136-4.123-.136h-3.826c-1.71 0-3.064 0-4.123.136c-1.09.141-1.974.437-2.67 1.104c-.696.668-1.005 1.514-1.152 2.56C2 10.21 2 11.508 2 13.147v.1c0 1.639 0 2.937.142 3.953c.147 1.045.456 1.891 1.152 2.558c.696.668 1.58.964 2.67 1.104C7.024 21 8.378 21 10.087 21h3.826c1.71 0 3.064 0 4.123-.137c1.09-.14 1.974-.436 2.67-1.104c.696-.667 1.005-1.513 1.152-2.558c.142-1.016.142-2.314.142-3.953v-.1c0-1.64 0-2.937-.142-3.953c-.147-1.045-.456-1.891-1.152-2.559c-.696-.667-1.58-.963-2.67-1.104M6.15 6.858c-.936.12-1.475.347-1.87.724c-.393.378-.629.894-.755 1.791c-.1.72-.123 1.62-.128 2.796l.47-.395c1.125-.943 2.819-.889 3.875.123l3.99 3.825a1.2 1.2 0 0 0 1.491.124l.278-.187a3.606 3.606 0 0 1 4.34.25l2.407 2.078c.098-.264.173-.58.227-.965c.128-.916.13-2.124.13-3.824s-.002-2.908-.13-3.825c-.126-.897-.362-1.413-.756-1.79c-.393-.378-.933-.604-1.869-.725c-.956-.123-2.216-.125-3.99-.125h-3.72c-1.774 0-3.034.002-3.99.125" clip-rule="evenodd"/><path fill="#5767e3" d="M17.086 2.61c-.86-.11-1.954-.11-3.319-.11h-3.09c-1.364 0-2.459 0-3.319.11c-.89.115-1.632.358-2.221.92a2.9 2.9 0 0 0-.724 1.12c.504-.23 1.074-.366 1.714-.45c1.084-.14 2.47-.14 4.22-.14h3.914c1.75 0 3.135 0 4.22.14c.558.073 1.064.186 1.519.366a2.9 2.9 0 0 0-.692-1.035c-.589-.563-1.331-.806-2.222-.92"/></svg>
                </div>
                <div class="space-y-1">
                    <p class="text-base font-medium leading-6 text-gray-900">
                        <?php echo htmlspecialchars($title_before); ?>
                    </p>
                    <p class="text-sm leading-5 text-gray-500">
                        <?php echo htmlspecialchars($title_after); ?>
                    </p>
                </div>
            </a>
        <?php endforeach; ?>
                                                </div>
                                                <div
                                                    class="relative z-20 grid gap-6 px-5 pt-6 pb-8 bg-white border-t border-b border-r border-transparent rounded-r-xl xl:border-gray-200 sm:gap-8 sm:p-8">
                                                    <p class="text-base font-medium leading-6 text-gray-900 uppercase">
                                                        presentacio i contingut</p>
                                                    <?php
// Defineix el directori on es troben les imatges
$directory = 'C:\xampp\htdocs\LARAVEL\postslar11\public/images/contingut';

// Obté una llista de fitxers del directori
$files = scandir($directory);

// Filtra només els fitxers que són imatges
$images = array_filter($files, function($file) use ($directory) {
    return is_file($directory . '/' . $file);
});

?>

        <?php foreach ($images as $image): 
            // Obté el nom del fitxer sense l'extensió
            $filename = pathinfo($image, PATHINFO_FILENAME);
            // Divideix el nom del fitxer abans i després del guió (-)
            list($title_before, $title_after) = explode('-', $filename, 2);
        ?>
            <a href="/<?php echo htmlspecialchars($title_before); ?>" 
               class="flex items-start inline-block p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg group">
                <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mt-1 mr-3 transition duration-300 ease-in-out transform scale-100 bg-indigo-100 rounded-full text-wave-600 group-hover:text-white group-hover:bg-wave-600 group-hover:scale-110 group-hover:rotate-3 -rotate-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 2048 2048"><path fill="#5767e3" d="M1536 640h512v1280H512v-512H0V128h1536zm384 128h-384v128h384zm-512-512H128v128h1280zM128 512v768h1280V512zm512 1280h1280v-768h-384v384H640z"/></svg>
                </div>
                <div class="space-y-1">
                    <p class="text-base font-medium leading-6 text-gray-900">
                        <?php echo htmlspecialchars($title_before); ?>
                    </p>
                    <p class="text-sm leading-5 text-gray-500">
                        <?php echo htmlspecialchars($title_after); ?>
                    </p>
                </div>
            </a>
        <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/list-routes"
                            class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                            routes
                        </a>
                        <a href="/gallery"
                            class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                            gallery
                        </a>
                        <a href="/admin/posts"
                            class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                            admin
                        </a>
                        <div @mouseenter="dropdown = true" @mouseleave="dropdown=false" @click.away="dropdown=false"
                            x-data="{ dropdown: false }" class="relative h-full select-none">
                            <div @click="dropdown = !dropdown"
                                :class="{ 'text-wave-600': dropdown, 'text-gray-500': !dropdown }"
                                class="inline-flex items-center h-full space-x-2 text-base font-medium leading-6 transition duration-150 ease-in-out cursor-pointer select-none hover:text-wave-600 focus:outline-none focus:text-wave-500 text-gray-500">
                                <span>Projects</span>
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div x-show="dropdown" x-transition:enter="duration-200 ease-out scale-95"
                                x-transition:enter-start="opacity-50 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition duration-100 ease-in scale-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute w-screen max-w-sm px-2 transform -translate-x-1/2 left-1/2 sm:px-0"
                                style="display: none;">
                                <div class="shadow-lg rounded-xl">
                                    <div class="overflow-hidden border border-gray-100 shadow-md rounded-xl">
                                        <div class="relative z-20 grid bg-blue-100 text-center">
										
										
<?php
$hostsFile = 'C:\Windows\System32\drivers\etc\hosts';
if (file_exists($hostsFile)) {
$lines = file($hostsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$validHosts = [];

foreach ($lines as $line) {
$line = trim($line);

// Procesar líneas válidas de hosts
if (!empty($line) && strpos($line, '#') !== 0) {
$parts = preg_split('/\s+/', $line);
if (isset($parts[1])) {
$validHosts[] = $parts[1]; // Agregar solo el dominio
}
}
}

foreach ($validHosts as $host) {
echo '<a class="flex text-center mx-2 transition duration-150 ease-in-out rounded-lg  group"><a href="http://' . htmlspecialchars($host, ENT_QUOTES, 'UTF-8') . '" class="active">' . htmlspecialchars($host, ENT_QUOTES, 'UTF-8') . '</a>';
}
} else {
echo '<li><span class="text-gray-500">Archivo hosts no encontrado.</span></li>';
}
?>									
										
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1 h-5 mx-10 border-r border-gray-300"></div>
                        @if (Route::has('login'))


                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                                        Register
                                    </a>
                                @endif
                            @endauth


                        @endif
                    </nav>
                </div>
            </div>
            <div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out scale-100"
                x-transition:enter-start="opacity-50 scale-110" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition duration-75 ease-in scale-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100"
                class="absolute inset-x-0 top-0 transition origin-top transform md:hidden" style="display: none;">
                <div class="shadow-lg">
                    <div class="bg-white divide-y-2 shadow-xs divide-gray-50">
                        <div class="pt-6 pb-6 space-y-6">
                            <div class="flex items-center justify-between px-8 mt-1">
                                <div>
                                    <svg class="w-9 h-9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 205 205">
                                        <defs>
                                            <linearGradient id="a" x1="50%" x2="50%"
                                                y1="0%" y2="100%">
                                                <stop offset="0%" stop-color="#1B56E7"></stop>
                                                <stop offset="100%" stop-color="#3987E9"></stop>
                                            </linearGradient>
                                            <linearGradient id="b" x1="50%" x2="50%"
                                                y1="0%" y2="100%">
                                                <stop offset="0%" stop-color="#07A2FF"></stop>
                                                <stop offset="100%" stop-color="#3E78EF"></stop>
                                            </linearGradient>
                                            <linearGradient id="c" x1="50%" x2="50%"
                                                y1="0%" y2="100%">
                                                <stop offset="0%" stop-color="#4ADBFA"></stop>
                                                <stop offset="100%" stop-color="#24B4F2"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g fill="none" fill-rule="evenodd">
                                            <path fill="url(#a)"
                                                d="M182.63 37c14.521 18.317 22.413 41.087 22.37 64.545C205 158.68 159.1 205 102.486 205c-39.382-.01-75.277-22.79-92.35-58.605C-6.939 110.58-2.172 68.061 22.398 37a105.958 105.958 0 00-9.15 43.352c0 54.239 39.966 98.206 89.265 98.206 49.3 0 89.265-43.973 89.265-98.206A105.958 105.958 0 00182.629 37z">
                                            </path>
                                            <path fill="url(#b)"
                                                d="M103.11 0A84.144 84.144 0 01150 14.21C117.312-.651 78.806 8.94 56.7 37.45c-22.105 28.51-22.105 68.58 0 97.09c22.106 28.51 60.612 38.101 93.3 23.239-30.384 20.26-70.158 18.753-98.954-3.75-28.797-22.504-40.24-61.021-28.47-95.829C34.346 23.392 66.723.002 103.127.006L103.11 0z">
                                            </path>
                                            <path fill="url(#c)"
                                                d="M116.479 13c36.655-.004 67.014 28.98 69.375 66.234c2.36 37.253-24.089 69.971-60.44 74.766 29.817-8.654 48.753-38.434 44.308-69.685-4.445-31.25-30.9-54.333-61.904-54.014-31.003.32-56.995 23.944-60.818 55.28v-1.777C46.99 44.714 78.096 13.016 116.479 13z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="-mr-2">
                                    <button @click="mobileMenuOpen = false" type="button"
                                        class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <nav class="grid row-gap-8">
                                    <a href="#"
                                        class="flex items-center px-8 py-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 w-6 h-6 ml-0.5 text-wave-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <div class="text-base font-medium leading-6 text-gray-900">
                                            Authentication
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-8 py-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 w-6 h-6 ml-0.5 text-wave-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                            </path>
                                        </svg>
                                        <div class="text-base font-medium leading-6 text-gray-900">
                                            Billing
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-8 py-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 w-6 h-6 ml-0.5 text-wave-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <div class="text-base font-medium leading-6 text-gray-900">
                                            User Profiles
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-8 py-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 w-6 h-6 ml-0.5 text-wave-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                            </path>
                                        </svg>
                                        <div class="text-base font-medium leading-6 text-gray-900">
                                            Themes
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-8 py-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 w-6 h-6 ml-0.5 text-wave-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <div class="text-base font-medium leading-6 text-gray-900">
                                            Developer API
                                        </div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                        <div class="px-8 py-6 space-y-6">
                            <div class="grid grid-cols-2 row-gap-4 col-gap-8 px-1 pb-4">
                                <a href="/#pricing"
                                    class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                                    Pricing
                                </a>
                                <a href="#"
                                    class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                                    Docs
                                </a>
                                <a href="#"
                                    class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                                    Blog
                                </a>
                                <a href="#"
                                    class="text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700">
                                    Videos
                                </a>
                            </div>
                            <div class="space-y-6">
                                <span class="flex w-full rounded-md shadow-sm">
                                    <a href="https://wave.devdojo.com/register"
                                        class="flex items-center justify-center w-full px-4 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave">
                                        Sign up
                                    </a>
                                </span>
                                <p class="text-base font-medium leading-6 text-center text-gray-500">
                                    Existing customer?
                                    <a href="https://wave.devdojo.com/login"
                                        class="transition duration-150 ease-in-out text-wave-600 hover:text-wave-500">
                                        Sign in
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="container mx-auto">
        @yield('content')
    </div>
    <div id="preview" class="preview"></div>

    <footer class=" px-4 pb-6">
        <div class="max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-5 text-center">
                <div>
                    <h1
                        class="font-bold text-3xl text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline basis-1/2">
                        <a href="/">{{ config('app.name') }}<span
                                class="text-indigo-600 dark:text-indigo-400"></span></a></h1>
                </div>
                <!-- End Col -->
                <ul class="text-center">
                    <li
                        class="inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                        <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200"
                            href="/gallery/detalle/joanpuig">
                            watercolors
                        </a>
                    </li>
                    <li
                        class="inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                        <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200"
                            href="/webs">
                            Webs-Services
                        </a>
                    </li>
                    <li
                        class="inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                        <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200"
                            href="/">
                            Blog
                        </a>
                    </li>
                </ul>
                <!-- End Col -->
                <!-- Social Brands -->
                <div class="md:text-right space-x-2">
                    <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                        href="https://github.com/estudijoanpuig" target="_blank">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                    <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                        href="https://www.instagram.com/estudijoanpuig/" target="_blank">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                        href="https://www.facebook.com/joanpuigbertran" target="_blank">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                        href="https://estudijoanpuig.com/" target="_blank">
                        <i class="fas fa-globe fa-2x"></i>
                    </a>
                </div>
                <!-- End Social Brands -->
            </div>
            <!-- End Grid -->
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </footer>
    <!-- Implement the Back Top Top Button -->
    <button id="to-top-button" onclick="goToTop()" title="Go To Top"
        class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full drop-shadow-md bg-indigo-500 text-white text-3xl font-bold">&uarr;</button>
    <!-- Javascript code -->
    <script>
        var toTopButton = document.getElementById("to-top-button");
        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        }
        // When the user clicks on the button, smoothy scroll to the top of the document
        function goToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    </div>

    <!-- copy al final body-->
    <script src='https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?skin=sunburst'></script>
    <script src="{{ asset('copy/script.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    @stack('scripts')
</body>

</html>
