<?php

namespace App\Providers;

use App\Configuration;
use App\OurContact;
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
        try {
            date_default_timezone_set('Asia/Jakarta');

            $contacts = OurContact::isAddress(false)->get();
            $address = OurContact::isAddress(true)->first();

            View::share('contacts', $contacts);
            View::share('address', $address);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
