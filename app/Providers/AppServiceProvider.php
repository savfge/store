<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;
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
        $use = Paginator::useTailwind();
        Blade::if('lang',function($langauge){
            return App()->isLocale($langauge);
        });
        View::composer('*',function($view){
            $view->with('cartcontens',Cart::instance('cart')->content());
            $view->with('cartsubtotal',Cart::instance('cart')->subtotal());
            $view->with('carttotal',Cart::instance('cart')->total());
            $view->with('cartwishlists',Cart::instance('wishlist')->content());
        });
    }
}
