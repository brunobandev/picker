<?php

namespace Bandev\Picker;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Exception;
use Config;

class Picker {

    private $config;
    private $path;

    /**
     * Send Image
     * @param  string $image
     * @param  string $format
     * @param  string $resource
     * @param  int $resourceId
     * @return string url
     */
    public function sendImage($image, $format, $resource, $resourceId)
    {
        try {
            $this->config = (object) config('picker.' . $format);

            list($type, $image) = explode(';', $image);
            list(, $extension) = explode('/', $type);
            list(, $image) = explode(',', $image);

            $filename = $format . '.' . $extension;
            $this->path = $this->config->service . '/' . $resource . '/' . $resourceId . '/' . $filename;

            $image = $this->_cropImage($image);

            return $this->_saveImage($image);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Crop Image
     * @param  string $image
     * @return object
     */
    private function _cropImage($image)
    {
        try {
            $image = Image::make($image);
            $image->fit($this->config->size['width'], $this->config->size['height'], function ($constraint) {
                $constraint->aspectRatio();
            });

            return $image;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Save Image
     * @param  object $image
     * @return string url image
     */
    private function _saveImage($image)
    {
        try {
            Storage::cloud()->put($this->path, (string) $image->encode(), 'public');

            return Storage::cloud()->url($this->path);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
