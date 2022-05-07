<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Menu extends Model
{
    use HasFactory;
    use HasSlug;
    use HasRecursiveRelationships;

    protected $fillable = ['name', 'slug', 'parent_id', 'visible', 'roles', 'public', 'position'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function scopeIsVisible($query)
    {
        return $query->where('visible', 1);
    }
}
