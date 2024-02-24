<?php

namespace App\Models;

use App\Traits\Helpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    use Helpers;

    protected $guarded = [];

    /**
     * update the youtbe urls whensaving
     */

    public function homeVideoEmbedCode(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ?? '',
            set: fn (?string $value) => $this->rebuildYTEmbed($value),
        );
    }

    public function homeBlocOneVideo(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => $this->rebuildYTEmbed($value),
        );
    }
}
