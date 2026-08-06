@extends('layouts.frontend')

@section('content')

<div class="max-w-2xl mx-auto py-10 px-4">

    <div class="bg-white shadow-lg rounded-2xl p-8 text-center">

        <div class="text-6xl mb-4">
            ✅
        </div>

        <h1 class="text-3xl font-bold mb-3">
            Pesanan Berhasil
        </h1>

        <p class="text-gray-500 mb-6">
            Terima kasih telah melakukan pemesanan.
        </p>

        <div class="bg-gray-100 rounded-xl p-4 mb-6">

            <p class="text-sm text-gray-500">
                Nomor Invoice
            </p>

            <p class="font-bold text-xl">
                {{ $transaction->invoice }}
            </p>

        </div>

        <div class="space-y-3">

            <a href="{{ route('menu') }}"
               class="block bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">

               ☕ Pesan Lagi

            </a>

            <a href="{{ route('menu') }}"
               class="block bg-amber-500 hover:bg-amber-600 text-white py-3 rounded-xl font-semibold">

                ☕ Kembali ke Menu

            </a>

        </div>

    </div>

</div>

@endsection