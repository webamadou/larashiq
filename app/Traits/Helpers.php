<?php

namespace App\Traits;

trait Helpers
{
    public $YTwidth = 560;
    public $YTheight = 315;
    public $YTtitle = "YouTube video player";
    public $YTallow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share";
    public function rebuildYTEmbed(?string $YTEmbed)
    {
        if (empty($YTEmbed)) {
            return '';
        }
        $src = $this->buildYTEmbedSrcAttribute($YTEmbed, ['controls=0', 'rel=0', 'hd=1']);

        return '<iframe width="'.$this->YTwidth.'" height="'.$this->YTheight.'" src="'.$src.'" title="'
            .$this->YTtitle.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    }

    public function setAttributes(array $embedCodeArray): void
    {
        $width = explode('=', $this->getStringStartWithInArray('width', $embedCodeArray));
        $height = explode('=', $this->getStringStartWithInArray('height', $embedCodeArray));

        $this->YTwidth = isset($width[1]) ? intval(str_replace('"', '', $width[1])) : $this->YTwidth;
        $this->YTheight = isset($height[1]) ? intval(str_replace('"', '', $height[1])) : $this->YTheight;
    }

    public function buildYTEmbedSrcAttribute(string $embedCode, array $newAttrWithValue)
    {
        $explodeCode = explode(' ', $embedCode);
        $this->setAttributes($explodeCode);

        $src = $this->getStringStartWithInArray('src', $explodeCode);
        if (! $src) {
            return $explodeCode;
        }

        $urls = explode('=', $src);

        if ($urls[1]) {
            $urlString = explode('?', str_replace('"', '', $urls[1]));
            foreach ($newAttrWithValue as $attr) {
                $urlString[0] = $this->addAttributeToUrl($urlString[0], $attr);
            }
            return $urlString[0];
        }

        return $embedCode;
    }

    public function getStringStartWithInArray(string $needle, array $haystack)
    {
        return collect($haystack)->where(fn ($value) => str_starts_with($value, $needle))->values()[0] ?? null;
    }

    public function addAttributeToUrl(string $urlString, string $stringToAdd): string
    {
        $urlString = str_replace('"', '', $urlString);
        if (! str_contains($urlString, $stringToAdd)) {
            return (str_contains($urlString, '?')) ?  "$urlString&$stringToAdd" : "$urlString?$stringToAdd";
        }

        return $urlString;
    }
}
