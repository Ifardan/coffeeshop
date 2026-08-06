<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Models\TransactionItem;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Penjualan
        $totalSales = Transaction::where('status', 'paid')
            ->sum('total');

        // Total Pesanan
        $totalOrders = Transaction::count();

        // Total Produk
        $totalProducts = Product::count();

        // Total Reservasi
        $totalReservations = Reservation::count();

        // Pesanan Terbaru
        $latestOrders = Transaction::latest()
            ->take(5)
            ->get();

        // Produk Terlaris
        $bestProducts = TransactionItem::selectRaw(
                'product_id, SUM(qty) as total_sold'
            )
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        // Stok Menipis
        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock')
            ->get();

        // Grafik Penjualan
        $salesChart = Transaction::selectRaw(
                'DATE(created_at) as date, SUM(total) as total'
            )
            ->where('status', 'paid')
            ->whereDate('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('owner.dashboard', compact(
            'totalSales',
            'totalOrders',
            'totalProducts',
            'totalReservations',
            'latestOrders',
            'bestProducts',
            'lowStockProducts',
            'salesChart'
        ));
    }
}