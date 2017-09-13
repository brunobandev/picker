<?php

namespace Bandev\Picker\Facades;

use Illuminate\Support\Facades\Facade;

class Picker extends Facade
{
    protected static function getFacadeAccessor() {
        return 'bandev-picker';
    }
}