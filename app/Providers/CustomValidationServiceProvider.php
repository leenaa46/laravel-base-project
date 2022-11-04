<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
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
        Validator::extend('lao_phone_number', function ($attribute, $value, $parameters, $validator) {
            return in_array(\substr($value, 0, 1), [2, 5, 7, 8, 9]);
        });
    }
}
