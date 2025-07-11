<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\JobController;

class FetchAndProcessMonitoRates extends Command
{
    protected $signature = 'monito:refresh-rates';
    protected $description = 'Fetch Monito rates and process them into remittance_rates table';

    public function handle()
    {
        $jobController = new JobController();

        $this->info('Fetching raw Monito data...');
        $jobController->storeRatesFromMonito();

        $this->info('Processing raw data into remittance_rates...');
        $jobController->processMonitoRawToRates();

        $this->info('Done!');
    }
}
