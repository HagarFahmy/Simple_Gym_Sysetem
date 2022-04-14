<?php


namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


const STORAGE_TYPE = 'public';
const DEFAULT_IMAGE = 'default.jpg';
const BASE_PATH = 'images';

trait ImageTrait
{

    public function storeImage($image, $location)
    {
        if (!$image) {
            return DEFAULT_IMAGE;
        }
        return $this->privateStore($image, $location);
    }

    public function updateImage($image, $oldImage, $location)
    {
        if ($image) {
            self::privateDelete($oldImage, $location);
            return $this->storeResize($image, $location);
        }
        return $oldImage;
    }

    public function deleteImage($image, $location)
    {
        self::privateDelete($image, $location);
    }

    private function privateStore($image, $location)
    {
        if (is_array($image)) {
            $hash_images = [];
            foreach ($image as $img) {
                array_push($hash_images, $this->storeResize($img, $location));
            }
            return $hash_images;
        }

        return $this->storeResize($image, $location);
    }

    private function storeResize($image,string $location)
    {
        Image::make($image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $image->store(BASE_PATH . '/' . $location , STORAGE_TYPE);
        return $image->hashName();
    }

    private function privateDelete($image, $location)
    {
        if (is_array($image)) {
            foreach ($image as $img) {
                self::deleteFile($img, $location);
            }
        } else {
            self::deleteFile($image, $location);
        }
    }

    private function deleteFile($image, string $location)
    {
        if ($image !== DEFAULT_IMAGE) {
            Storage::disk(STORAGE_TYPE)->delete(BASE_PATH . '/' . $location . '/' . $image);
        }
    }

}
