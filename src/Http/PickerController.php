<?php

namespace Bandev\Picker\Http;

class PickerController {
     
    public function picker($name = null) {
        if (isset($name)) {
            echo 'Welcome to picker ' . $name . '<br />';
        }
        
        echo 'Welcome to controller';
    }
}