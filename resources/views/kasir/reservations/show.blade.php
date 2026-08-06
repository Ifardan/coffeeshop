@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Detail Reservasi
</h1>

<div class="bg-white p-6 rounded shadow">

    <p><b>Nama:</b> {{ $reservation->customer_name }}</p>

    <p><b>HP:</b> {{ $reservation->phone }}</p>

    <p><b>Meja:</b> {{ $reservation->table_number }}</p>

    <p><b>Tanggal:</b> {{ $reservation->reservation_date }}</p>

    <p><b>Jam:</b> {{ $reservation->reservation_time }}</p>

    <p><b>Status:</b> {{ $reservation->status }}</p>

</div>

@endsection