<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // LIST PRODUK
    public function index()
    {
        $products = Product::latest()->get();
        return view('owner.products.index', compact('products'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('owner.products.create');
    }

    // SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('owner.products.edit', compact('product'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}