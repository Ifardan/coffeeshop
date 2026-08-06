<!DOCTYPE html>
<html>
<head>

    <title>Owner Dashboard</title>

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

            <!-- DASHBOARD -->
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

            <!-- USERS -->
            <div class="mt-5 text-gray-400 text-sm">
               USERS
            </div>

            <a href="{{ route('users.index') }}"
               class="block p-3 rounded hover:bg-gray-800">

               👥 Kelola User

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

        @yield('content')

    </div>

</div>

</body>
</html>