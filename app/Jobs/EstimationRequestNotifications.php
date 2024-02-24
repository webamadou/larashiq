<?php

namespace App\Jobs;

use App\Mail\admins\EstimationRequested;
use App\Mail\EstimationNotifications;
use App\Models\Estimation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EstimationRequestNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Estimation $estimation)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->estimation->user;
        if ($user) {
            // First we send the notification email to the user
            Mail::to($user->email)->send(new EstimationNotifications($this->estimation));

            // Now we need to notify the admins
            User::whereHas("roles", fn ($q) => $q
                ->where('name', Role::SUPER_PUBLISHER)
                ->orWhere('name', Role::ADMIN)
                ->orWhere('name', Role::SUPER_ADMIN))->get()
                ->each(
                    fn ($sp) => Mail::to($sp->email)->send(new EstimationRequested($this->estimation))
                );
        }
    }
}
