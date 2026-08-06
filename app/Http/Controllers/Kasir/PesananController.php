<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class PesananController extends Controller
{
    public function index()
    {
        $orders = Transaction::with('items.product')
                    ->latest()
                    ->get();

        return view(
            'kasir.orders.index',
            compact('orders')
        );
    }
}