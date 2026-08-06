@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    📋 Stok Produk
</h1>

<div class="bg-white rounded-lg shadow p-6">

    <div class="overflow-x-auto">

        <table class="w-full border-collapse">

            <thead>
                <tr class="bg-gray-100">

                    <th class="border p-3 text-left">
                        No
                    </th>

                    <th class="border p-3 text-left">
                        Nama Produk
                    </th>

                    <th class="border p-3 text-left">
                        Harga
                    </th>

                    <th class="border p-3 text-left">
                        Stok
                    </th>

                    <th class="border p-3 text-left">
                        Status
                    </th>

                </tr>
            </thead>

            <tbody>

                @forelse($products as $product)

                <tr>

                    <td class="border p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-3">
                        {{ $product->name }}
                    </td>

                    <td class="border p-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>

                    <td class="border p-3">
                        {{ $product->stock }}
                    </td>

                    <td class="border p-3">

                        @if($product->stock > 10)

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Tersedia
                            </span>

                        @elseif($product->stock > 0)

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                Menipis
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Habis
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="border p-4 text-center text-gray-500">
                        Belum ada data produk.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection