<!DOCTYPE html>
<html>
<head>

    <title>Coffee Shop</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap"
          rel="stylesheet">

</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<header class="bg-black/80 text-white shadow">

    <div class="flex justify-between items-center p-4">

       <!-- Logo -->
       <h1 class="font-bold text-xl">
           ☕ Coffee Shop
       </h1>

       <!-- Icon Kanan -->
       <div class="flex items-center gap-5">

            <!-- Search -->
            <button id="searchButton"
                    class="text-xl hover:text-yellow-400">

                <i class="fas fa-search"></i>

            </button>

            <!-- Keranjang -->
            <a href="{{ route('cart.index') }}"
               class="relative text-xl hover:text-yellow-400">

               <i class="fas fa-shopping-cart"></i>

               @php
                   $cartCount = session('cart')
                       ? count(session('cart'))
                    : 0;
               @endphp

               @if($cartCount > 0)

                   <span
                       class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-bold rounded-full min-w-[20px] h-5 flex items-center justify-center">

                       {{ $cartCount }}

                   </span>

                @endif

            </a>

            <!-- Hamburger -->
            <button id="menuButton"
                    class="text-3xl font-bold">

               ☰

            </button>

        </div>

    </div>

    <!-- Menu Dropdown -->
    <div id="mobileMenu"
         class="hidden border-t bg-black text-white">

        <a href="{{ route('home') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            Home
        </a>

        <a href="{{ route('menu') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            Menu
        </a>

        <a href="{{ route('about') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            About
        </a>

        <a href="{{ route('contact') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            Contact
        </a>

        <a href="{{ url('/pesanan-saya') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            Pesanan Saya
        </a>

        <a href="{{ route('cart.index') }}"
           class="block px-4 py-3 hover:bg-gray-100">
            Keranjang
        </a>

        <a href="{{ route('login') }}"
           class="block px-4 py-3 bg-yellow-400 hover:bg-yellow-500">
            Login
        </a>

    </div>

</header>

<!-- SEARCH BOX -->
<div id="searchBox"
     class="hidden bg-white shadow-lg border-b p-4">

    <div class="max-w-4xl mx-auto">

        <form action="{{ route('menu') }}" method="GET">

            <input type="text"
                   name="search"
                   placeholder="Cari kopi, makanan, minuman..."
                   class="w-full border p-3 rounded-lg">

        </form>

    </div>

</div>

<!-- CONTENT -->
<main class="p-4 md:p-6">
    @yield('content')
</main>

<script>

document.getElementById('menuButton')
    .addEventListener('click', function () {

        document
            .getElementById('mobileMenu')
            .classList
            .toggle('hidden');

    });

document.getElementById('searchButton')
    .addEventListener('click', function () {

        document
            .getElementById('searchBox')
            .classList
            .toggle('hidden');

    });

</script>

</body>
</html>