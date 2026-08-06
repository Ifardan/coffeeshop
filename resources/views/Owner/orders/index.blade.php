@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Daftar Pesanan
</h1>

<div class="bg-white p-6 rounded shadow">

    <table class="w-full text-left">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">Nama Customer</th>
                <th class="p-3 border">Total</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($orders as $order)

       <tr>

           <td class="p-3 border">
               {{ $order->customer_name }}
           </td>

           <td class="p-3 border">
               Rp {{ number_format($order->total, 0, ',', '.') }}
           </td>

           <td class="p-3 border">

               @if($order->status == 'pending')

                    <span class="text-yellow-600 font-bold">
                       Pending
                    </span>

                @elseif($order->status == 'paid')

                    <span class="text-green-600 font-bold">
                       Selesai
                    </span>

                @else

                    {{ $order->status }}

                @endif

            </td>

            <td class="p-3 border">

                <a href="{{ route('orders.show', $order->id) }}"
                   class="bg-green-500 text-white px-3 py-1 rounded">

                   Detail

                </a>

            </td>

        </tr>

        @empty

        <tr>

           <td colspan="4"
               class="text-center p-5">

               Belum ada pesanan

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection