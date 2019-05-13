<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use App\Menu;


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

        Schema::defaultStringLength(191);

        view()->composer('*', function($view) {
           //dd(Menu::menus());
            if (Auth::check()) {
              //  dd("ACA: ".Auth::user());
              //  dd(auth()->user()->hasRole('superadmin'));
                $view->with('menus', Menu::menus2());
            }else {
                $view->with('menus', Menu::vacio());
            }

           
        });
        //
    }
}
