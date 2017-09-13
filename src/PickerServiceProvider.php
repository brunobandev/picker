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
        include __DIR__.'/../routes/picker.php';
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
        //
    }
}
