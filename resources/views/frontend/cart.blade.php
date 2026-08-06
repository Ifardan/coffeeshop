@extends('layouts.frontend')

@section('content')

<<div class="container mx-auto py-10">

    <h1 class="text-2xl md:text-4xl font-bold mb-6">
        Keranjang Belanja ☕
    </h1>

    <div class="bg-white shadow rounded-2xl p-4 md:p-8">

        @php
            $total = 0;
        @endphp

        @forelse($cart as $item)

            @php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            @endphp

            <!-- ITEM CART -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center border-b py-4 gap-3">

                <!-- KIRI -->
                <div>

                    <h2 class="text-lg font-semibold">
                        {{ $item['name'] }}
                    </h2>

                    <!-- QTY CONTROL -->
                    <div class="flex items-center gap-3 mt-2">

                        <!-- MINUS -->
                        <form action="{{ route('cart.minus', $item['id']) }}" method="POST">
                            @csrf
                            <button class="bg-red-500 text-white w-10 h-10 rounded-lg font-bold text-lg">
                                -
                            </button>
                        </form>

                        <span class="font-bold text-base min-w-[24px] text-center">
                            {{ $item['qty'] }}
                        </span>

                        <!-- PLUS -->
                        <form action="{{ route('cart.add', $item['id']) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 text-white w-10 h-10 rounded-lg font-bold text-lg">
                                +
                            </button>
                        </form>

                    </div>

                </div>

                <!-- KANAN -->
                <div class="text-lg font-bold text-green-600">
                    Rp {{ number_format($subtotal) }}
                </div>

            </div>

        @empty
            <p>Keranjang masih kosong.</p>
        @endforelse

        <!-- TOTAL -->
        <div class="mt-8 border-t pt-6">

            <div class="text-center">

               <p class="text-gray-500 text-sm mb-2">
                   Total Belanja
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-green-600">

                    Rp {{ number_format($total) }}

                </h2>

            </div>

            <form
                action="{{ route('cart.checkout') }}"
                method="GET"
                class="mt-6">

               <button
                   class="w-full bg-yellow-500 hover:bg-yellow-600 text-black py-4 rounded-xl font-bold text-lg shadow-lg transition">

                   Checkout →

               </button>

            </form>

        </div>

    </div>
</div>

@endsection