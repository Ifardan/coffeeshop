@extends('layouts.frontend')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

    <!-- Tombol Kembali -->
    <div class="mb-4">

        <a href="{{ route('cart.index') }}"
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm">

            ← Keranjang

        </a>

    </div>

    <h1 class="text-2xl font-bold mb-4">
        Checkout Keranjang
    </h1>

@php
    $total = 0;
@endphp

<div class="mb-5">

    <h2 class="font-bold text-lg mb-3">
        Daftar Pesanan
    </h2>

    @foreach($cart as $item)

        @php
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;
        @endphp

        <div class="border-b py-2">

            {{ $item['name'] }}
            ({{ $item['qty'] }}x)

            -

            Rp {{ number_format($subtotal) }}

        </div>

    @endforeach

    <div class="mt-3 font-bold text-xl text-green-600">

        Total:
        Rp {{ number_format($total) }}

    </div>

</div>

<form method="POST"
      action="{{ route('cart.checkout.process') }}">

    @csrf

    <div class="mb-4">

        <label>Nama Pelanggan</label>

        <input
            type="text"
            name="customer_name"
            class="border p-3 w-full rounded-lg"
            required>

    </div>

    <div class="mb-4">

        <label>No HP</label>

        <input
            type="text"
            name="customer_phone"
            class="border p-3 w-full rounded-lg"
            required>

    </div>

    <div class="mb-4">

        <label>Email</label>

        <input
            type="email"
            name="customer_email"
            class="border p-3 w-full rounded-lg">
    </div>

    <div class="mb-4">

        <label>Nomor Meja</label>

        <select
            name="table_number"
            class="border p-3 w-full rounded-lg">

            <option value="">
                Pilih Meja
            </option>

            @foreach($tables as $table)

                <option value="{{ $table->table_number }}">
                    Meja {{ $table->table_number }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label>Tanggal Reservasi</label>

        <input
            type="date"
            name="reservation_date"
            class="border p-3 w-full rounded-lg">

    </div>

    <div class="mb-4">

        <label>Jam Reservasi</label>

        <input
            type="time"
            name="reservation_time"
            class="border p-3 w-full rounded-lg">

    </div>

    <div class="mb-4">

        <label>Metode Pembayaran</label>

        <select
            id="payment_method"
            name="payment_method"
            class="border p-3 w-full rounded-lg"
            required>

            <option value="">
                Pilih Metode Pembayaran
            </option>

            <option value="qris">
                QRIS
            </option>

            <option value="transfer_bank">
                Transfer Bank
            </option>

        </select>

    </div>

    <!-- QRIS -->
    <div id="qris-info"
         style="display:none"
         class="bg-green-50 border border-green-200 rounded-lg p-5 mb-4">

        <h3 class="text-lg font-bold text-green-700 mb-3">
            📱 Pembayaran QRIS
        </h3>

        <p class="mb-3">
            Scan QR Code berikut menggunakan aplikasi pembayaran Anda.
        </p>

        @if($payment && $payment->qris_image)

            <img
                src="{{ asset('images/' . $payment->qris_image) }}"
                class="w-full max-w-xs mx-auto rounded shadow"
                class="mx-auto rounded shadow">

        @else

            <p>QRIS belum tersedia</p>

        @endif

    </div>

    <!-- TRANSFER BANK -->
    <div id="transfer-info"
         style="display:none"
         class="bg-blue-50 border border-blue-200 rounded-lg p-5 mb-4">

        <h3 class="text-lg font-bold text-blue-700 mb-4">
            💳 Informasi Transfer Bank
        </h3>

        <div class="space-y-3">

            <div class="flex justify-between">
                <span>Bank</span>
                <span class="font-bold">
                    {{ $payment->bank_name ?? '-' }}
                </span>
            </div>

            <div class="flex justify-between items-center">

                <span>No Rekening</span>

                <div class="flex items-center gap-2">

                    <span id="rekening-number" class="font-bold">
                        {{ $payment->account_number ?? '-' }}
                    </span>

                    <button
                        type="button"
                        onclick="copyRekening()"
                        class="bg-blue-500 text-white px-2 py-1 rounded text-sm">

                        Salin

                    </button>

                </div>

            </div>

            <div class="flex justify-between">
                <span>Atas Nama</span>
                <span class="font-bold">
                    {{ $payment->account_name ?? '-' }}
                </span>
            </div>

        </div>

        <p id="copy-success"
           style="display:none"
           class="text-green-600 text-sm mt-3">

            ✓ Nomor rekening berhasil disalin

        </p>

        <div class="mt-4 text-sm text-red-600">
            Setelah transfer, silakan tunjukkan bukti pembayaran kepada kasir.
        </div>

    </div>

    <button
        class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold">

        Proses Pesanan

    </button>

</form>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const paymentMethod = document.getElementById('payment_method');

    paymentMethod.addEventListener('change', function () {

        document.getElementById('qris-info').style.display = 'none';
        document.getElementById('transfer-info').style.display = 'none';

        if (this.value === 'qris') {
            document.getElementById('qris-info').style.display = 'block';
        }

        if (this.value === 'transfer_bank') {
            document.getElementById('transfer-info').style.display = 'block';
        }

    });

});

function copyRekening()
{
    let rekening =
        document.getElementById('rekening-number').innerText;

    navigator.clipboard.writeText(rekening);

    document.getElementById('copy-success').style.display = 'block';

    setTimeout(function () {

        document.getElementById('copy-success').style.display = 'none';

    }, 2000);
}

</script>

@endsection
