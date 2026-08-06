@extends('layouts.kasir')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    👥 Data Pelanggan
</h1>

<div class="bg-white shadow rounded p-4">

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">No</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">No. HP</th>
            </tr>
        </thead>

        <tbody>

        @forelse($customers as $customer)

            <tr>
                <td class="border p-2">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-2">
                    {{ $customer->customer_name }}
                </td>

                <td class="border p-2">
                    {{ $customer->customer_email }}
                </td>

                <td class="border p-2">
                    {{ $customer->customer_phone }}
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="4" class="text-center p-4">
                    Belum ada pelanggan
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection