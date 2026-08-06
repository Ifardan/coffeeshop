@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    🧾 Riwayat Transaksi
</h1>

<div class="bg-white p-4 rounded shadow">

<table class="w-full border">

    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2">Invoice</th>
            <th class="border p-2">Produk</th>
            <th class="border p-2">Total</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Tanggal</th>
        </tr>
    </thead>

    <tbody>

    @forelse($transactions as $trx)

        <tr>

            <td class="border p-2">
                {{ $trx->invoice }}
            </td>

            <td class="border p-2">

                @foreach($trx->items as $item)

                    {{ $item->product->name ?? '-' }}<br>

                @endforeach

            </td>

            <td class="border p-2">
                Rp {{ number_format($trx->total,0,',','.') }}
            </td>

            <td class="border p-2">
                {{ $trx->status }}
            </td>

            <td class="border p-2">
                {{ $trx->created_at }}
            </td>

        </tr>

    @empty

        <tr>
            <td colspan="5" class="text-center p-4">
                Belum ada transaksi
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

</div>

@endsection