<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Schema::defaultStringLength(191);
        view()->composer('admin.partials.nav', function ($view){
            $SmsService = new \App\SmsService();
            $sms_balance = $SmsService->getBalance();
            $sms_limit = $SmsService->getLimit();

            $view->with(compact('sms_balance', 'sms_limit'));
        });

        view()->composer('site.layouts.footer', function ($view){
            $settings = \App\Setting::first();

            $view->with(compact( 'settings'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
