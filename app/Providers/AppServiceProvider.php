<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Transaction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Sanctum::ignoreMigrations();

         if (app()->environment('production')) {
            URL::forceScheme('https');
         }

        // Notifikasi transaksi baru untuk Kasir
        View::composer('layouts.kasir', function ($view) {
            $transaksiBaru = Transaction::where('status', 'pending')->count();

            $view->with('transaksiBaru', $transaksiBaru);
        });
    }
}