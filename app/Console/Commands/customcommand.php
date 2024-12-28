<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


class customcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customcommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $this->info('Clearing caches...');
    
        // Execute each command one by one
        Artisan::call('view:clear');
        $this->info('View cache cleared.');
    
        Artisan::call('config:clear');
        $this->info('Config cache cleared.');
    
        Artisan::call('cache:clear');
        $this->info('Application cache cleared.');
    
        $this->info('All caches cleared successfully!');
    }
    
}
