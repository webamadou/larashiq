<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use Illuminate\Console\Command;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;

class TestingCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::raw('This is a test email', function ($message) {
            $message->to('paab26@live.fr');
            $message->subject('Test Email');
        });

        $this->info('Test email sent successfully');
    }
}
