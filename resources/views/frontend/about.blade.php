@extends('layouts.frontend')

@section('content')

<!-- ABOUT HEADER -->
<section class="py-20 text-center">

    <h1 class="text-3xl md:text-5xl font-bold text-yellow-700 mb-4">

        {{ $setting->about_title ?? 'About Us ☕' }}

    </h1>

</section>

<!-- ABOUT CONTENT -->
<section class="container mx-auto px-6 pb-20">

    <div class="grid md:grid-cols-2 gap-12 items-center">

        <!-- TEXT -->
        <div>

            <h2 class="text-3xl font-bold mb-6">

                Cerita di Balik Coffeeshop Kami

            </h2>

            <p class="text-gray-600 leading-relaxed">
               {{ $setting->about_description ?? 'Belum ada deskripsi about.' }}
            </p>

        </div>

        <!-- IMAGE -->
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            @if(!empty($setting->about_image))

               <img
                   src="{{ asset('images/' . $setting->about_image) }}"
                   class="w-full h-96 object-cover">

            @else

               <img
                  src="https://images.unsplash.com/photo-1509042239860-f550ce710b93"
                  class="w-full h-96 object-cover">

            @endif

        </div>

    </div>

</section>

<!-- VALUES -->
<section class="bg-gray-100 py-16">

    <div class="container mx-auto grid md:grid-cols-3 gap-8 text-center">

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-2">☕ Kualitas</h3>
            <p class="text-gray-500">Biji kopi terbaik pilihan lokal</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-2">❤️ Pelayanan</h3>
            <p class="text-gray-500">Ramahan dan cepat</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-bold mb-2">🏡 Suasana</h3>
            <p class="text-gray-500">Nyaman untuk semua aktivitas</p>
        </div>

    </div>

</section>

@endsection