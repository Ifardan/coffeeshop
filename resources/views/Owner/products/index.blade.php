@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Kelola Produk
</h1>

<a href="{{ route('products.create') }}"
   class="bg-blue-500 text-white px-4 py-2 rounded">

   + Tambah Produk

</a>

<div class="bg-white mt-5 rounded shadow overflow-hidden">

    <table class="w-full text-left">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3 border">Nama</th>
                <th class="p-3 border">Harga</th>
                <th class="p-3 border">Gambar</th>
                <th class="p-3 border">Stok</th>
                <th class="p-3 border">Aksi</th>
            </tr>

        </thead>

        <tbody>

@foreach($products as $product)

<tr>

    <td class="p-3 border">
        {{ $product->name }}
    </td>

    <td class="p-3 border">
        Rp {{ number_format($product->price) }}
    </td>

    <td class="p-3 border">
    @if($product->image)
        <img src="{{ asset('images/' . $product->image) }}"
             class="w-16 h-16 object-cover rounded">
    @else
        <span class="text-gray-400">No Image</span>
    @endif
    </td>

    <td class="p-3 border">
        {{ $product->stock }}
    </td>

    <!-- ACTION -->
    <td class="p-3 border">

        <div class="flex gap-2">

            <!-- EDIT -->
            <a href="{{ route('products.edit', $product->id) }}"
               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">

                Edit

            </a>

            <!-- DELETE -->
            <form action="{{ route('products.destroy', $product->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin hapus?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">

                    Hapus

                </button>

            </form>

        </div>

    </td>

</tr>

@endforeach

</tbody>

    </table>

</div>

@endsection