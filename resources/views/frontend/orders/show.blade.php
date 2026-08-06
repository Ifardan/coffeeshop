@extends('layouts.frontend')

@section('content')

<div class="max-w-2xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">
        Detail Pesanan
    </h1>

    <div class="bg-white p-6 rounded-xl shadow">

        <p>
            <strong>Invoice:</strong>
            {{ $transaction->invoice }}
        </p>

        <p>
            <strong>Nama:</strong>
            {{ $transaction->customer_name }}
        </p>

        <p>
            <strong>Status:</strong>

            @if($transaction->status == 'pending')
                <span class="text-yellow-600 font-bold">
                    Diproses
                </span>
            @else
                <span class="text-green-600 font-bold">
                    Selesai
                </span>
            @endif

        </p>

        <p>
            <strong>Metode Pembayaran:</strong>
            {{ $transaction->payment_method }}
        </p>

        <p>
            <strong>Total:</strong>
            Rp {{ number_format($transaction->total) }}
        </p>

        <hr class="my-4">

        <h3 class="font-bold mb-3">
            Produk
        </h3>

                @foreach($transaction->items as $item)

                <div class="flex justify-between py-2 border-b">

                   <span>
                       {{ $item->product->name ?? '-' }}
                       ({{ $item->qty }}x)
                   </span>

                  <span>
                      Rp {{ number_format($item->price * $item->qty) }}
                  </span>

                </div>

            @endforeach

            <!-- Tombol Kembali -->
            <div class="mt-6">
                <a href="{{ url('/pesanan-saya') }}"
                   class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-5 py-3 rounded-lg transition">

                   ← Kembali ke Pesanan Saya

                </a>
            </div>    

    </div>

</div>

@endsection