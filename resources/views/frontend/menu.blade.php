@extends('layouts.frontend')

@section('content')

<!-- HEADER -->
<section class="py-16 text-center bg-white shadow">

    <h1 class="text-3xl md:text-5xl font-bold mb-4">
        Daftar Menu
    </h1>

    <div class="mt-5">

        <a href="{{ route('cart.index') }}"
           class="inline-block bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-xl text-base font-semibold shadow">

            🛒 Keranjang

        </a>

    </div>

</section>

<!-- MENU -->
<section class="container mx-auto py-12">

    @forelse($categories as $category)

        <div class="mb-12">

            <!-- NAMA KATEGORI -->
            <h2 class="text-3xl font-bold mb-6 border-b pb-3">
                {{ $category->name }}
            </h2>

            @if($category->products->count() > 0)

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    @foreach($category->products as $product)

                        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">

                            <img
                                src="{{ asset('images/' . ($product->image ?? 'no-image.jpg')) }}"
                                class="w-full h-40 object-cover">

                            <div class="p-4">

                                <h3 class="text-base md:text-lg font-semibold mb-1">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-gray-500 text-xs md:text-sm mb-3">
                                    {{ $product->description ?? 'Tidak ada deskripsi' }}
                                </p>

                                <div class="flex flex-col gap-3">

                                    <span class="text-green-600 font-bold text-lg">
                                        Rp {{ number_format($product->price) }}
                                    </span>

                                    <form action="{{ route('cart.add', $product->id) }}"
                                          method="POST">

                                        @csrf

                                    <button
                                        type="submit"
                                        class="w-full bg-yellow-400 hover:bg-yellow-500 py-3 rounded-lg font-semibold">
                                        Tambah ke Keranjang

                                    </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-gray-100 p-4 rounded">

                    <p class="text-gray-500">
                        Belum ada produk pada kategori ini.
                    </p>

                </div>

            @endif

        </div>

    @empty

        <div class="text-center py-10">

            <p class="text-gray-500 text-lg">
                Belum ada kategori tersedia.
            </p>

        </div>

    @endforelse

</section>

@endsection