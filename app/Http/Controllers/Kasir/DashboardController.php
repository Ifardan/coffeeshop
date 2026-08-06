<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPesanan = Transaction::count();

        $pendapatanHariIni = Transaction::whereDate('created_at', today())
            ->where('status', 'paid')
            ->sum('total');

        $produkTerjual = Transaction::where('status', 'paid')
            ->count();

        $orders = Transaction::latest()->get();

        return view('kasir.dashboard', compact(
            'totalPesanan',
            'pendapatanHariIni',
            'produkTerjual',
            'orders'
        ));
    }
}