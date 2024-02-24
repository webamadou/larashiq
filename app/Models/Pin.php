<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class Pin extends Model
{
    use HasFactory;
    // we use Dakar coordinate as default
    public const LAT = 14.699267667713848;
    public const LONG = -17.460913760422475;

    protected $guarded = [];

    public function pinnable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
