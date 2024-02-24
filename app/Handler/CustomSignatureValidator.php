<?php

namespace App\Handler;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;

class CustomSignatureValidator implements \Spatie\WebhookClient\SignatureValidator\SignatureValidator
{

    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return true;
    }
}
