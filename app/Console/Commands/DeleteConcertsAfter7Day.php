<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteConcertsAfter7Day extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'concerts:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired concerts that are older than 7 days.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sevenDaysAgo = \Carbon\Carbon::now()->subDays(7);

        \App\Models\Konser::onlyTrashed()->where('deleted_at', '<=', $sevenDaysAgo)->forceDelete();

        $this->info('Expired concerts older than 7 days have been deleted.');
    }

}
