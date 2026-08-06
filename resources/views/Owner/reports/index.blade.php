@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Laporan Penjualan
</h1>

<div class="bg-white p-6 rounded shadow">

    <table class="w-full text-left">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">Tanggal</th>
                <th class="p-3 border">Total Penjualan</th>
                <th class="p-3 border">Jumlah Order</th>
            </tr>
        </thead>

        <tbody>

        @forelse($reports as $report)

        <tr>

            <td class="p-3 border">
                {{ \Carbon\Carbon::parse($report->tanggal)->format('d-m-Y') }}
            </td>

            <td class="p-3 border">
                Rp {{ number_format($report->total_penjualan) }}
            </td>

            <td class="p-3 border">
                {{ $report->jumlah_order }}
            </td>

        </tr>

        @empty

    <tr>

        <td colspan="3" class="p-4 text-center">
            Belum ada data penjualan
        </td>

    </tr>

    @endforelse

    </tbody>

</table>

</div>

@endsection