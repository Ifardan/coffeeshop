@extends('layouts.owner')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-6">
        Setting Home Page
    </h1>

    <form method="POST"
          action="{{ route('website.home.update') }}"
          enctype="multipart/form-data">

        @csrf

        <!-- ======================================= -->
        <!-- HERO -->
        <!-- ======================================= -->

        <h2 class="font-bold text-lg mb-3">
            Hero Section
        </h2>

        <div class="mb-4">
            <label class="block mb-1 font-medium">
                Judul Hero
            </label>

            <input
                type="text"
                name="hero_title"
                value="{{ $setting->hero_title ?? '' }}"
                class="border p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">
                Sub Judul Hero
            </label>

            <textarea
                name="hero_subtitle"
                rows="3"
                class="border p-2 w-full rounded">{{ $setting->hero_subtitle ?? '' }}</textarea>
        </div>

        <!-- FOTO HERO -->

        <div class="mb-6">

            <label class="block mb-2 font-medium">
                Foto Hero
            </label>

            <input
                type="file"
                name="hero_image"
                accept="image/*"
                class="border p-2 w-full rounded">

            <p class="text-sm text-gray-500 mt-1">
                Pilih foto utama yang akan tampil di bagian paling atas halaman Home.
            </p>

            @if(!empty($setting->hero_image))

                <div class="mt-3">

                    <p class="text-sm font-medium mb-2">
                        Foto Hero Saat Ini:
                    </p>

                    <img
                        src="{{ asset('images/' . $setting->hero_image) }}"
                        class="w-full max-w-md h-48 object-cover rounded-lg shadow">

                </div>

            @endif

        </div>


        <hr class="my-6">


        <!-- ======================================= -->
        <!-- FOTO CAFE -->
        <!-- ======================================= -->

        <h2 class="font-bold text-lg mb-3">
            Foto Cafe Saka Cangkir
        </h2>

        <div class="mb-6">

            <label class="block mb-2 font-medium">
                Upload Foto Cafe
            </label>

            <input
                type="file"
                name="cafe_image"
                accept="image/*"
                class="border p-2 w-full rounded">

            <p class="text-sm text-gray-500 mt-1">
                Upload foto suasana atau bagian dalam Cafe Saka Cangkir.
            </p>

            @if(!empty($setting->cafe_image))

                <div class="mt-3">

                    <p class="text-sm font-medium mb-2">
                        Foto Cafe Saat Ini:
                    </p>

                    <img
                        src="{{ asset('images/' . $setting->cafe_image) }}"
                        class="w-full max-w-md h-48 object-cover rounded-lg shadow">

                </div>

            @endif

        </div>


        <hr class="my-6">


        <!-- ======================================= -->
        <!-- MENU FAVORIT -->
        <!-- ======================================= -->

        <h2 class="font-bold text-lg mb-4">
            Menu Favorit
        </h2>


        <!-- JUDUL MENU FAVORIT -->

        <div class="mb-6">

            <label class="block mb-1 font-medium">
                Judul Menu Favorit
            </label>

            <input
                type="text"
                name="favorite_title"
                value="{{ $setting->favorite_title ?? '' }}"
                class="border p-2 w-full rounded">

        </div>


        <!-- ======================================= -->
        <!-- KOLOM 1 -->
        <!-- ======================================= -->

        <div class="border rounded-xl p-5 mb-6">

            <h3 class="font-bold text-lg mb-4">
                Menu Favorit 1
            </h3>

            <div class="mb-3">

                <label class="block mb-1 font-medium">
                    Judul Menu
                </label>

                <input
                    type="text"
                    name="favorite_col1_title"
                    value="{{ $setting->favorite_col1_title ?? '' }}"
                    class="border p-2 w-full rounded">

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Isi Menu
                </label>

                <textarea
                    name="favorite_col1_items"
                    rows="5"
                    class="border p-2 w-full rounded"
                    placeholder="Contoh:
