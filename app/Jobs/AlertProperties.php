<?php

namespace App\Jobs;

use App\Models\Alert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class AlertProperties implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public readonly Collection $properties, public readonly Alert $alert)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->alert->user;
        if ($user) {
            // First we send the notification email to the user
            Mail::to($user->email)
                ->send(new \App\Mail\AlertProperties($this->properties, $this->alert));
            $this->alert->update(['last_sent' => now(), 'nbr_sent' => $this->alert->nbr_sent + 1]);

            // TODO: Now we need to notify the super publishers & admins
        }
    }
}
