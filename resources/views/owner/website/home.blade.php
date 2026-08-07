@extends('layouts.owner')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-6">
        Setting Home Page
    </h1>

    <form method="POST" action="{{ route('website.home.update') }}">
        @csrf

        <!-- HERO -->

        <h2 class="font-bold text-lg mb-3">
            Hero Section
        </h2>

        <div class="mb-4">
            <label>Judul Hero</label>

            <input type="text"
                   name="hero_title"
                   value="{{ $setting->hero_title }}"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-6">
            <label>Sub Judul Hero</label>

            <textarea
                name="hero_subtitle"
                rows="3"
                class="border p-2 w-full rounded">{{ $setting->hero_subtitle }}</textarea>
        </div>

        <hr class="my-6">

        <!-- MENU FAVORIT -->

        <h2 class="font-bold text-lg mb-4">
            Menu Favorit
        </h2>

        <div class="mb-4">
            <label>Judul Menu Favorit</label>

            <input type="text"
                   name="favorite_title"
                   value="{{ $setting->favorite_title }}"
                   class="border p-2 w-full rounded">
        </div>

        <hr class="my-6">

        <!-- KOLOM 1 -->

        <h3 class="font-bold mb-3">
            Kolom 1
        </h3>

        <div class="mb-3">
            <label>Judul Kolom 1</label>

            <input type="text"
                   name="favorite_col1_title"
                   value="{{ $setting->favorite_col1_title }}"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-6">
            <label>Isi Kolom 1</label>

            <textarea
                name="favorite_col1_items"
                rows="5"
                class="border p-2 w-full rounded">{{ $setting->favorite_col1_items }}</textarea>
        </div>

        <hr class="my-6">

        <!-- KOLOM 2 -->

        <h3 class="font-bold mb-3">
            Kolom 2
        </h3>

        <div class="mb-3">
            <label>Judul Kolom 2</label>

            <input type="text"
                   name="favorite_col2_title"
                   value="{{ $setting->favorite_col2_title }}"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-6">
            <label>Isi Kolom 2</label>

            <textarea
                name="favorite_col2_items"
                rows="5"
                class="border p-2 w-full rounded">{{ $setting->favorite_col2_items }}</textarea>
        </div>

        <hr class="my-6">

        <!-- KOLOM 3 -->

        <h3 class="font-bold mb-3">
            Kolom 3
        </h3>

        <div class="mb-3">
            <label>Judul Kolom 3</label>

            <input type="text"
                   name="favorite_col3_title"
                   value="{{ $setting->favorite_col3_title }}"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-6">
            <label>Isi Kolom 3</label>

            <textarea
                name="favorite_col3_items"
                rows="5"
                class="border p-2 w-full rounded">{{ $setting->favorite_col3_items }}</textarea>
        </div>

        <button
            type="submit"
            class="mt-6 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded">

            Simpan Perubahan

        </button>

    </form>

</div>

@endsection