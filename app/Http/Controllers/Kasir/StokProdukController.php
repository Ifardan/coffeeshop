<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Product;

class StokProdukController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('kasir.stok.index', compact('products'));
    }
}