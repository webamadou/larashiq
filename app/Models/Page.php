<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasFactory;
    use HasSlug;
    use LogsActivity;

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return mixed
     */
    public function getDefaultImage($size = 'large'): mixed
    {
        if (! $this->image) {
            return Image::DEFAULT_IMAGE;
        }
        if (! $defaultImage = $this->image) {
            return $this->image->$size;
        }

        return $this->image->$size;
    }

    public function deletePageImage()
    {
        if ($this->image) {
            try {
                $imageFile = $this->image->url;
                // We make sure to delete the file from the server
                if (\File::exists(public_path($this->getDefaultImage()))) {
                    \File::delete(public_path($this->getDefaultImage('large')));
                    \File::delete(public_path($this->getDefaultImage('thumbnail')));
                    \File::delete(public_path($this->getDefaultImage()));
                }

                $this->image->delete();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
        // If we have no image, we still return true
        return true;
    }
}
