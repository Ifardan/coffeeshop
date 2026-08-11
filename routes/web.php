<?php

use Illuminate\Support\Facades\Route;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Str;
use App\Http\Controllers\Owner\PaymentSettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\TableController;
use App\Http\Controllers\Kasir\DashboardController as KasirDashboardController;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\MenuController;
use App\Models\WebsiteSetting;
use App\Http\Controllers\Kasir\StokProdukController;
use App\Http\Controllers\Kasir\PesananController;
use App\Models\Reservation;
use App\Models\Table;

/*
|--------------------------------------------------------------------------
| LOGIN OWNER & KASIR
|--------------------------------------------------------------------------
*/

Route::get('/owner/login', function () {
    return redirect('/login');
})->name('owner.login');

Route::get('/kasir/login', function () {
    return view('auth.kasir-login');
})->name('kasir.login');

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/menu', function () {

    $categories = \App\Models\Category::with('products')->get();

    return view('frontend.menu', compact('categories'));

})->name('menu');

use Illuminate\Http\Request;

Route::get('/orders/{invoice}', [CustomerOrderController::class, 'show']);

/* =========================
   CART CHECKOUT ROUTE
========================= */

Route::get('/cart/checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');

Route::post('/cart/checkout/process', [CartController::class, 'process'])
    ->name('cart.checkout.process');

Route::get('/pesanan-saya', [CustomerOrderController::class, 'index']);
Route::get('/pesanan-saya/{id}', [CustomerOrderController::class, 'show']);
Route::get('/order/success/{invoice}', [CustomerOrderController::class, 'success']);

Route::post('/cart/add/{id}', function ($id) {

    $product = \App\Models\Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if(isset($cart[$id]))
    {
        $cart[$id]['qty']++;
    }
    else
    {
        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'qty' => 1
        ];
    }

    session()->put('cart', $cart);

    return back()
        ->with('success', 'Produk masuk keranjang');

})->name('cart.add');

Route::post('/cart/minus/{id}', function ($id) {

    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {

        $cart[$id]['qty']--;

        if($cart[$id]['qty'] <= 0) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
    }

    return back();

})->name('cart.minus');

Route::get('/cart', function () {

    $cart = session()->get('cart', []);

    return view(
        'frontend.cart',
        compact('cart')
    );

})->name('cart.index');

Route::get(
    '/pesanan-berhasil/{id}',
    [CustomerOrderController::class, 'success']
)->name('customer.orders.success');

Route::get(
    '/orders/{invoice}',
    [CustomerOrderController::class, 'show']
)->name('customer.orders.show');

Route::get('/about', function () {

    $setting = WebsiteSetting::first();

    return view(
        'frontend.about',
        compact('setting')
    );

})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/order/{id}', function ($id) {

    $product = \App\Models\Product::findOrFail($id);

    return view('frontend.order', compact('product'));

})->name('order.show');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }

    $user = auth()->user();

    if ($user->role === 'owner') {
        return redirect('/owner/dashboard');
    }

    if ($user->role === 'kasir') {
        return redirect('/kasir/dashboard');
    }

    return abort(403);

})->middleware(['auth'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| OWNER
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'checkrole:owner'
])->prefix('owner')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('owner.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    Route::get('/products', function () {

    // AMBIL DATA PRODUK DARI DATABASE
    $products = Product::all();

    // KIRIM KE VIEW
    return view('owner.products.index', compact('products'));

    })->name('products.index');
   
    /*
    |-----------------------------------
    | QRIS PAYMENT (TARUH DI SINI)
    |-----------------------------------
    */
    Route::get('/payment', [\App\Http\Controllers\Owner\PaymentSettingController::class, 'index']);
    Route::post('/payment', [\App\Http\Controllers\Owner\PaymentSettingController::class, 'update']);

    Route::get('/products/create', function () {

    $categories = \App\Models\Category::all();

    return view('owner.products.create', compact('categories'));

    })->name('products.create');

    Route::post('/products/store', function (\Illuminate\Http\Request $request) {

    $filename = null;

    if ($request->hasFile('image')) {

        $file = $request->file('image');

        $filename =
            time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('images'),
            $filename
        );
    }

    \App\Models\Product::create([
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'image'       => $filename,
        'is_active'   => true,
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan');

})->name('products.store');

    Route::get('/products/{id}/edit', function ($id) {

    $product = \App\Models\Product::findOrFail($id);
    $categories = \App\Models\Category::all();

    return view('owner.products.edit', compact('product', 'categories'));

})->name('products.edit');

Route::put('/products/{id}', function ($id, \Illuminate\Http\Request $request) {

    $product = \App\Models\Product::findOrFail($id);

    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'stock' => 'required',
    ]);

    $product->update([
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
    ]);

    // upload gambar optional
    if ($request->hasFile('image')) {

        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('images'), $filename);

        $product->image = $filename;
        $product->save();
    }

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil diupdate');

})->name('products.update');

