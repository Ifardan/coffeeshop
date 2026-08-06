@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Dashboard Kasir ☕
</h1>

<div class="grid grid-cols-3 gap-6 mb-6">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold">
            Total Pesanan
        </h2>

        <p class="text-3xl mt-4 text-green-600">
            {{ $totalPesanan }}
        </p>

    </div>

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold">
            Pendapatan Hari Ini
        </h2>

        <p class="text-3xl mt-4 text-blue-600">
            Rp {{ number_format($pendapatanHariIni,0,',','.') }}
        </p>

    </div>

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold">
            Produk Terjual
        </h2>

        <p class="text-3xl mt-4 text-yellow-600">
            {{ $produkTerjual }}
        </p>

    </div>

</div>

<div class="bg-white rounded shadow p-6">

    <h2 class="text-xl font-bold mb-4">
        Daftar Pesanan Pelanggan
    </h2>

    <table class="w-full border border-gray-300">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Invoice</th>
                <th class="border p-2">Pelanggan</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $order)
            <tr>
                <td class="border p-2">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-2">
                    {{ $order->invoice }}
                </td>

                <td class="border p-2">
                    {{ $order->customer_name }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($order->total,0,',','.') }}
                </td>

                <td class="border p-2">
                    {{ $order->status }}
                </td>

                <td class="border p-2">
                    {{ $order->created_at }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="border p-4 text-center">
                    Belum ada pesanan
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection