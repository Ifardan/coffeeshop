@extends('layouts.frontend')

@php
    $setting = \App\Models\WebsiteSetting::first() ?? (object)[];
@endphp

@section('content')

<!-- ===================================================== -->
<!-- HERO SECTION -->
<!-- ===================================================== -->

<section
    <section
    class="relative min-h-[430px] sm:min-h-[500px] md:min-h-[700px] bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ !empty($setting->hero_image)
        ? asset('images/' . $setting->hero_image)
        : 'https://images.unsplash.com/photo-1447933601403-0c6688de566e'
    }}');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Hero Content -->
    <div class="relative z-10 min-h-[430px] sm:min-h-[500px] md:min-h-[700px]">

        <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8
                    min-h-[430px] sm:min-h-[500px] md:min-h-[700px]
                    flex items-center">

            <div class="w-full max-w-2xl text-white">

                <!-- Judul Utama -->
                <h1
                    style="font-family: 'Oswald', sans-serif;"
                    class="text-5xl sm:text-6xl md:text-8xl
                           font-bold uppercase
                           tracking-wide
                           leading-none
                           drop-shadow-2xl">

                    {{ $setting->hero_title ?? 'SAKA CANGKIR' }}

                </h1>

                <!-- Subtitle -->
                <p
                    class="mt-4
                           text-2xl sm:text-3xl md:text-4xl
                           text-yellow-400
                           italic
                           font-semibold">

                    Secangkir Kopi, Sejuta Cerita

                </p>

                <!-- Deskripsi -->
                <p
                    class="mt-5
                           text-base sm:text-lg
                           text-gray-200
                           leading-relaxed
                           max-w-xl">

                    {{ $setting->hero_subtitle
                        ?? 'Nikmati kopi terbaik yang kami sediakan dengan suasana yang nyaman untuk setiap momen berharga Anda.' }}

                </p>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row
                            gap-3 sm:gap-4
                            mt-8">

                    <!-- Lihat Menu -->
                    <a
                        href="{{ route('menu') }}"
                        class="inline-flex items-center justify-center
                               bg-yellow-400
                               hover:bg-yellow-500
                               text-black
                               font-bold
                               px-7 py-3.5
                               rounded-lg
                               transition
                               duration-300
                               w-full sm:w-auto">

                        <span class="mr-2">☕</span>
                        LIHAT MENU

                    </a>

                    <!-- Pesan Sekarang -->
                    <a
                        href="{{ route('menu') }}"
                        class="inline-flex items-center justify-center
                               border-2 border-white
                               hover:bg-white
                               hover:text-black
                               text-white
                               font-bold
                               px-7 py-3.5
                               rounded-lg
                               transition
                               duration-300
                               w-full sm:w-auto">

                        <span class="mr-2">🛒</span>
                        PESAN SEKARANG

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- CERITA DI BALIK SAKA CANGKIR -->
<!-- ===================================================== -->

<section class="py-14 sm:py-16 md:py-20 bg-[#f8f3eb]">

    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2
                    gap-10 md:gap-14
                    items-center">

            <!-- TEKS -->
            <div class="order-2 md:order-1">

                <!-- Label -->
                <p
                    class="text-yellow-600
                           font-semibold
                           italic
                           text-lg
                           mb-3">

                    Tentang Kami

                </p>

                <!-- Judul -->
                <h2
                    class="text-3xl sm:text-4xl md:text-5xl
                           font-bold
                           text-gray-900
                           leading-tight
                           mb-5">

                    Cerita di Balik
                    <br class="hidden sm:block">
                    Saka Cangkir

                </h2>

                <!-- Deskripsi -->
                <p
                    class="text-gray-600
                           text-base sm:text-lg
                           leading-relaxed
                           mb-7
                           max-w-xl">

                    Saka Cangkir hadir dari kecintaan terhadap kopi
                    dan keinginan untuk menciptakan tempat yang nyaman
                    bagi setiap orang untuk berkumpul, berbagi cerita,
                    dan menikmati momen berharga.

                </p>

                <!-- Tombol -->
                <a
                    href="{{ route('about') }}"
                    class="inline-flex items-center
                           bg-gray-900
                           hover:bg-yellow-500
                           hover:text-black
                           text-yellow-400
                           font-bold
                           px-6 py-3
                           rounded-lg
                           transition
                           duration-300">

                    BACA SELENGKAPNYA

                    <span class="ml-3">→</span>

                </a>

            </div>


            <!-- FOTO -->
            <div class="order-1 md:order-2">

                <div
                    class="overflow-hidden
                           rounded-2xl
                           shadow-xl">

                    <img
                        src="{{ !empty($setting->cafe_image)
                            ? asset('images/' . $setting->cafe_image)
                            : 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb'
                        }}"
                        alt="Cafe Saka Cangkir"
                        class="w-full
                               h-[280px]
                               sm:h-[350px]
                               md:h-[420px]
                               object-cover
                               transition
                               duration-500
                               hover:scale-105">

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- MENU FAVORIT -->
<!-- ===================================================== -->

