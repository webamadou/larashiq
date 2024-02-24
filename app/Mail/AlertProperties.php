<?php

namespace App\Mail;

use App\Models\Alert;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class AlertProperties extends Mailable
{
    use Queueable, SerializesModels;

    public $property;
    public $similarProps;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public readonly Collection $properties, public readonly Alert $alert)
    {
        $this->property = $properties->random();
        $this->similarProps = $properties->where('id', '!=', $this->property->id)->take(3);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(__('alerts.matching_propertie_subject'))
            ->markdown('emails.alert_properties');
    }
}
