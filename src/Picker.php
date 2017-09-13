<?php

namespace Bandev\Picker;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Exception;

class Picker {

    public function sendImage($image)
    {

        try {
            list($type, $image) = explode(';', $image);
            list(, $extension) = explode('/', $type);
            list(, $image) = explode(',', $image);
            $fileName = 'user.' . $extension;

            $image = Image::make($image);
            $image->fit(250, 250, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::cloud()->put('avatars/' . $fileName, (string) $image->encode(), 'public');
            return Storage::cloud()->url('avatars/' . $fileName);
        
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}