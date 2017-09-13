<?php

namespace Bandev\Picker;

class Picker {
    
    public function display($message = null) {
        if (isset($message)) {
            return $message;
        }
        return "This display message";
    }
}