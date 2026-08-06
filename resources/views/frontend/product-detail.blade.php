@extends('frontend.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-12 px-6">

    <div class="grid md:grid-cols-2 gap-10 items-center">

        <!-- Gambar -->
        <div>

            <img src="{{ asset('images/'.$product->image) }}"
                 class="w-full rounded-2xl shadow-lg">

        </div>

        <!-- Detail -->
        <div>

            <h1 class="text-5xl font-bold text-gray-800 mb-4">
                {{ $product->name }}
            </h1>

            <p class="text-gray-500 leading-8 mb-6">
                {{ $product->description }}
            </p>

            <p class="text-3xl font-bold text-green-600 mb-8">
                Rp {{ number_format($product->price) }}
            </p>

            <a href="/order/{{ $product->id }}"
               class="inline-block bg-yellow-700 hover:bg-yellow-800 text-white px-8 py-4 rounded-xl">

                Order Sekarang ☕

            </a>

        </div>

    </div>

</div>

@endsection