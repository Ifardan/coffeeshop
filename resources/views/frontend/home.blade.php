@extends('layouts.frontend')

@php
$setting = \App\Models\WebsiteSetting::first() ?? (object)[];
@endphp

@section('content')

<!-- HERO SECTION -->
<section
    class="relative min-h-[700px] bg-cover bg-center"
    style="background-image:url('https://images.unsplash.com/photo-1447933601403-0c6688de566e');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-[700px] text-center text-white px-5">

        <!-- Judul -->
        <h1
        style="font-family:'Oswald', sans-serif;"
        class="text-5xl md:text-7xl font-bold uppercase tracking-wider leading-none drop-shadow-xl mb-4">

           {{ $setting->hero_title ?? 'SAKA CANGKIR' }}

        </h1>

        <!-- Sub Judul -->
        <p class="text-lg md:text-2xl text-gray-200 tracking-wide font-medium mb-8">

            {{ $setting->hero_subtitle ?? 'Nikmati kopi terbaik yang kami sediakan' }}

        </p>

        <!-- MENU FAVORIT -->
        <div class="max-w-4xl mx-auto text-white">

            <h2 class="text-2xl md:text-3xl font-bold text-yellow-400 mb-6">

                {{ $setting->favorite_title ?? 'Menu Favorit' }}

            </h2>

            <div class="grid grid-cols-3 gap-16 text-center items-start">

                <!-- KOPI -->
                <div class="flex flex-col items-center">

                    <h3 class="font-bold text-yellow-400 text-lg md:text-2xl mb-4">

                        {{ $setting->favorite_col1_title ?? 'Kopi' }}

                    </h3>

                    <div class="text-sm md:text-base w-full max-w-[220px] mx-auto">

                       @foreach(explode("\n", $setting->favorite_col1_items ?? '') as $item)
                           @php
                              $menu = explode('|', $item);
                           @endphp

                           @if(count($menu) == 2)

                           <div class="flex justify-between items-center py-3 border-b-2 border-yellow-400/50">

                              <span>{{ trim($menu[0]) }}</span>

                              <span>{{ trim($menu[1]) }}</span>

                           </div>

                           @endif

                        @endforeach

                    </div>

                </div>

                <!-- MINUMAN -->
                <div class="flex flex-col items-center">

                    <h3 class="font-bold text-yellow-400 text-lg md:text-2xl mb-4">

                       {{ $setting->favorite_col2_title ?? 'Minuman' }}

                    </h3>

                <div class="text-sm md:text-base w-full max-w-[220px] mx-auto">

                 @foreach(explode("\n", $setting->favorite_col2_items ?? '') as $item)

                    @php
                       $menu = explode('|', $item);
                    @endphp

                    @if(count($menu) == 2)

                    <div class="flex justify-between items-center py-3 border-b-2 border-yellow-400/50">

                       <span>{{ trim($menu[0]) }}</span>

                       <span>{{ trim($menu[1]) }}</span>

                    </div>

                    @endif

                @endforeach

            </div>

                </div>

                <!-- SNACK -->
                <div class="flex flex-col items-center">

                    <h3 class="font-bold text-yellow-400 text-lg md:text-2xl mb-4">

                        {{ $setting->favorite_col3_title ?? 'Snack' }}
                    </h3>

                <div class="text-sm md:text-base w-full max-w-[220px] mx-auto">

                   @foreach(explode("\n", $setting->favorite_col3_items ?? '') as $item)
                        @php
                           $menu = explode('|', $item);
                        @endphp

                        @if(count($menu) == 2)

                        <div class="flex justify-between items-center py-3 border-b-2 border-yellow-400/50">
                            
                           <span>{{ trim($menu[0]) }}</span>

                           <span>{{ trim($menu[1]) }}</span>

                        </div>

                        @endif

                    @endforeach

                </div>

                </div>

            </div>

            <!-- CTA -->
            <div class="mt-8 text-center">

                <h2 class="text-xl md:text-2xl font-bold text-white mb-3">
                    {{ $setting->cta_title ?? 'Mau pesan kopi sekarang?' }}
                </h2>

                <p class="text-gray-200 mb-6">
                   {{ $setting->cta_subtitle ?? 'Pilih menu favoritmu dan nikmati sekarang juga' }}
                </p>

                <a href="{{ route('menu') }}"
                   class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-8 py-3 rounded-full transition">

                    Order Sekarang

                </a>

            </div>

        </div>

    </div>

</section>

@endsection