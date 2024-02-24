<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Localisation extends Model
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

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
    public function alerts(): BelongsToMany
    {
        return $this->belongsToMany(Alert::class);
    }

    public static function getLocalisationByName($name)
    {
        $name = ltrim($name);
        /*if ($localisation = self::where('name', 'LIKE', "%$name%")->first()) {*/
        if ($localisation = self::where('name', $name)->first()) {
            return $localisation;
        }

        return self::where('name', 'LIKE', "%$name%")->first();
    }
}
