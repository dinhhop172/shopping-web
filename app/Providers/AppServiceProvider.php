<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Database\Schema\Builder;
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
        Builder::defaultStringLength(191);
        view()->composer('frontend.components.main_menu', function ($view) {
            $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
            $view->with('categoryLimit', $categoryLimit);
        });

        view()->composer('frontend.components.header', function ($view) {
            if (session()->has('cart')) {
                $cart = session()->get('cart');
                // $quantity = count($cart);
                $quantity = 0;
                foreach ($cart as $value) {
                    $quantity += $value['quantity'];
                }
                $view->with('quantityAllProduct', $quantity);
            }
        });
    }
}
