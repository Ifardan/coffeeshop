<!DOCTYPE html>
<html>
<head>

    <title>Kasir Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-green-900 text-white p-5">

        <h1 class="text-2xl font-bold text-yellow-400 mb-8">
            ☕ KASIR PANEL
        </h1>

        <div class="space-y-2">

            <!-- DASHBOARD -->
            <a href="/kasir/dashboard"
               class="block p-3 rounded hover:bg-green-800">

               📊 Dashboard

            </a>

            <!-- TRANSAKSI -->
            <div class="mt-5 text-gray-300 text-sm">
                TRANSAKSI
            </div>

            <a href="/kasir/orders"
               class="block p-3 rounded hover:bg-green-800">

               🛒 Pesanan

            </a>

            <a href="{{ route('kasir.transactions') }}"
               class="block p-3 rounded hover:bg-green-800">

              💰 Transaksi

            </a>
            
            <a href="/kasir/history"
               class="block p-3 rounded hover:bg-green-800">

               🧾 Riwayat Transaksi

            </a>

            <a href="/kasir/receipt"
               class="block p-3 rounded hover:bg-green-800">

              🖨️ Cetak Struk

            </a>

            <!-- PRODUK -->
            <div class="mt-5 text-gray-300 text-sm">
                PRODUK
            </div>

            <a href="/kasir/products"
               class="block p-3 rounded hover:bg-green-800">

              📦 Daftar Produk

            </a>

            <a href="{{ route('kasir.stok') }}"
               class="block p-3 rounded hover:bg-green-800">

              📋 Stok Produk

            </a>

            <!-- PELANGGAN -->
            <div class="mt-5 text-gray-300 text-sm">
                 PELANGGAN
            </div>

            <a href="/kasir/customers"
               class="block p-3 rounded hover:bg-green-800">

              👥 Data Pelanggan

            </a>

            {{-- 
            <a href="/kasir/reservations"
               class="block p-3 rounded hover:bg-green-800">

               📅 Reservasi Meja

            </a>
            --}}

            <!-- LAPORAN -->
            <div class="mt-5 text-gray-300 text-sm">
                LAPORAN
            </div>

            <a href="/kasir/reports"
               class="block p-3 rounded hover:bg-green-800">

              📈 Laporan Harian

            </a>

            <!-- PROFILE -->
            <div class="mt-5 text-gray-300 text-sm">
                AKUN
            </div>

            <a href="/profile"
               class="block p-3 rounded hover:bg-green-800">

               ⚙️ Profile

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
    <div class="flex-1 p-6">

        @yield('content')

    </div>

</div>

</body>
</html>