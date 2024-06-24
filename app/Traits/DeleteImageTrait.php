<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait DeleteImageTrait
{
    public function deleteImage($imagePath)
    {
        if (!is_null($imagePath)) {
            $imagePath = str_replace(url('storage/'), '', $imagePath);
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }
    }
}
