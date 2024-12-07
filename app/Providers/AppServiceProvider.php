<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        // View::composer('*', function ($view) {
        //     $cartCount = 0;
        //     $user_id = Session::get('user_id');
        //     if ($user_id) {
        //         $cart = DB::table('cart')->where('user_id', $user_id)->first();
        //         if ($cart) {
        //             $cartCount = DB::table('cart_detail')->where('cart_id', $cart->cart_id)->count();
        //         }
        //     }

        //     // Chia sẻ biến cartCount với tất cả các view
        //     $view->with('cartCount', $cartCount);
        // });
    }
}
