@extends('layouts.frontend')

@section('content')

@php
    $payment = $payment ?? null;
@endphp

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">
        Checkout
    </h1>

    @isset($product)

        <p class="mb-2">
            Produk: {{ $product->name }}
        </p>

        <p class="mb-4">
            Harga Satuan:
            Rp {{ number_format($product->price) }}
        </p>

    @endisset

    <form method="POST" action="{{ route('checkout.process', $product->id) }}">
        @csrf

        <!-- JUMLAH -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Jumlah</label>

            <div class="flex items-center gap-2">

                <button type="button" onclick="minusQty()"
                    class="bg-red-500 text-white px-4 py-2 rounded">-</button>

                <input type="number" id="qty" name="qty" value="1" min="1"
                    class="border rounded w-24 text-center p-2">

                <button type="button" onclick="plusQty()"
                    class="bg-green-500 text-white px-4 py-2 rounded">+</button>

            </div>
        </div>

        <!-- TOTAL -->
        <div class="mb-5">
            <label class="block font-semibold mb-2">Total Harga</label>

            <p id="total-price" class="text-2xl font-bold text-green-600">
                Rp {{ number_format($product->price) }}
            </p>
        </div>

        <!-- DATA PELANGGAN -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Nama Pelanggan</label>
            <input type="text" name="customer_name" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">No HP</label>
            <input type="text" name="customer_phone" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Email</label>
            <input type="email" name="customer_email" class="border rounded w-full p-2">
        </div>

        <!-- RESERVASI MEJA -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Reservasi Meja</label>

            <select name="table_number" class="border rounded w-full p-2">
                <option value="">Pilih Meja</option>

                @foreach($tables as $table)
                    <option value="{{ $table->table_number }}">
                        Meja {{ $table->table_number }}
                        ({{ $table->capacity }} Orang)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Tanggal Reservasi</label>
            <input type="date" name="reservation_date" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Jam Reservasi</label>
            <input type="time" name="reservation_time" class="border rounded w-full p-2">
        </div>

        <!-- METODE PEMBAYARAN -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Metode Pembayaran</label>

            <select name="payment_method" id="payment_method"
                class="border rounded w-full p-2" required>

                <option value="">Pilih Metode Pembayaran</option>
                <option value="qris">QRIS</option>
                <option value="transfer_bank">Transfer Bank</option>

            </select>
        </div>

        <!-- QRIS -->
        <div id="qris-info"
            class="hidden mt-4 bg-green-50 border border-green-200 rounded-lg p-5">

            <h3 class="font-bold mb-3">Scan QRIS</h3>

            @if($payment && $payment->qris_image)
                <img src="{{ asset('images/' . $payment->qris_image) }}" width="250">
            @else
                <p>QRIS belum tersedia</p>
            @endif

        </div>

        <!-- TRANSFER BANK -->
        <div id="transfer-info"
            class="hidden mt-4 bg-blue-50 border border-blue-200 rounded-lg p-5">

            <h3 class="font-bold text-lg text-blue-700 mb-4">
                Informasi Transfer Bank
            </h3>

            <div class="space-y-3">

                <div class="flex justify-between">
                    <span>Bank</span>
                    <span>{{ $payment->bank_name ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span>No Rekening</span>
                    <span>{{ $payment->account_number ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span>Atas Nama</span>
                    <span>{{ $payment->account_name ?? '-' }}</span>
                </div>

            </div>
        </div>

        <!-- BUTTON -->
        <div class="mt-5">
            <button type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded">
                Proses Pembayaran
            </button>
        </div>

    </form>
</div>

<script>

let paymentSelect = document.getElementById('payment_method');

if (paymentSelect) {
    paymentSelect.addEventListener('change', function () {

        let method = this.value;

        document.getElementById('qris-info').classList.add('hidden');
        document.getElementById('transfer-info').classList.add('hidden');

        if (method === 'qris') {
            document.getElementById('qris-info').classList.remove('hidden');
        }

        if (method === 'transfer_bank') {
            document.getElementById('transfer-info').classList.remove('hidden');
        }

    });
}

let price = {{ $product->price }};

function updateTotal() {
    let qty = parseInt(document.getElementById('qty').value);
    let total = qty * price;

    document.getElementById('total-price').innerText =
        'Rp ' + total.toLocaleString();
}

function plusQty() {
    let qty = document.getElementById('qty');
    qty.value = parseInt(qty.value) + 1;
    updateTotal();
}

function minusQty() {
    let qty = document.getElementById('qty');

    if (parseInt(qty.value) > 1) {
        qty.value = parseInt(qty.value) - 1;
        updateTotal();
    }
}

document.getElementById('qty').addEventListener('input', updateTotal);

updateTotal();

</script>

@endsection