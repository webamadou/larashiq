<?php

namespace App\Mail\admins;

use App\Models\Commodity;
use App\Models\Estimation;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EstimationRequested extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(readonly public Estimation $estimation)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $commodities    = Commodity::pluck('name', 'id')->all();
        $conditions     = Property::getGeneralConditions();
        $heatingSystems = Property::getHeatingSystems();
        $kitchenTypes   = Property::getKitchenTypes();

        return $this
            ->subject(__('estimations.new_estimation_requested'))
            ->view('emails.admins.estimation_request')
            ->with('commodities', $commodities)
            ->with('heatingSystems', $heatingSystems)
            ->with('kitchenTypes', $kitchenTypes)
            ->with('conditions', $conditions);
    }
}