Route::delete('/products/{id}', function ($id) {

    \App\Models\Product::findOrFail($id)->delete();

    return redirect()->route('products.index');

    })->name('products.destroy');

    /*
|--------------------------------------------------------------------------
| CATEGORIES
|--------------------------------------------------------------------------
*/

Route::get('/categories', function () {

    $categories = Category::all();

    return view('owner.categories.index', compact('categories'));

    })->name('categories.index');

Route::get('/categories/create', function () {

    return view('owner.categories.create');

    })->name('categories.create');

Route::post('/categories/store', function (\Illuminate\Http\Request $request) {

    \App\Models\Category::create([
        'name' => $request->name,
    ]);

    return redirect()->route('categories.index')
        ->with('success', 'Kategori berhasil ditambahkan');

})->name('categories.store');

Route::get('/categories/{id}/edit', function ($id) {

    $category = \App\Models\Category::findOrFail($id);

    return view('owner.categories.edit', compact('category'));

    })->name('categories.edit');

    Route::put('/categories/{id}', function ($id) {

    $category = \App\Models\Category::findOrFail($id);

    $category->update([
        'name' => request('name'),
    ]);

    return redirect()->route('categories.index');

})->name('categories.update');

Route::delete('/categories/{id}', function ($id) {

    $category = \App\Models\Category::findOrFail($id);
    $category->delete();

    return redirect()->route('categories.index')
        ->with('success', 'Kategori berhasil dihapus');

})->name('categories.destroy');

    /*
    |--------------------------------------------------------------------------
    | ORDERS
    |--------------------------------------------------------------------------
    */

   Route::get('/orders', function () {

    $orders = Transaction::with('items.product')
                ->latest()
                ->get();

    return view(
        'owner.orders.index',
        compact('orders')
    );

})->name('orders.index');

    Route::get('/orders/{id}', function ($id) {

    $order = Transaction::with('items.product')
                ->findOrFail($id);

    return view(
        'owner.orders.show',
        compact('order')
    );

})->name('orders.show');

    /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    */

    Route::get('/users', function () {

    $users = \App\Models\User::all();

    return view('owner.users.index', compact('users'));

    })->name('users.index');

    /*
    |--------------------------------------------------------------------------
    | REPORTS
    |--------------------------------------------------------------------------
    */

    Route::get('/reports', function () {

    $reports = Transaction::selectRaw('
        DATE(created_at) as tanggal,
        SUM(total) as total_penjualan,
        COUNT(*) as jumlah_order
    ')
    ->where('status', 'paid')
    ->groupBy('tanggal')
    ->orderBy('tanggal', 'desc')
    ->get();

    return view(
        'owner.reports.index',
        compact('reports')
    );

})->name('reports.index');

/*
|--------------------------------------------------------------------------
| KELOLA MEJA
|--------------------------------------------------------------------------
*/

Route::resource(
    'tables',
    TableController::class
);

    /*
    |--------------------------------------------------------------------------
    | WEBSITE CONTENT
    |--------------------------------------------------------------------------
    */

    Route::get('/website/home', function () {

    $setting = \App\Models\WebsiteSetting::firstOrCreate(
        ['id' => 1],
        [
            'hero_title' => '',
            'hero_subtitle' => '',

            'favorite_title' => '',

            'favorite_col1_title' => '',
            'favorite_col1_items' => '',

            'favorite_col2_title' => '',
            'favorite_col2_items' => '',

            'favorite_col3_title' => '',
            'favorite_col3_items' => '',
        ]
    );

    return view('owner.website.home', compact('setting'));

})->name('website.home');

Route::post('/website/home/update', function (\Illuminate\Http\Request $request) {

    \App\Models\WebsiteSetting::updateOrCreate(
        ['id' => 1],
        [
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,

            'favorite_title' => $request->favorite_title,

            'favorite_col1_title' => $request->favorite_col1_title,
            'favorite_col1_items' => $request->favorite_col1_items,

            'favorite_col2_title' => $request->favorite_col2_title,
            'favorite_col2_items' => $request->favorite_col2_items,

            'favorite_col3_title' => $request->favorite_col3_title,
            'favorite_col3_items' => $request->favorite_col3_items,
        ]
    );

    return back()->with('success', 'Home berhasil diupdate');

})->name('website.home.update');

   Route::get('/website/about', function () {

    $setting = WebsiteSetting::firstOrCreate([
        'id' => 1
    ]);

    return view('owner.website.about', compact('setting'));

})->name('website.about');


Route::post('/website/about/update', function (\Illuminate\Http\Request $request) {

    $setting = WebsiteSetting::firstOrCreate([
        'id' => 1
    ]);

    $setting->about_title =
        $request->about_title;

    $setting->about_description =
        $request->about_description;

    if ($request->hasFile('about_image')) {

        $file = $request->file('about_image');

        $filename =
            time() . '_' . $file->getClientOriginalName();

        $file->move(
            public_path('images'),
            $filename
        );

        $setting->about_image = $filename;
    }

    $setting->save();

    return back()->with(
        'success',
        'About berhasil diupdate'
    );

})->name('website.about.update');

    Route::get('/website/contact', function () {

    $setting = WebsiteSetting::first();

    return view('owner.website.contact', compact('setting'));

    })->name('website.contact');

    Route::post('/website/contact/update', function () {

    WebsiteSetting::updateOrCreate(
        ['id' => 1],
        [
            'contact_address' => request('contact_address'),
            'contact_phone' => request('contact_phone'),
            'contact_email' => request('contact_email'),
        ]
    );

    return back();

    })->name('website.contact.update');
});

