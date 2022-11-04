<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Godruoyi\Snowflake\Snowflake;
use Godruoyi\Snowflake\RandomSequenceResolver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('snowflake', function () {
            return (new Snowflake(
                config('snowflake.data_center'),
                config('snowflake.worker_node')
            )
            )
                ->setStartTimeStamp(strtotime('2022-01-01') * 1000)
                ->setSequenceResolver(new RandomSequenceResolver());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
