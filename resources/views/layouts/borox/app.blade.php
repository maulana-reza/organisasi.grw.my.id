<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- site Favicon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon')}}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon')}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon')}}/favicon-16x16.png">
    <link rel="manifest" href="{{asset('favicon')}}/site.webmanifest">
    <title>{{ config('app.name', 'K UI') }}</title>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
    <!-- css link -->
    <link rel="stylesheet" href="{{asset('assets/borox')}}/assets/font/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/borox')}}/assets/css/aos.min.css">
    <link rel="stylesheet" href="{{asset('assets/borox')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets/borox')}}/assets/css/jquery.fancybox.min.css">

    <!-- main style -->
    <link rel="stylesheet" href="{{asset('assets/borox')}}/assets/css/style.css">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="overflow-x-hidden">
<!-- Loader -->
<div id="bx-overlay">
    <span class="loader"></span>
</div>

<!-- header -->
<header class="bg-[#f6f8ff] w-full bx-static">
    <nav class="border-gray-200 py-2">
        <div
            class="flex flex-wrap justify-between items-center px-6 mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] max-[320px]:px-[12px]">
            <a href="#" class="flex items-center">
                <x-application-logo class="w-[40px] h-[40px]"/>
            </a>
            <div class="flex items-center lg:order-2">
                <a href="{{route('login')}}">
                    <button type="button"
                            class="text-white bg-[#7963e0] hover:bg-opacity-80 no-underline font-medium rounded-full text-sm px-8 py-2.5 mr-2 hidden 2xl:block xl:block lg:block">
                        MASUK
                    </button>
                </a>
                <button data-collapse-toggle="mobile-menu" type="button" id="dropdown-toggle"
                        class="inline-flex items-center border p-2 text-lg text-gray-500 rounded-lg lg:hidden"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu">
                <ul class="flex flex-col font-medium lg:flex-row lg:space-x-8 2xl:border-0 lg:border-0 border lg:mt-0 lg-mb-4 lg:p-[0] lg:border-none lg:rounded-[0] lg:text-[15px] mt-4 p-[15px] 2xl:mb-0 xl:mb-0 lg:mb-0 mb-2 border-[#eee] rounded-[30px] text-[13px]"
                    id="top-menu">
                    <li class="nav-item active">
                        <a href="#home" class="block py-2 pr-4 pl-3 text-[#000] lg:p-0">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="block py-2 pr-4 pl-3 text-[#000] lg:p-0">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a href="#anggota" class="block py-2 pr-4 pl-3 text-[#000] lg:p-0">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a href="#organisasi" class="block py-2 pr-4 pl-3 text-[#000] lg:p-0">Organisasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="block py-2 pr-4 pl-3 text-[#000] lg:p-0">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div>
    {{ $slot }}
</div>
@livewire('livewire-toast')


<!-- Plugins JS -->
<script src="{{asset('assets/borox')}}/assets/js/tailwindcss/frostui.js"></script>
<script src="{{asset('assets/borox')}}/assets/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('assets/borox')}}/assets/js/jquery.fancybox.min.js"></script>
<script src="{{asset('assets/borox')}}/assets/js/mixitup.min.js"></script>
<script src="{{asset('assets/borox')}}/assets/js/aos.min.js"></script>
<script src="{{asset('assets/borox')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/borox')}}/assets/js/jquery.parallaxmouse.min.js"></script>

<!-- Main Js -->
<script src="{{asset('assets/borox')}}/assets/js/index.js"></script>
</body>
@livewireScripts
</html>
