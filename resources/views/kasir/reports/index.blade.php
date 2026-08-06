@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Laporan Harian 📈
</h1>

<div class="grid grid-cols-2 gap-6 mb-6">

    <div class="bg-green-500 text-white p-5 rounded">

        <h2>Total Penjualan</h2>

        <p class="text-3xl font-bold mt-2">
            Rp {{ number_format($todaySales) }}
        </p>

    </div>

    <div class="bg-blue-500 text-white p-5 rounded">

        <h2>Total Transaksi</h2>

        <p class="text-3xl font-bold mt-2">
            {{ $todayTransactions }}
        </p>

    </div>

</div>

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">
        Riwayat Transaksi
    </h2>

    <table class="w-full border">

        <thead>

            <tr class="bg-gray-100">

                <th class="border p-3">Invoice</th>
                <th class="border p-3">Total</th>
                <th class="border p-3">Metode</th>
                <th class="border p-3">Status</th>

            </tr>

        </thead>

        <tbody>

        @forelse($transactions as $trx)

            <tr>

                <td class="border p-3">
                    {{ $trx->invoice }}
                </td>

                <td class="border p-3">
                    Rp {{ number_format($trx->total) }}
                </td>

                <td class="border p-3">
                    {{ $trx->payment_method }}
                </td>

                <td class="border p-3">
                    {{ $trx->status }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4"
                    class="border p-3 text-center">

                    Belum ada transaksi

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection