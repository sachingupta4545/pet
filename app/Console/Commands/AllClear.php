<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AllClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears config, route, cache, and view caches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing all caches...');

        // Clear config cache
        $this->call('config:clear');
        $this->info('Configuration cache cleared.');

        // Clear route cache
        $this->call('route:clear');
        $this->info('Route cache cleared.');

        // Clear application cache
        $this->call('cache:clear');
        $this->info('Application cache cleared.');

        // Clear view cache
        $this->call('view:clear');
        $this->info('View cache cleared.');

        $this->info('All caches cleared successfully.');
    }
}