/*
|--------------------------------------------------------------------------
| KASIR
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'checkrole:kasir'
])->prefix('kasir')->group(function () {


    Route::get('/dashboard', [KasirDashboardController::class, 'index'])
    ->name('kasir.dashboard');

    // STOK PRODUK
    Route::get('/stok-produk',
        [StokProdukController::class, 'index'])
        ->name('kasir.stok');

        // PESANAN 
    Route::get('/orders',
        [PesananController::class, 'index'])
        ->name('kasir.orders');

    Route::post('/orders/{id}/complete', function ($id) {

    $order = Transaction::findOrFail($id);

    $order->status = 'paid';

    $order->save();

    return back();

})->name('kasir.orders.complete');

    Route::get('/history', function () {

    $transactions = \App\Models\Transaction::with('items.product')
                    ->latest()
                    ->get();

    return view('kasir.history.index', compact('transactions'));

})->name('kasir.history');

Route::get('/receipt', function () {

    $transactions = \App\Models\Transaction::with('items.product')
                    ->latest()
                    ->get();

    return view('kasir.receipt.index', compact('transactions'));

})->name('kasir.receipt');

Route::get('/products', function () {

    $products = \App\Models\Product::all();

    return view('kasir.products.index', compact('products'));

})->name('kasir.products');

Route::get('/customers', function () {

    $customers = Transaction::select(
        'customer_name',
        'customer_email',
        'customer_phone'
    )
    ->whereNotNull('customer_name')
    ->distinct()
    ->get();

    return view(
        'kasir.customers.index',
        compact('customers')
    );

})->name('kasir.customers');

   Route::get('/transactions', function () {

    $orders = \App\Models\Transaction::with('items.product')
                ->where('status', 'pending')
                ->latest()
                ->get();

    return view(
        'kasir.transactions',
        compact('orders')
    );

})->name('kasir.transactions');

    Route::post('/transactions/pay', function (\Illuminate\Http\Request $request) {

    try {

        $data = json_decode($request->getContent(), true);
        $cart = $data['cart'] ?? null;

        // 🔥 DEBUG: lihat data masuk atau tidak
        if (!$cart) {
            return response()->json([
                'success' => false,
                'message' => 'Cart kosong / tidak masuk',
                'debug' => $request->all()
            ], 400);
        }

        if (!is_array($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart bukan array',
                'debug' => $cart
            ], 400);
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] ?? 0;
        }

        $transaction = new \App\Models\Transaction();
        $transaction->user_id = auth()->id();
        $transaction->total = $total;
        $transaction->invoice = 'INV-' . now()->format('YmdHis') . '-' . rand(100,999);
        $transaction->save();

        foreach ($cart as $item) {

            \App\Models\TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['id'] ?? null,
                'qty' => 1,
                'price' => $item['price'] ?? 0,
            ]);

        }

        return response()->json([
            'success' => true,
            'message' => 'SUKSES'
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile()
        ], 500);
    }

})->name('kasir.pay');

Route::get('/reservations', function () {

    $reservations = Reservation::latest()->get();

    return view(
        'kasir.reservations.index',
        compact('reservations')
    );

})->name('kasir.reservations');

Route::get('/reservations/create', function () {

    return view('kasir.reservations.create');

})->name('kasir.reservations.create');

Route::post('/reservations/store', function () {

    Reservation::create([

        'customer_name' => request('customer_name'),

        'phone' => request('phone'),

        'table_number' => request('table_number'),

        'reservation_date' => request('reservation_date'),

        'reservation_time' => request('reservation_time'),

        'status' => 'pending'
    ]);

    return redirect()
        ->route('kasir.reservations');

})->name('kasir.reservations.store');

Route::get('/reservations/{id}', function ($id) {

    $reservation = Reservation::findOrFail($id);

    return view(
        'kasir.reservations.show',
        compact('reservation')
    );

})->name('kasir.reservations.show');

Route::post('/reservations/{id}/status', function ($id) {

 $reservation = Reservation::findOrFail($id);

    $reservation->status = request('status');

    $reservation->save();

    return back()
        ->with('success', 'Status reservasi berhasil diperbarui');

})->name('kasir.reservations.status');

Route::get('/reports', function () {

    $todaySales = Transaction::sum('total');

    $todayTransactions = Transaction::count();

    $transactions = Transaction::latest()->get();

    return view(
        'kasir.reports.index',
        compact(
            'todaySales',
            'todayTransactions',
            'transactions'
        )
    );

})->name('kasir.reports');

});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';