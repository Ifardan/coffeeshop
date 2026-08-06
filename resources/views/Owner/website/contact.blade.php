@extends('layouts.owner')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Setting Contact Website
</h1>

<form action="{{ route('website.contact.update') }}"
      method="POST"
      class="bg-white p-6 rounded shadow space-y-5">

    @csrf

    <!-- ALAMAT -->
    <div>
        <label class="block font-semibold mb-2">
            📍 Alamat
        </label>

        <input type="text"
               name="contact_address"
               value="{{ $setting->contact_address ?? '' }}"
               placeholder="Masukkan alamat coffeeshop"
               class="w-full border p-3 rounded">
    </div>

    <!-- TELEPON -->
    <div>
        <label class="block font-semibold mb-2">
            ☎️ Nomor Telepon
        </label>

        <input type="text"
               name="contact_phone"
               value="{{ $setting->contact_phone ?? '' }}"
               placeholder="Masukkan nomor telepon"
               class="w-full border p-3 rounded">
    </div>

    <!-- EMAIL -->
    <div>
        <label class="block font-semibold mb-2">
            📧 Email
        </label>

        <input type="email"
               name="contact_email"
               value="{{ $setting->contact_email ?? '' }}"
               placeholder="Masukkan email"
               class="w-full border p-3 rounded">
    </div>

    <!-- INSTAGRAM -->
    <div>
        <label class="block font-semibold mb-2">
            📸 Instagram
        </label>

        <input type="text"
               name="instagram"
               placeholder="Masukkan username instagram"
               class="w-full border p-3 rounded">
    </div>

    <!-- JAM BUKA -->
    <div>
        <label class="block font-semibold mb-2">
            🕒 Jam Buka
        </label>

        <input type="text"
               name="open_hours"
               placeholder="Contoh: 08:00 - 22:00"
               class="w-full border p-3 rounded">
    </div>

    <!-- GOOGLE MAPS -->
    <div>
        <label class="block font-semibold mb-2">
            🌍 Google Maps Link
        </label>

        <textarea name="google_maps"
                  rows="4"
                  placeholder="Masukkan link google maps"
                  class="w-full border p-3 rounded"></textarea>
    </div>

    <!-- BUTTON -->
    <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded">

        Simpan Setting

    </button>

</form>

@endsection