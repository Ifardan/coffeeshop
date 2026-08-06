@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Transaksi Masuk 💰
</h1>

@forelse($orders as $order)

<div class="bg-white shadow rounded p-6 mb-5">

    <div class="flex justify-between">

        <div>

            <h2 class="font-bold text-xl">
                {{ $order->invoice }}
            </h2>

            <p>
                Customer :
                {{ $order->customer_name }}
            </p>

            <p>
                No HP :
                {{ $order->customer_phone }}
            </p>

        </div>

        <div>

            <span class="bg-yellow-200 px-3 py-1 rounded">

                {{ $order->status }}

            </span>

        </div>

    </div>

    <hr class="my-4">

    <h3 class="font-bold mb-2">
        Produk Pesanan
    </h3>

    @foreach($order->items as $item)

    <div class="flex justify-between border-b py-2">

        <span>

            {{ $item->product->name ?? '-' }}

        </span>

        <span>

            Qty : {{ $item->qty }}

        </span>

    </div>

    @endforeach

    <div class="mt-4 font-bold text-right">

        Total :
        Rp {{ number_format($order->total, 0, ',', '.') }}

    </div>

</div>

@empty

<div class="bg-white p-6 rounded shadow text-center">

    Belum ada pesanan masuk

</div>

@endforelse

@endsection