<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class CustomerOrderController extends Controller
{
    public function index()
    {
    $session = session('customer_session');

    if (!$session) {
        return view('frontend.orders.index', [
            'transactions' => collect()
        ]);
    }

    $transactions = Transaction::with('items.product')
        ->where('customer_session', $session)
        ->latest()
        ->get();

    return view('frontend.orders.index', compact('transactions'));
}

    public function show($id)
    {
        $session = session('customer_session');

        if (!$session) {
            abort(404);
        }

        $transaction = Transaction::with('items.product')
            ->where('id', $id)
            ->where('customer_session', $session)
            ->firstOrFail();

        return view('frontend.orders.show', compact('transaction'));
}

    // 🔥 SUCCESS PAGE (boleh tetap invoice)
    public function success($invoice)
    {
        $transaction = Transaction::where('invoice_code', $invoice)
            ->firstOrFail();

        return view('frontend.orders.success', compact('transaction'));
    }
}