<?php

namespace App\Handler;

use Illuminate\Support\Facades\Mail;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class WebhookJobHandler extends ProcessWebhookJob
{
    public function handle()
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to('paab26@gmail.com')->send(new \App\Mail\TestMail($details));
        dd("The Webhook is send mail now!!!");
    }
}
