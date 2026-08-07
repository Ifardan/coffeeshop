@extends('layouts.owner')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Setting About Website
</h1>

<form method="POST"
      action="{{ route('website.about.update') }}"
      enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow space-y-4">

    @csrf

    <div>
        <label>Judul About</label>

        <input type="text"
               name="about_title"
               value="{{ $setting->about_title ?? '' }}"
               class="border p-2 w-full rounded">
    </div>

    <div>
        <label>Deskripsi About</label>

        <textarea name="about_description"
                  class="border p-2 w-full rounded"
                  rows="5">{{ $setting->about_description ?? '' }}</textarea>
    </div>

    <div>

         <label>Gambar About</label>

        <input
            type="file"
            name="about_image"
            class="border p-2 w-full rounded">

    </div>

    @if(!empty($setting->about_image))

        <img
            src="{{ asset('images/' . $setting->about_image) }}"
            width="250"
            class="rounded shadow">

    @endif

    <button class="bg-blue-500 text-white px-5 py-2 rounded">
        Simpan
    </button>

</form>

@endsection