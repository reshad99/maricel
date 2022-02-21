<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Reservation;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {

        // Using Closure based composers
        view()->composer('front.layouts.footer', function ($view) {
            $dates = Reservation::where('id', 1)->select(['date'])->get();
            $view->dates = $dates;
        });
    }

    public function register()
    {
        //
    }
}