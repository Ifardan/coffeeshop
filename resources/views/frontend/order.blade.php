@extends('layouts.frontend')

@section('content')

<div class="max-w-5xl mx-auto py-16 px-6">

    <div class="bg-white rounded-3xl shadow-xl p-10">

        <h1 class="text-5xl font-bold text-yellow-700 mb-10">
            Order Produk ☕
        </h1>

        <div class="grid md:grid-cols-2 gap-10 items-center">

            <div>
                <img src="{{ asset('images/'.$product->image) }}"
                     class="rounded-2xl w-full h-96 object-cover">
            </div>

            <div>

                <h2 class="text-4xl font-bold mb-4">
                    {{ $product->name }}
                </h2>

                <p class="text-gray-600 mb-6">
                    {{ $product->description }}
                </p>

                <h3 class="text-3xl text-green-600 font-bold mb-8">
                    Rp {{ number_format($product->price) }}
                </h3>

                <form action="/cart/add/{{ $product->id }}" method="POST">
                    @csrf

                    <label class="block mb-2 font-semibold">
                        Jumlah Pesanan
                    </label>

                    <input type="number"
                           name="qty"
                           value="1"
                           min="1"
                           class="w-full border rounded-xl px-4 py-3 mb-6">

                    <button class="w-full bg-yellow-700 hover:bg-yellow-800 text-white py-4 rounded-2xl text-xl font-bold">
                        Checkout Sekarang
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection