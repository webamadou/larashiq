<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\TestingCommands::class,
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        /*$schedule->command('php artisan optimize:clear')
            ->daily()
            ->name('clear_up')
            ->withoutOverlapping(20);*/

        // $schedule->command('mail:testing')->everyMinute();

        /** Scheduling commands to send email to users with corresponding alert */
        // daily alerts: run commands At 09:30 AM everyday
        /*$schedule->call(fn () => info('Called every minute'))
            ->cron('30 9 * * *')
            ->name('alert_daily')
            ->withoutOverlapping(5);*/

        // daily alerts: run commands At 09:30 AM, only on Tuesday
        $schedule->command('alert:send d')
            ->cron('30 9 * * 1-6')
            ->name('alert_daily')
            ->withoutOverlapping(5);

        // weekly alerts: run commands At 09:30 AM, only on Tuesday
        $schedule->command('alert:send w')
            ->cron('30 9 * * 2')
            ->name('alert_weekly')
            ->withoutOverlapping(5);

        // monthly alerts: run commands At 09:30 AM, on the first Tuesday of the month
        $schedule->command('alert:send m')
            ->cron('30 9 * * TUE#1')
            ->name('alert_monthly')
            ->withoutOverlapping(5);

        // We check if it is necessary to execute the call:kayloo command every minute
        $schedule->command('call:kayloo-status-check')
            ->everyMinute()
            ->withoutOverlapping(30);

        // Call api every day at midnight
        /*$schedule->command('call:kaylooAPI')
            // ->cron('00 00 * * *')
            ->cron('00 00 * * *')
            ->runInBackground()
            ->name('call_kayloo')
            ->withoutOverlapping(5);*/

        // Correct coordinates that are pointing to center Africa
        $schedule->command('db:seed --class=CorrectDakarCoodinatesSeeder')
            // ->cron('00 00 * * *')
            ->cron('00 00 * * *')
            ->runInBackground()
            ->name('correct_coordinates')
            ->withoutOverlapping(5);

        // Sitemap
        $schedule->command('sitemap:generate')
            ->runInBackground()
            ->cron('00 00 * * MON');
        // run backups
        $schedule->command('backup:clean')->daily()->at('01:00')->name('clear_up')->withoutOverlapping(5);
        $schedule->command('backup:run')->daily()->at('01:30')->name('clear_up')->withoutOverlapping(5);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected function bootstrappers()
    {
        return array_merge(
            [\Bugsnag\BugsnagLaravel\OomBootstrapper::class],
            parent::bootstrappers(),
        );
    }
}
