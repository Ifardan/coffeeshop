@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Detail Pesanan
</h1>

<div class="bg-white p-6 rounded shadow">

    <p class="mb-2">
        <strong>Invoice:</strong>
        {{ $order->invoice }}
    </p>

    <p class="mb-2">
        <strong>Customer:</strong>
        {{ $order->customer_name }}
    </p>

    <p class="mb-2">
        <strong>No HP:</strong>
        {{ $order->customer_phone }}
    </p>

    <p class="mb-2">
        <strong>Email:</strong>
        {{ $order->customer_email }}
    </p>

    <p class="mb-2">
        <strong>Status:</strong>
        {{ $order->status }}
    </p>

    <hr class="my-4">

    <h2 class="font-bold mb-3">
        Produk Yang Dipesan
    </h2>

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Produk</th>
                <th class="border p-2">Qty</th>
                <th class="border p-2">Harga</th>
            </tr>
        </thead>

        <tbody>

            @foreach($order->items as $item)

            <tr>

                <td class="border p-2">
                    {{ optional($item->product)->name }}
                </td>

                <td class="border p-2">
                    {{ $item->qty }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($item->price,0,',','.') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="mt-4 text-right font-bold text-xl">

        Total :
        Rp {{ number_format($order->total,0,',','.') }}

    </div>

</div>

@endsection