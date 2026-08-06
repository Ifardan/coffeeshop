@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    📦 Daftar Produk
</h1>

<div class="bg-white rounded shadow p-4">

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">No</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Stok</th>
            </tr>
        </thead>

        <tbody>

        @forelse($products as $product)

            <tr>
                <td class="border p-2">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-2">
                    {{ $product->name }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($product->price,0,',','.') }}
                </td>

                <td class="border p-2">
                    {{ $product->stock }}
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="4" class="text-center p-4">
                    Belum ada produk
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection