<?php

namespace Bandev\Picker;

use Illuminate\Support\ServiceProvider;

class PickerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/picker.php' => config_path('picker.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('bandev-picker', function () {
            return new Picker();
        });
    }
}
