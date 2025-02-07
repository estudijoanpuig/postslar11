<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- tailwind 3 -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" type="text/css" href=" {{ asset('build/assets/app-gTmIigoR.css.css') }} " />
    <script type="text/javascript" src=" {{ asset('build/assets/app-C1-XIpUa.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"
        integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- datatables i jquery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <!-- copy CSS AL HEAD -->
    <link rel="stylesheet" href="{{ asset('copy/style.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
            column-count: 4;
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
                            <img src="{{ asset('img/logo.png') }}" align="left" width="50" height="" />
                        </a>
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
                                                        $servername = "localhost";
                                                        $username = "root";
                                                        $password = "";
                                                        $dbname = "postslar11";
                                                        // Create connection
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }
                                                        $sql = "SELECT * FROM `posts` WHERE category_id = 10 AND title LIKE '%datatables%' AND title LIKE '%tailwind%' ORDER BY title ASC";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <a href="<?php echo "$row[url]"; ?>" target="_blank"
                                                        class="flex items-start inline-block p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg group">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mt-1 mr-3 transition duration-300 ease-in-out transform scale-100 bg-indigo-100 rounded-full text-wave-600 group-hover:text-white group-hover:bg-wave-600 group-hover:scale-110 group-hover:rotate-3 -rotate-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 48 48">
                                                                <path fill="none" stroke="#d30ced"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5.5 9.308v29.383h37V9.308zm0 14.224h37m-37 7.58h37m-12.33-15.17v22.75m-12.34-22.75v22.75M5.5 15.942h37" />
                                                            </svg>
                                                        </div>
                                                        <div class="space-y-1">
                                                            <p class="text-base font-medium leading-6 text-gray-900">
                                                                <?php echo "$row[title]"; ?>
                                                            </p>
                                                            <p class="text-sm leading-5 text-gray-500">
                                                                <?php echo "$row[excerpt]"; ?>
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <?php }
                                                        } else {
                                                            echo "0 results";
                                                        }
                                                        $conn->close();
                                                    ?>
                                                </div>

                                                <div
                                                    class="relative z-20 grid gap-6 px-5 pt-6 pb-8 bg-white border-t border-b border-transparent xl:border-gray-200 sm:gap-8 sm:p-8">
                                                    <p class="text-base font-medium leading-6 text-gray-900 uppercase">
                                                        galleries</p>
                                                    <?php
                                                        $servername = "localhost";
                                                        $username = "root";
                                                        $password = "";
                                                        $dbname = "postslar11";
                                                        // Create connection
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }
                                                        $sql = "SELECT * FROM `posts` WHERE category_id = 10 AND title LIKE '%gallery%' AND title LIKE '%tailwind%' ORDER BY title ASC";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <a href="<?php echo "$row[url]"; ?>" target="_blank"
                                                        class="flex items-start inline-block p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg group">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mt-1 mr-3 transition duration-300 ease-in-out transform scale-100 bg-indigo-100 rounded-full text-wave-600 group-hover:text-white group-hover:bg-wave-600 group-hover:scale-110 group-hover:rotate-3 -rotate-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 24 24">
                                                                <path fill="none" stroke="#d30ced" stroke-width="2"
                                                                    d="M1 1h18v18H1zm4 18v4h18V5.97h-4M6 8a1 1 0 1 0 0-2a1 1 0 0 0 0 2ZM2 18l5-6l3 3l4-5l5 6" />
                                                            </svg>
                                                        </div>
                                                        <div class="space-y-1">
                                                            <p class="text-base font-medium leading-6 text-gray-900">
                                                                <?php echo "$row[title]"; ?>
                                                            </p>
                                                            <p class="text-sm leading-5 text-gray-500">
                                                                <?php echo "$row[excerpt]"; ?>
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <?php }
                                                        } else {
                                                            echo "0 results";
                                                        }
                                                        $conn->close();
                                                    ?>
                                                </div>
                                                <div
                                                    class="relative z-20 grid gap-6 px-5 pt-6 pb-8 bg-white border-t border-b border-r border-transparent rounded-r-xl xl:border-gray-200 sm:gap-8 sm:p-8">
                                                    <p class="text-base font-medium leading-6 text-gray-900 uppercase">
                                                        presentacio i contingut</p>
                                                    <?php
                                                        $servername = "localhost";
                                                        $username = "root";
                                                        $password = "";
                                                        $dbname = "postslar11";
                                                        // Create connection
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }
                                                        $sql = "SELECT * FROM `posts` WHERE category_id = 10 AND title LIKE '%yajra%' AND title LIKE '%tw%' ORDER BY title ASC";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <a href="<?php echo "$row[url]"; ?>" target="_blank"
                                                        class="flex items-start inline-block p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg group">
                                                        <div
                                                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mt-1 mr-3 transition duration-300 ease-in-out transform scale-100 bg-indigo-100 rounded-full text-wave-600 group-hover:text-white group-hover:bg-wave-600 group-hover:scale-110 group-hover:rotate-3 -rotate-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                                height="48" viewBox="0 0 128 128">
                                                                <path fill="#38bdf8"
                                                                    d="M64.004 25.602c-17.067 0-27.73 8.53-32 25.597c6.398-8.531 13.867-11.73 22.398-9.597c4.871 1.214 8.352 4.746 12.207 8.66C72.883 56.629 80.145 64 96.004 64c17.066 0 27.73-8.531 32-25.602q-9.6 12.803-22.399 9.602c-4.87-1.215-8.347-4.746-12.207-8.66c-6.27-6.367-13.53-13.738-29.394-13.738M32.004 64c-17.066 0-27.73 8.531-32 25.602Q9.603 76.799 22.402 80c4.871 1.215 8.352 4.746 12.207 8.66c6.274 6.367 13.536 13.738 29.395 13.738c17.066 0 27.73-8.53 32-25.597q-9.6 12.797-22.399 9.597c-4.87-1.214-8.347-4.746-12.207-8.66C55.128 71.371 47.868 64 32.004 64m0 0" />
                                                            </svg>
                                                        </div>
                                                        <div class="space-y-1">
                                                            <p class="text-base font-medium leading-6 text-gray-900">
                                                                <?php echo "$row[title]"; ?>
                                                            </p>
                                                            <p class="text-sm leading-5 text-gray-500">
                                                                <?php echo "$row[excerpt]"; ?>
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <?php }
                                                        } else {
                                                            echo "0 results";
                                                        }
                                                        $conn->close();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/gallery"
                            class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                            gallery
                        </a>
                        <a href="/admin"
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
                                        <div class="relative z-20 grid bg-white">
                                            <?php
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "postslar11";
                                                // Create connection
                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }
                                                $sql = "SELECT * FROM `posts` WHERE category_id = 10 AND title LIKE '%projecte%'  ORDER BY title ASC";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                            ?>
                                            <a href="<?php echo "$row[url]"; ?>"
                                                class="flex items-start p-10 -m-3 space-x-3 transition duration-150 ease-in-out rounded-lg pb-7 group">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none" stroke="#d30ced" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5">
                                                        <path
                                                            d="m17.674 11.408l-1.905 5.715a.6.6 0 0 1-.398.386L3.693 20.98a.6.6 0 0 1-.74-.765L6.745 8.841a.6.6 0 0 1 .34-.365l5.387-2.218a.6.6 0 0 1 .653.13l4.404 4.406a.6.6 0 0 1 .145.614M3.296 20.602l6.364-6.364" />
                                                        <path
                                                            d="m17.792 11.056l2.828-2.829a2 2 0 0 0 0-2.828L18.5 3.277a2 2 0 0 0-2.829 0l-2.828 2.829m-1.062 6.01a1.5 1.5 0 1 0-2.121 2.122a1.5 1.5 0 0 0 2.121-2.122" />
                                                    </g>
                                                </svg>
                                                <div class="space-y-1">
                                                    <p
                                                        class="text-base font-medium leading-6 text-gray-700 duration-200 group-hover:text-gray-900 transition-color ease">
                                                        <?php echo "$row[title]"; ?>
                                                    </p>
                                                    <p
                                                        class="text-xs font-normal leading-5 text-gray-500 duration-200 group-hover:text-gray-700 transition-color ease">
                                                        <?php echo "$row[excerpt]"; ?>
                                                    </p>
                                                </div>
                                            </a>
                                            <?php }
                                                } else {
                                                    echo "0 results";
                                                }
                                                $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1 h-5 mx-10 border-r border-gray-300"></div>
                        <a href="/login"
                            class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap hover:text-wave-600 focus:outline-none focus:text-gray-900">
                            login
                        </a>
                        <span class="inline-flex rounded-md ">
                            <a href="/register"
                                class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-500 hover:bg-wave-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-wave active:bg-wave-700">
                                register
                            </a>
                        </span>
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
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg" />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            @yield('content')
        </div>
        <footer class=" px-4 pb-6">
            <div class="max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-5 text-center">
                    <div>
                        <h1
                            class="font-bold text-3xl text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline basis-1/2">
                            <a href="index.php">{{ config('app.name') }}<span
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2Z" />
                            </svg>
                        </a>
                        <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                            href="https://www.instagram.com/estudijoanpuig/" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M13.028 2.001a78.82 78.82 0 0 1 2.189.022l.194.007c.224.008.445.018.712.03c1.064.05 1.79.218 2.427.465c.66.254 1.216.598 1.772 1.154a4.908 4.908 0 0 1 1.153 1.771c.247.637.415 1.364.465 2.428c.012.266.022.488.03.712l.006.194a79 79 0 0 1 .023 2.188l.001.746v1.31a78.836 78.836 0 0 1-.023 2.189l-.006.194c-.008.224-.018.445-.03.712c-.05 1.064-.22 1.79-.466 2.427a4.884 4.884 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-.267.012-.488.022-.712.03l-.194.006a79 79 0 0 1-2.189.023l-.746.001h-1.309a78.836 78.836 0 0 1-2.189-.023l-.194-.006a60.64 60.64 0 0 1-.712-.03c-1.064-.05-1.79-.22-2.428-.466a4.89 4.89 0 0 1-1.771-1.153a4.904 4.904 0 0 1-1.154-1.772c-.247-.637-.415-1.363-.465-2.427a74.367 74.367 0 0 1-.03-.712l-.005-.194A79.053 79.053 0 0 1 2 13.028v-2.056a78.82 78.82 0 0 1 .022-2.188l.007-.194c.008-.224.018-.446.03-.712c.05-1.065.218-1.79.465-2.428A4.88 4.88 0 0 1 3.68 3.68a4.897 4.897 0 0 1 1.77-1.155c.638-.247 1.363-.415 2.428-.465l.712-.03l.194-.005A79.053 79.053 0 0 1 10.972 2h2.056Zm-1.028 5A5 5 0 1 0 12 17a5 5 0 0 0 0-10Zm0 2A3 3 0 1 1 12.001 15a3 3 0 0 1 0-6Zm5.25-3.5a1.25 1.25 0 0 0 0 2.498a1.25 1.25 0 0 0 0-2.5Z" />
                            </svg>
                        </a>
                        <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                            href="https://www.facebook.com/joanpuigbertran" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 48 48">
                                <path fill="#2F88FF" stroke="#000" stroke-linejoin="round" stroke-width="3.8"
                                    d="M36 12.5997H31.2489H29.9871C28.9009 12.5997 28.0203 13.4803 28.0203 14.5666V21.4674H36L34.8313 29.0643H28.0203V43H19.2451V29.0643H12V21.4674H19.1515L19.2451 14.2563L19.2318 12.9471C19.1879 8.60218 22.6745 5.04434 27.0194 5.0004C27.0459 5.00013 27.0724 5 27.0989 5H36V12.5997Z" />
                            </svg>
                        </a>
                        <a class="inline-flex justify-center items-center w-8 h-8 text-center text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800 dark:focus:ring-offset-slate-900"
                            href="https://estudijoanpuig.com/" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10s10-4.49 10-10S17.51 2 12 2zM3.01 12c0-1.3.28-2.54.78-3.66l4.29 11.75c-3-1.46-5.07-4.53-5.07-8.09zM12 20.99c-.88 0-1.73-.13-2.54-.37l2.7-7.84l2.76 7.57c.02.04.04.09.06.12c-.93.34-1.93.52-2.98.52zm1.24-13.21c.54-.03 1.03-.09 1.03-.09c.48-.06.43-.77-.06-.74c0 0-1.46.11-2.4.11c-.88 0-2.37-.11-2.37-.11c-.48-.02-.54.72-.05.75c0 0 .46.06.94.09l1.4 3.84l-1.97 5.9l-3.27-9.75c.54-.02 1.03-.08 1.03-.08c.48-.06.43-.77-.06-.74c0 0-1.46.11-2.4.11c-.17 0-.37 0-.58-.01C6.1 4.62 8.86 3.01 12 3.01c2.34 0 4.47.89 6.07 2.36c-.04 0-.08-.01-.12-.01c-.88 0-1.51.77-1.51 1.6c0 .74.43 1.37.88 2.11c.34.6.74 1.37.74 2.48c0 .77-.3 1.66-.68 2.91l-.9 3l-3.24-9.68zm6.65-.09a8.988 8.988 0 0 1-3.37 12.08l2.75-7.94c.51-1.28.68-2.31.68-3.22c0-.33-.02-.64-.06-.92z" />
                            </svg>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>
