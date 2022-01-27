<?php

namespace App\Helper;

use Intervention\Image\Facades\Image;

class ImageUploadHelper
{
    public static function upload($directory, $file)
    {
        if ($file) {
            return self::saveImage($file, $directory, false);
        }

        return "";
    }

    protected static function saveImage($img, $directory, $resize)
    {
        if ($img) {
            $app_storage = config('app.storage');
            $imageDestination = public_path($app_storage . "/{$directory}/");
            $imageName = time() . "_" . $img->getClientOriginalName();

            $img->move($imageDestination, $imageName);

            $uploadedImage = $imageDestination . $imageName;

            $imagePath = $directory . "/" . $imageName;

            if ($resize) {
                $image = Image::make($uploadedImage)->fit(1200, 600);
            } else {
                $image = Image::make($uploadedImage);
            }

            $image->save($uploadedImage);

            return $imagePath;
        }

        return "";
    }
}
