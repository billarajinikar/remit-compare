<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function commands(): void
    {
        //$this->load(__DIR__.'/Commands');

        //require base_path('routes/console.php');
        [commands\FetchAndProcessMonitoRates::class];
    }
    protected function schedule(Schedule $schedule): void
    {
        // Example: schedule Monito fetch command
        //$schedule->command('monito:refresh-rates')->cron(expression: '0 */5 * * *');
        $schedule->command('monito:refresh-rates')->everyTenMinutes();
    }


}
