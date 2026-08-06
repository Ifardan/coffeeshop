@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Reservasi
</h1>

<form action="{{ route('kasir.reservations.store') }}"
      method="POST"
      class="bg-white p-6 rounded shadow">

    @csrf

    <div class="mb-4">
        <label>Nama Customer</label>
        <input type="text"
               name="customer_name"
               class="w-full border p-3 rounded">
    </div>

    <div class="mb-4">
        <label>No HP</label>
        <input type="text"
               name="phone"
               class="w-full border p-3 rounded">
    </div>

    <div class="mb-4">
        <label>Nomor Meja</label>
        <input type="text"
               name="table_number"
               class="w-full border p-3 rounded">
    </div>

    <div class="mb-4">
        <label>Tanggal</label>
        <input type="date"
               name="reservation_date"
               class="w-full border p-3 rounded">
    </div>

    <div class="mb-4">
        <label>Jam</label>
        <input type="time"
               name="reservation_time"
               class="w-full border p-3 rounded">
    </div>

    <button class="bg-green-500 text-white px-5 py-3 rounded">
        Simpan Reservasi
    </button>

</form>

@endsection