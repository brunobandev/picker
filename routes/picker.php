<?php

$app->get('picker/{name?}', 'Bandev\Picker\Http\PickerController@picker');