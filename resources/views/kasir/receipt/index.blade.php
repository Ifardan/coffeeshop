@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    🖨️ Cetak Struk
</h1>

@forelse($transactions as $trx)

<div class="bg-white p-4 rounded shadow mb-4">

    <h3 class="font-bold">
        Invoice: {{ $trx->invoice }}
    </h3>

    <p>
        Tanggal: {{ $trx->created_at }}
    </p>

    <hr class="my-2">

    @foreach($trx->items as $item)

        <p>
            {{ $item->product->name ?? '-' }}
            ({{ $item->qty }})
            - Rp {{ number_format($item->price,0,',','.') }}
        </p>

    @endforeach

    <hr class="my-2">

    <h4 class="font-bold">
        Total:
        Rp {{ number_format($trx->total,0,',','.') }}
    </h4>

    <button onclick="window.print()"
            class="mt-3 bg-green-600 text-white px-4 py-2 rounded">

        Cetak

    </button>

</div>

@empty

<p>Belum ada transaksi.</p>

@endforelse

@endsection