Espresso | 15.000
Cappuccino | 20.000
Latte | 22.000">{{ $setting->favorite_col1_items ?? '' }}</textarea>

                <p class="text-sm text-gray-500 mt-1">
                    Gunakan format: Nama Menu | Harga
                </p>

            </div>

            <div>

                <label class="block mb-2 font-medium">
                    Foto Menu Favorit 1
                </label>

                <input
                    type="file"
                    name="favorite_col1_image"
                    accept="image/*"
                    class="border p-2 w-full rounded">

                @if(!empty($setting->favorite_col1_image))

                    <div class="mt-3">

                        <p class="text-sm font-medium mb-2">
                            Foto Saat Ini:
                        </p>

                        <img
                            src="{{ asset('images/' . $setting->favorite_col1_image) }}"
                            class="w-full max-w-xs h-40 object-cover rounded-lg shadow">

                    </div>

                @endif

            </div>

        </div>


        <!-- ======================================= -->
        <!-- KOLOM 2 -->
        <!-- ======================================= -->

        <div class="border rounded-xl p-5 mb-6">

            <h3 class="font-bold text-lg mb-4">
                Menu Favorit 2
            </h3>

            <div class="mb-3">

                <label class="block mb-1 font-medium">
                    Judul Menu
                </label>

                <input
                    type="text"
                    name="favorite_col2_title"
                    value="{{ $setting->favorite_col2_title ?? '' }}"
                    class="border p-2 w-full rounded">

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Isi Menu
                </label>

                <textarea
                    name="favorite_col2_items"
                    rows="5"
                    class="border p-2 w-full rounded"
                    placeholder="Contoh:
Matcha | 20.000
Chocolate | 18.000
Tea | 15.000">{{ $setting->favorite_col2_items ?? '' }}</textarea>

                <p class="text-sm text-gray-500 mt-1">
                    Gunakan format: Nama Menu | Harga
                </p>

            </div>

            <div>

                <label class="block mb-2 font-medium">
                    Foto Menu Favorit 2
                </label>

                <input
                    type="file"
                    name="favorite_col2_image"
                    accept="image/*"
                    class="border p-2 w-full rounded">

                @if(!empty($setting->favorite_col2_image))

                    <div class="mt-3">

                        <p class="text-sm font-medium mb-2">
                            Foto Saat Ini:
                        </p>

                        <img
                            src="{{ asset('images/' . $setting->favorite_col2_image) }}"
                            class="w-full max-w-xs h-40 object-cover rounded-lg shadow">

                    </div>

                @endif

            </div>

        </div>


        <!-- ======================================= -->
        <!-- KOLOM 3 -->
        <!-- ======================================= -->

        <div class="border rounded-xl p-5 mb-6">

            <h3 class="font-bold text-lg mb-4">
                Menu Favorit 3
            </h3>

            <div class="mb-3">

                <label class="block mb-1 font-medium">
                    Judul Menu
                </label>

                <input
                    type="text"
                    name="favorite_col3_title"
                    value="{{ $setting->favorite_col3_title ?? '' }}"
                    class="border p-2 w-full rounded">

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Isi Menu
                </label>

                <textarea
                    name="favorite_col3_items"
                    rows="5"
                    class="border p-2 w-full rounded"
                    placeholder="Contoh:
Croissant | 18.000
Kentang Goreng | 15.000
Roti Bakar | 17.000">{{ $setting->favorite_col3_items ?? '' }}</textarea>

                <p class="text-sm text-gray-500 mt-1">
                    Gunakan format: Nama Menu | Harga
                </p>

            </div>

            <div>

                <label class="block mb-2 font-medium">
                    Foto Menu Favorit 3
                </label>

                <input
                    type="file"
                    name="favorite_col3_image"
                    accept="image/*"
                    class="border p-2 w-full rounded">

                @if(!empty($setting->favorite_col3_image))

                    <div class="mt-3">

                        <p class="text-sm font-medium mb-2">
                            Foto Saat Ini:
                        </p>

                        <img
                            src="{{ asset('images/' . $setting->favorite_col3_image) }}"
                            class="w-full max-w-xs h-40 object-cover rounded-lg shadow">

                    </div>

                @endif

            </div>

        </div>


        <!-- ======================================= -->
        <!-- BUTTON -->
        <!-- ======================================= -->

        <button
            type="submit"
            class="mt-4 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded">

            Simpan Perubahan

        </button>

    </form>

</div>

@endsection