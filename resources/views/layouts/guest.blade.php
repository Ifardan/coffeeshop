<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Saka Cangkir - Login</title>

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-[Poppins] antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center bg-[#1F3A2D] px-4">
            <div class="text-center mb-6">

               <div class="text-5xl mb-3">
                   ☕
               </div>

               <h1 class="text-3xl font-bold text-white">

                  Saka Cangkir

               </h1>

               <p class="text-gray-200 mt-2">

                  Selamat Datang Kembali

               </p>

            </div>

            <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
