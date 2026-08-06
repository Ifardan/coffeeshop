@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Reservasi Meja 🍽️
</h1>

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-5">

        <h2 class="text-xl font-bold">
            Daftar Reservasi
        </h2>

        <a href="{{ route('kasir.reservations.create') }}"
           class="bg-green-500 text-white px-4 py-2 rounded">
           + Tambah Reservasi
        </a>

    </div>

    <table class="w-full border">

        <thead class="bg-gray-100">

            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">Nama Customer</th>
                <th class="border p-3">No HP</th>
                <th class="border p-3">Meja</th>
                <th class="border p-3">Tanggal</th>
                <th class="border p-3">Jam</th>
                <th class="border p-3">Status</th>
                <th class="border p-3">Aksi</th>
         </tr>

        </thead>

        <tbody>

        @forelse($reservations as $reservation)

        <tr>

            <td class="border p-3">
                {{ $reservation->id }}
            </td>

            <td class="border p-3">
                {{ $reservation->customer_name }}
            </td>

            <td class="border p-3">
                {{ $reservation->phone }}
            </td>

            <td class="border p-3">
                {{ $reservation->table_number }}
            </td>

            <td class="border p-3">
                {{ $reservation->reservation_date }}
            </td>

            <td class="border p-3">
                {{ $reservation->reservation_time }}
            </td>

            <td class="border p-3">

    <form action="{{ route('kasir.reservations.status', $reservation->id) }}"
          method="POST">

        @csrf

        <select name="status"
                onchange="this.form.submit()"
                class="border rounded px-2 py-1">

            <option value="pending"
                {{ $reservation->status == 'pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="confirmed"
                {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>
                Confirmed
            </option>

            <option value="completed"
                {{ $reservation->status == 'completed' ? 'selected' : '' }}>
                Completed
            </option>

            <option value="cancelled"
                {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>
                Cancelled
            </option>

        </select>

    </form>

</td>

            <td class="border p-3">

                <a href="{{ route('kasir.reservations.show', $reservation->id) }}"
                   class="text-blue-500">

                   Detail

                </a>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8"
                class="text-center p-5">

                Belum ada reservasi

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection