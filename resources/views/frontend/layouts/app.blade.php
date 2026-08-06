<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- NAVBAR ADMIN -->
<nav class="bg-white shadow p-4 flex justify-between">
    <div class="font-bold text-yellow-700">
        ☕ Admin Panel
    </div>

    <div class="flex gap-4">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/products">Produk</a>
        <a href="/menu">Website</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600">Logout</button>
        </form>
    </div>
</nav>

<!-- CONTENT -->
<div class="p-6">
    @yield('content')
</div>

</body>
</html>