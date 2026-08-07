@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Edit Produk
</h1>

<form method="POST"
      action="{{ route('products.update', $product->id) }}"
      class="bg-white p-6 rounded shadow space-y-4">

    @csrf
    @method('PUT')

    <div>
        <label>Nama Produk</label>
        <input type="text"
               name="name"
               value="{{ $product->name }}"
               class="border p-2 w-full">
    </div>

    <div>
    <label>Kategori</label>

    <select name="category_id" class="border p-2 w-full">

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach

    </select>
</div>

    <div>
        <label>Harga</label>
        <input type="number"
               name="price"
               value="{{ $product->price }}"
               class="border p-2 w-full">
    </div>

    <div>
        <label>Stok</label>
        <input type="number"
               name="stock"
               value="{{ $product->stock }}"
               class="border p-2 w-full">
    </div>

    <div>

    <label>Deskripsi Produk</label>

    <textarea
        name="description"
        class="border p-2 w-full rounded"
        rows="4">{{ $product->description }}</textarea>

    </div>
    
    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update Produk
    </button>

</form>

@endsection