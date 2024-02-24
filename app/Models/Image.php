<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Image extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];
    public const IMAGE_MAIN_FOLDER = 'images/properties/';
    public const IMAGE_MEDIUM_FOLDER = 'images/properties/mediums/';
    public const IMAGE_THUMBNAIL_FOLDER = 'images/properties/thumbnails/';
    public const DEFAULT_IMAGE = 'images/default-image.png';

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    /**
     *
     * @return bool
     */
    public function setDefaultImage()
    {
        $return = false;
        if ($property = $this->imageable) {
            $property->images->map(function ($img) {
                $img->is_default = $img->id == $this->id ? 1 : 0;
                $img->save();
            });

            $return = true;
        }

        return  $return;
    }

    public function getLargeAttribute()
    {
        return $this->url;
        /*return \File::exists(public_path($this->url))
            ? $this->url
            : self::DEFAULT_IMAGE;*/
    }

    public function getMediumAttribute()
    {
        return $mediumFile = str_replace(self::IMAGE_MAIN_FOLDER, self::IMAGE_MEDIUM_FOLDER, $this->url);
        /*return \File::exists($mediumFile)
            ? $mediumFile
            : self::DEFAULT_IMAGE;*/
    }

    public function getThumbnailAttribute()
    {
        return str_replace(self::IMAGE_MAIN_FOLDER, self::IMAGE_THUMBNAIL_FOLDER, $this->url);
        /*return \File::exists(public_path(self::IMAGE_THUMBNAIL_FOLDER.$this->url))
            ? self::IMAGE_THUMBNAIL_FOLDER.$this->url
            : self::DEFAULT_IMAGE;*/
    }

    /**
     * Will use this method to return the image for an announcement
     */
    public static function getURI($images = null)
    {
        $path = public_path('images/properties/'. $images);
        if ($images === null || !\File::exists($path)) {
            $path = public_path('images/default-image.png');
        }
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    /**
     * We need an event listner
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Some action to do when deleting an image profile
        static::deleting(function ($image) {
            // Extract the relatinve path from the URL
            $parsedURL = parse_url($image->url);
            // str_replace(Image::IMAGE_MAIN_FOLDER, Image::IMAGE_MEDIUM_FOLDER, $image->url);
            // We remove the leading '/' if any,
            $path = ltrim($parsedURL['path'], '/');
            // Target the image from the public disk
            $imagePath = public_path($path);

            // We need the path for the thumbnail and the medium size images
            $mediumImage = str_replace(Image::IMAGE_MAIN_FOLDER, Image::IMAGE_MEDIUM_FOLDER, $imagePath);
            $thumbImage = str_replace(Image::IMAGE_MAIN_FOLDER, Image::IMAGE_THUMBNAIL_FOLDER, $imagePath);

            // Now we can delete the corresponding image file if exist
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            if (file_exists($mediumImage)) {
                unlink($mediumImage);
            }

            if (file_exists($thumbImage)) {
                unlink($thumbImage);
            }
        });
    }
}
