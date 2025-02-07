<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
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

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
{
    // Programa la ejecución diaria del comando a las 7:00 AM
    $schedule->command('actualizar:datos-aapl')->dailyAt('20:39');
}

protected function schedule(Schedule $schedule)
{
    $schedule->command('images:clean-unused')->daily();
}

protected function schedule(Schedule $schedule)
{
    $schedule->command('images:optimize')->weekly();
}


}
