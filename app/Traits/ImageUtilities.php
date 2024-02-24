<?php

namespace App\Traits;

use App\Models\Image;

trait ImageUtilities
{

    public function manageGivenImage($imageToManaged, string $filename)
    {
        return
            match (self::imageOrientation($imageToManaged)) {
                1 => self::landscapeResizing($imageToManaged, $filename),
                2 => self::portraitResizing($imageToManaged, $filename),
                default => self::squareResizing($imageToManaged, $filename),
            };
    }

    /**
     * This will help detect the orientation of an image base on its size
     * @param $file
     * @return int 1 = landscape; 2 = portrait; 0 = square
     */
    private static function imageOrientation($file): int
    {
        return $file?->width() > $file?->height() ? 1 : ($file?->width() < $file?->height() ? 2 : 0);
    }

    /**
     * Resize image with landscape orientation
     *
     * @param $file
     * @param $filename
     * @return void
     */
    private static function landscapeResizing($file, $filename): void
    {
        $file->resize(1024, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_MAIN_FOLDER) . $filename);

        $file->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_MEDIUM_FOLDER) . $filename);

        $file->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_THUMBNAIL_FOLDER) . $filename);
    }

    /**
     * Resize image with portrait orientation
     *
     * @param $file
     * @param $filename
     * @return void
     */
    private static function portraitResizing($file, $filename): void
    {
        $file->resize(null, 1024, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_MAIN_FOLDER) . $filename);

        $file->resize(null, 500, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_MEDIUM_FOLDER) . $filename);

        $file->resize(null, 150, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_THUMBNAIL_FOLDER) . $filename);
    }

    /**
     * Resize image squared up images
     *
     * @param $file
     * @param $filename
     * @return void
     */
    private static function squareResizing($file, $filename): void
    {
        $file->resize(1024, 1024, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_MAIN_FOLDER) . $filename);

        $file->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_MEDIUM_FOLDER) . $filename);

        $file->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->save(public_path(Image::IMAGE_THUMBNAIL_FOLDER) . $filename);
    }

    private static function imageResizing($file, $filename): void
    {
        if ($file->width() > $file->height()) {
            self::landscapeResizing($file, $filename);
        } elseif ($file->width() < $file->height()) {
            self::portraitResizing($file, $filename);
        } else {
            self::squareResizing($file, $filename);
        }
    }
}
