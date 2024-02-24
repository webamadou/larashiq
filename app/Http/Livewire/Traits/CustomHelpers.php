<?php

namespace App\Http\Livewire\Traits;

trait CustomHelpers
{

    public function moneyFormat(float|int $price, string $local = 'fr_FR', string $currency = 'XOF'): string
    {
        $fmt = numfmt_create($local, \NumberFormatter::CURRENCY);

        return numfmt_format_currency($fmt, intval($price), $currency);
    }
}
