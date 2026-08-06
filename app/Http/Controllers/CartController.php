<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Table;
use App\Models\PaymentSetting;
use App\Models\Transaction;
use App\Models\TransactionItem;

class CartController extends Controller
{
    // HALAMAN CHECKOUT
    public function checkout()
    {
        $cart = session()->get('cart', []);

        $tables = Table::all();
        $payment = PaymentSetting::first();

        return view(
            'frontend.cart.checkout',
            compact('cart', 'tables', 'payment')
        );
    }

    // PROSES CHECKOUT
    public function process(Request $request)
    {
        $cart = session()->get('cart', []);

        if (!$cart || count($cart) == 0) {
            return back()->with('error', 'Keranjang kosong');
        }

        foreach ($cart as $item) {

            $product = Product::find($item['id']);

            if (!$product) {

                return back()->with(
                    'error',
                    'Produk tidak ditemukan'
                );
            }

            if ($product->stock < $item['qty']) {

                return back()->with(
                    'error',
                    'Stok produk ' . $product->name . ' tidak mencukupi'
                );
            }
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // SESSION CUSTOMER
        session([
            'customer_session' => session(
                'customer_session',
                uniqid('CUST-')
            )
        ]);

        $transaction = new Transaction();

        $transaction->customer_session =
        session('customer_session');

        $invoice = 'INV-' . time() . rand(100,999);

        $transaction->invoice = $invoice;
        $transaction->invoice_code = $invoice;

        $transaction->customer_name =
            $request->customer_name;

        $transaction->customer_phone =
            $request->customer_phone;

        $transaction->customer_email =
            $request->customer_email;

        $transaction->table_number =
            $request->table_number;

        $transaction->total =
            $total;

        $transaction->payment_method =
            $request->payment_method;

        $transaction->status =
            'pending';

        $transaction->save();

        foreach ($cart as $item) {

            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id'     => $item['id'],
                'qty'            => $item['qty'],
                'price'          => $item['price'],
            ]);

            $product = Product::find($item['id']);

            if ($product) {

               $product->decrement('stock', $item['qty']);
            }
        }
        
        session()->forget('cart');

        return redirect('/pesanan-saya')
            ->with('success', 'Pesanan berhasil dibuat');
    }
}