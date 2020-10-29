<?php

namespace Armincms\Conversion;
 
use Illuminate\Support\ServiceProvider; 
use Illuminate\Contracts\Support\DeferrableProvider;


class ConversionServiceProvider extends ServiceProvider implements DeferrableProvider
{ 

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('conversion', function($app) {
            return new ConversionManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'conversion'
        ];
    }
}
