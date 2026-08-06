@extends('layouts.frontend')

@php
$setting = \App\Models\WebsiteSetting::first();
@endphp

@section('content')

<!-- CONTACT HEADER -->
<section class="py-20 text-center">

    <h1 class="text-3xl md:text-5xl font-bold text-yellow-700 mb-4">
        Contact Us ☕
    </h1>

    <p class="text-gray-600 text-xl">
        Hubungi kami untuk informasi dan reservasi
    </p>

</section>

<!-- CONTACT CONTENT -->
<section class="container mx-auto px-6 pb-20">

    <div class="grid md:grid-cols-2 gap-12">

        <!-- INFO -->
        <div class="bg-white p-10 rounded-2xl shadow">

            <h2 class="text-3xl font-bold mb-8">
                Informasi Coffeeshop
            </h2>

            <div class="space-y-6 text-lg text-gray-600">

                <p>
                    📍 {{ $setting->contact_address ?? 'Alamat belum diatur' }}
                </p>

                <p>
                    ☎️ {{ $setting->contact_phone ?? 'Nomor belum diatur' }}
                </p>

                <p>
                    📧 {{ $setting->contact_email ?? 'Email belum diatur' }}
                </p>

                <p>
                    📸 {{ $setting->instagram ?? 'Instagram belum diatur' }}
                </p>

                <p>
                    🕒 {{ $setting->open_hours ?? 'Jam buka belum diatur' }}
                </p>

                <a href="{{ $setting->google_maps ?? '#' }}"
                   target="_blank"
                   class="text-blue-500 underline">

                    Google Maps

                </a>

            </div>

        </div>

        <!-- FORM -->
        <div class="bg-white p-10 rounded-2xl shadow">

            <h2 class="text-3xl font-bold mb-8">
                Kirim Pesan
            </h2>

            <form class="space-y-5">

                <input type="text"
                       placeholder="Nama"
                       class="w-full border p-4 rounded">

                <input type="email"
                       placeholder="Email"
                       class="w-full border p-4 rounded">

                <textarea placeholder="Pesan"
                          rows="5"
                          class="w-full border p-4 rounded"></textarea>

                <button class="bg-yellow-500 text-black px-6 py-3 rounded font-bold">
                    Kirim Pesan
                </button>

            </form>

        </div>

    </div>

</section>

@endsection