<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('partials.header', function ($view) {
            $cartCount = 0;
            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())->first();
                if ($cart) {
                    $cartCount = $cart->items()->count();
                }
            }
            $view->with('cartCount', $cartCount);
        });
    }
}