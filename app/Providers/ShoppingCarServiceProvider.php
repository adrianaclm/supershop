<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Models\ShoppingCar;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;


class ShoppingCarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      /**View::composer("*", function($view){

            $shopping_car_id = Session::get('shoopping_car_id');

            $shopping_car = CartController::findOrCreateBySessionID($shopping_car_id);

            Session::put("shopping_car_id", $shopping_car->id);

            $view->with(compact("shopping_car"));
       });*/
    }
}
