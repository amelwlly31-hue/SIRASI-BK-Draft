<?php

namespace App\Providers;

use App\Models\Notifikasi;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('notifikasis')) {
                    $notifikasis = Notifikasi::where('created_at', '>=', now()->subHours(24))
                        ->latest()
                        ->take(10)
                        ->get();
                    $view->with('notifikasis', $notifikasis);
                }
            } catch (\Throwable $e) {
                // Abaikan jika database belum siap atau saat migration
            }
        });
    }
}
