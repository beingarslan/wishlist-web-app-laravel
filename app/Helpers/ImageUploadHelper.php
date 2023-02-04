<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploadHelper
{
    public static function uploadImage($directory, $image, $oldImage = null, $ratio)
    {
        $imageName = Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath())->resize($ratio[0], $ratio[1]);
        $img->save(public_path($directory . '/' . $imageName));
        ImageUploadHelper::removeImage($oldImage);
        return $directory . '/' . $imageName;
    }

    public static function getImage($image)
    {
        return asset($image);
    }

    public static function removeImage($image = null)
    {
        if ($image != null) {
            @unlink(public_path($image));
        }
    }
}
