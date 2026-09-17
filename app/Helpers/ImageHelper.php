<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    private static function manager()
    {
        return new ImageManager(new Driver());
    }

    /**
     * Compresser et sauvegarder une image en WebP
     */
    public static function compressAndSave($image, $path, $quality = 80, $maxWidth = 1200)
    {
        $manager = self::manager();
        $img = $manager->read($image);
        
        // Redimensionner si trop large
        if ($img->width() > $maxWidth) {
            $img->scale(width: $maxWidth);
        }
        
        // Encoder en WebP
        $encoded = $img->toWebp($quality);
        
        // Sauvegarder
        Storage::disk('public')->put($path, (string) $encoded);
        
        return $path;
    }

    /**
     * Générer une miniature carrée
     */
    public static function generateThumbnail($image, $path, $size = 400, $quality = 75)
    {
        $manager = self::manager();
        $img = $manager->read($image);
        
        // Crop au centre (carré)
        $img->cover($size, $size);
        
        // Encoder en WebP
        $encoded = $img->toWebp($quality);
        
        // Sauvegarder
        Storage::disk('public')->put($path, (string) $encoded);
        
        return $path;
    }

    /**
     * Supprimer une image et sa miniature
     */
    public static function delete($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        
        // Supprimer aussi la miniature si elle existe
        $thumbPath = str_replace('produits/', 'produits/thumbs/', $path);
        if (Storage::disk('public')->exists($thumbPath)) {
            Storage::disk('public')->delete($thumbPath);
        }
    }
}