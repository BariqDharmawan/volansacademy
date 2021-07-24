<?php

namespace App\Providers;

use App\Configuration;
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
        $datas = Configuration::all();
		$config = [];
		foreach($datas as $data){
			$config[$data->name] = $data->value;
		}
        date_default_timezone_set('Asia/Jakarta');
		View::share('config', $config);
        //Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