<section class="py-14 sm:py-16 md:py-20 bg-[#171008] text-white">

    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- JUDUL -->
        <div class="text-center mb-10">

            <p class="text-yellow-400 font-semibold italic mb-2">
                Menu Favorit Kami
            </p>

            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold">
                {{ $setting->favorite_title ?? 'Menu Favorit' }}
            </h2>

            <div class="w-12 h-1 bg-yellow-400 mx-auto mt-4"></div>

        </div>


        <!-- ================================================= -->
        <!-- 3 GAMBAR MENU FAVORIT -->
        <!-- ================================================= -->

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8">


            <!-- MENU FAVORIT 1 -->

            <div
                class="overflow-hidden
                       rounded-2xl
                       shadow-xl
                       bg-[#2a1c0f]
                       border border-yellow-900/40">

                @if(!empty($setting->favorite_col1_image))

                    <img
                        src="{{ asset('images/' . $setting->favorite_col1_image) }}"
                        alt="Menu Favorit 1"
                        class="w-full
                               h-[280px]
                               sm:h-[220px]
                               md:h-[300px]
                               object-cover
                               transition
                               duration-500
                               hover:scale-105">

                @else

                    <div
                        class="w-full
                               h-[280px]
                               sm:h-[220px]
                               md:h-[300px]
                               flex
                               items-center
                               justify-center
                               bg-gray-800
                               text-gray-400">

                        Belum ada gambar

                    </div>

                @endif

            </div>


            <!-- MENU FAVORIT 2 -->

            <div
                class="overflow-hidden
                       rounded-2xl
                       shadow-xl
                       bg-[#2a1c0f]
                       border border-yellow-900/40">

                @if(!empty($setting->favorite_col2_image))

                    <img
                        src="{{ asset('images/' . $setting->favorite_col2_image) }}"
                        alt="Menu Favorit 2"
                        class="w-full
                               h-[280px]
                               sm:h-[220px]
                               md:h-[300px]
                               object-cover
                               transition
                               duration-500
                               hover:scale-105">

                @else

                    <div
                        class="w-full
                               h-[280px]
                               sm:h-[220px]
                               md:h-[300px]
                               flex
                               items-center
                               justify-center
                               bg-gray-800
                               text-gray-400">

                        Belum ada gambar

                    </div>

                @endif

            </div>


            <!-- MENU FAVORIT 3 -->

            <div
                class="overflow-hidden
                       rounded-2xl
                       shadow-xl
                       bg-[#2a1c0f]
                       border border-yellow-900/40">

                @if(!empty($setting->favorite_col3_image))

                    <img
                        src="{{ asset('images/' . $setting->favorite_col3_image) }}"
                        alt="Menu Favorit 3"
                        class="w-full
                               h-[280px]
                               sm:h-[220px]
                               md:h-[300px]
                               object-cover
                               transition
                               duration-500
                               hover:scale-105">

                @else

                    <div
                        class="w-full
                               h-[280px]
                               sm:h-[220px]
                               md:h-[300px]
                               flex
                               items-center
                               justify-center
                               bg-gray-800
                               text-gray-400">

                        Belum ada gambar

                    </div>

                @endif

            </div>

        </div>


        <!-- ================================================= -->
        <!-- LIHAT SEMUA MENU -->
        <!-- ================================================= -->

        <div class="text-center mt-10">

            <a
                href="{{ route('menu') }}"
                class="inline-flex
                       items-center
                       justify-center
                       border-2
                       border-yellow-400
                       text-yellow-400
                       hover:bg-yellow-400
                       hover:text-black
                       font-bold
                       px-7
                       py-3
                       rounded-lg
                       transition
                       duration-300">

                LIHAT SEMUA MENU

                <span class="ml-2">
                    →
                </span>

            </a>

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- CTA ORDER -->
<!-- ===================================================== -->

<section
    class="bg-yellow-400
           py-10 sm:py-12">

    <div
        class="max-w-6xl
               mx-auto
               px-5 sm:px-6 lg:px-8">

        <div
            class="flex flex-col
                   md:flex-row
                   items-center
                   justify-center
                   gap-6 md:gap-12
                   text-center md:text-left">

            <!-- Teks -->
            <div>

                <h2
                    class="text-2xl sm:text-3xl
                           font-bold
                           text-black">

                    Mau pesan kopi sekarang?

                </h2>

                <p
                    class="mt-1
                           text-black/80
                           text-sm sm:text-base">

                    Pilih menu favoritmu dan nikmati sekarang juga

                </p>

            </div>


            <!-- Tombol -->
            <a
                href="{{ route('menu') }}"
                class="inline-flex
                       items-center
                       justify-center
                       bg-black
                       hover:bg-gray-800
                       text-white
                       font-bold
                       px-8 py-3.5
                       rounded-lg
                       transition
                       duration-300
                       whitespace-nowrap">

                ☕ &nbsp; ORDER SEKARANG

            </a>

        </div>

    </div>

</section>


@endsection