<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-black text-white p-5">

        <h1 class="text-2xl font-bold text-yellow-400 mb-8">
            ☕ OWNER PANEL
        </h1>

        <div class="space-y-2">

            <a href="/owner/dashboard"
               class="block p-3 rounded hover:bg-gray-800">
               📊 Dashboard
            </a>

            <!-- PRODUK -->
            <div class="mt-5 text-gray-400 text-sm">
                PRODUK / MENU
            </div>

            <a href="{{ route('products.index') }}"
               class="block p-3 rounded hover:bg-gray-800">
               📦 Kelola Produk
            </a>

            <a href="{{ route('products.create') }}"
               class="block p-3 rounded hover:bg-gray-800">
               ➕ Tambah Produk
            </a>

            <!-- KATEGORI -->
            <div class="mt-5 text-gray-400 text-sm">
               KATEGORI
            </div>

            <a href="{{ route('categories.index') }}"
               class="block p-3 rounded hover:bg-gray-800">
               📁 Kelola Kategori
            </a>

            <a href="{{ route('categories.create') }}"
               class="block p-3 rounded hover:bg-gray-800">
               ➕ Tambah Kategori
            </a>

            <!-- MASTER MEJA -->
            <div class="mt-5 text-gray-400 text-sm">
                MASTER MEJA
            </div>

            <a href="{{ route('tables.index') }}"
               class="block p-3 rounded hover:bg-gray-800">
               🪑 Kelola Meja
            </a>

            {{--
            <!-- PESANAN -->
            <div class="mt-5 text-gray-400 text-sm">
                PESANAN
            </div>

            <a href="/owner/orders">
                🛒 Daftar Pesanan
            </a>
            --}}

            <!-- LAPORAN -->
            <div class="mt-5 text-gray-400 text-sm">
                LAPORAN
            </div>

            <a href="/owner/reports"
               class="block p-3 rounded hover:bg-gray-800">
               📈 Laporan Penjualan
            </a>

            <!-- WEBSITE -->
            <div class="mt-5 text-gray-400 text-sm">
                WEBSITE
            </div>

            <a href="/owner/website/home"
               class="block p-3 rounded hover:bg-gray-800">
               🏠 Home
            </a>

            <a href="/owner/website/about"
               class="block p-3 rounded hover:bg-gray-800">
               ℹ️ About
            </a>

            <a href="/owner/website/contact"
               class="block p-3 rounded hover:bg-gray-800">
               📞 Contact
            </a>

            <!-- PENGATURAN -->
            <div class="mt-5 text-gray-400 text-sm">
                PENGATURAN
            </div>

            <a href="/profile"
               class="block p-3 rounded hover:bg-gray-800">
               ⚙️ Profile
            </a>

            <a href="/owner/payment"
               class="block p-3 rounded hover:bg-gray-800">
               ⚙️ QRIS Payment
            </a>

            <!-- LOGOUT -->
            <form method="POST" action="/logout">
                @csrf
                <button class="w-full mt-5 bg-red-500 hover:bg-red-600 p-3 rounded">
                    🚪 Logout
                </button>
            </form>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-6 overflow-auto">

        <h1 class="text-3xl font-bold mb-6">
    Dashboard Owner
</h1>

<!-- STATISTIK -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-5 rounded shadow">
        <h3 class="font-bold text-gray-600">
            Total Penjualan
        </h3>

        <p class="text-3xl text-green-600 mt-3">
            Rp {{ number_format($totalSales) }}
        </p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="font-bold text-gray-600">
            Total Pesanan
        </h3>

        <p class="text-3xl text-blue-600 mt-3">
            {{ $totalOrders }}
        </p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="font-bold text-gray-600">
            Total Produk
        </h3>

        <p class="text-3xl text-yellow-500 mt-3">
            {{ $totalProducts }}
        </p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="font-bold text-gray-600">
            Total Reservasi
        </h3>

        <p class="text-3xl text-purple-600 mt-3">
            {{ $totalReservations }}
        </p>
    </div>

</div>

<!-- GRAFIK PENJUALAN -->
<div class="bg-white p-6 rounded shadow mb-8">

    <h2 class="text-xl font-bold mb-4">
        Grafik Penjualan
    </h2>

    <canvas id="salesChart"></canvas>

</div>

<!-- PRODUK TERLARIS -->
<div class="bg-white p-6 rounded shadow mb-8">

    <h2 class="text-xl font-bold mb-4">
        Produk Terlaris
    </h2>

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Produk</th>
                <th class="border p-2">Terjual</th>
            </tr>
        </thead>

        <tbody>

        @forelse($bestProducts as $item)

        <tr>
            <td class="border p-2">
                {{ $item->product->name ?? '-' }}
            </td>

            <td class="border p-2">
                {{ $item->total_sold }}
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="2" class="text-center p-4">
                Belum ada data
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

<!-- PESANAN TERBARU -->
<div class="bg-white p-6 rounded shadow mb-8">

    <h2 class="text-xl font-bold mb-4">
        Pesanan Terbaru
    </h2>

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Invoice</th>
                <th class="border p-2">Pelanggan</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>

        <tbody>

        @forelse($latestOrders as $order)

        <tr>
            <td class="border p-2">
                {{ $order->invoice }}
            </td>

            <td class="border p-2">
                {{ $order->customer_name }}
            </td>

            <td class="border p-2">
                Rp {{ number_format($order->total) }}
            </td>

            <td class="border p-2">
                {{ $order->status }}
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="4" class="text-center p-4">
                Belum ada transaksi
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

<!-- STOK MENIPIS -->
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4 text-red-600">
        Stok Menipis
    </h2>

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Produk</th>
                <th class="border p-2">Stok</th>
            </tr>
        </thead>

        <tbody>

        @forelse($lowStockProducts as $product)

        <tr>
            <td class="border p-2">
                {{ $product->name }}
            </td>

            <td class="border p-2">
                {{ $product->stock }}
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="2" class="text-center p-4">
                Tidak ada stok menipis
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('salesChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($salesChart as $item)
                '{{ $item->date }}',
            @endforeach
        ],
        datasets: [{
            label: 'Penjualan (Rp)',
            data: [
                @foreach($salesChart as $item)
                    {{ $item->total }},
                @endforeach
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                }
            }
        }
    }
});

</script>

</body>
</html>