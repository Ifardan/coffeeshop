@extends('layouts.frontend')

@section('content')

<div class="container mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">
        📋 Pesanan Saya
    </h1>

    @forelse($transactions as $transaction)

        <div class="bg-white shadow rounded-xl p-5 mb-4">

            <div class="flex justify-between items-center">

                <!-- INFO ORDER -->
                <div>

                    <h3 class="font-bold">
                        {{ $transaction->invoice_code }}
                    </h3>

                    <p class="text-gray-500">
                        Rp {{ number_format($transaction->total, 0, ',', '.') }}
                    </p>

                </div>

                <!-- STATUS -->
                <div>

                    @if($transaction->status == 'pending')

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Menunggu
                        </span>

                    @elseif($transaction->status == 'process')

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                            Diproses
                        </span>

                    @elseif($transaction->status == 'done')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Selesai
                        </span>

                    @else

                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                            Unknown
                        </span>

                    @endif

                </div>

            </div>

            <!-- LINK DETAIL -->
            <a href="{{ url('/pesanan-saya/' . $transaction->id) }}"
               class="inline-block mt-4 text-blue-600 font-semibold">

                Lihat Detail →

            </a>

        </div>

        @empty

        <div class="bg-white rounded-xl shadow p-8 text-center">

            <p class="text-gray-500">
                Belum ada pesanan
            </p>

        </div>

    @endforelse

    <div class="mt-6">
        <a href="{{ url('/') }}"
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-5 py-3 rounded-lg transition">

            ← Kembali

        </a>
    </div>

</div>

@endsection