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
        //
        include  __DIR__ . '/../routes/picker.php';
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
