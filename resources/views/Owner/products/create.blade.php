@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Tambah Produk
</h1>

<div class="bg-white p-6 rounded shadow">

    <form method="POST"
          action="{{ route('products.store') }}"
          enctype="multipart/form-data"
          class="space-y-4">

        @csrf

        <div>
    <label class="block text-sm mb-1">Kategori</label>

    <select name="category_id"
            class="border p-2 w-full rounded"
            required>

        <option value="">-- Pilih Kategori --</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach

    </select>
</div>

        <!-- NAMA PRODUK -->
        <div>

            <label class="block text-sm mb-1">
                Nama Produk
            </label>

            <input type="text"
                   name="name"
                   class="border p-2 w-full rounded"
                   placeholder="Masukkan nama produk"
                   required>

        </div>

        <!-- HARGA -->
        <div>

            <label class="block text-sm mb-1">
                Harga
            </label>

            <input type="number"
                   name="price"
                   class="border p-2 w-full rounded"
                   placeholder="Masukkan harga"
                   required>

        </div>

        <!-- STOK -->
        <div>

            <label class="block text-sm mb-1">
                Stok
            </label>

            <input type="number"
                   name="stock"
                   class="border p-2 w-full rounded"
                   placeholder="Masukkan stok"
                   required>

        <!-- DESKRIPSI PRODUK -->
        <div>

            <label class="block text-sm mb-1">
                Deskripsi Produk
            </label>

            <textarea
                name="description"
                class="border p-2 w-full rounded"
                rows="4"
                placeholder="Masukkan deskripsi produk"></textarea>

        </div>

        <!-- GAMBAR PRODUK -->
        <div>

            <label class="block text-sm mb-1">
                Gambar Produk
            </label>

            <input type="file"
                   name="image"
                   class="border p-2 w-full rounded">

        </div>

        <!-- TOMBOL SIMPAN -->
        <div class="pt-4">

            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">

                Simpan Produk

            </button>

        </div>

    </form>

</div>

@endsection