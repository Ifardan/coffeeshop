@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    🛒 Daftar Pesanan
</h1>

<div class="bg-white shadow rounded p-4">

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">No</th>
                <th class="border p-2">Invoice</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">No HP</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Meja</th>
                <th class="border p-2">Aksi</th>
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
        Rp {{ number_format($order->total, 0, ',', '.') }}
    </td>

    <td class="border p-2">

    @foreach($order->items as $item)

        Product ID: {{ $item->product_id }}
        <br>

        Nama Produk:
        {{ optional($item->product)->name }}

        <hr>

    @endforeach

</td>

    <td class="border p-2">

        @if($order->status == 'pending')

            <span class="text-yellow-600 font-bold">
                Menunggu
            </span>

        @elseif($order->status == 'paid')

            <span class="text-green-600 font-bold">
                Selesai
            </span>

        @else

            {{ $order->status }}

        @endif

    </td>

    <td class="border p-2">
        {{ $order->created_at }}
    </td>

    <td class="border p-2">
        {{ $order->customer_name }}
    </td>

    <td class="border p-2">
        {{ $order->customer_phone }}
    </td>

    <td class="border p-2">
        {{ $order->customer_email }}
    </td>

    <td class="border p-2">
        {{ $order->table_number ?? '-' }}
    </td>

    <td class="border p-2">

@if($order->status == 'pending')

    <form method="POST"
          action="{{ route('kasir.orders.complete', $order->id) }}">

        @csrf

        <button
            class="bg-green-500 text-white px-3 py-1 rounded">

            Selesaikan

        </button>

    </form>

@else

    <span class="text-green-600 font-bold">

        Sudah Selesai

    </span>

@endif

</td>

</tr>

@empty

<tr>

    <td colspan="11" class="text-center p-4">

        Belum ada pesanan

    </td>

</tr>

@endforelse

</tbody>

    </table>

</div>

@endsection