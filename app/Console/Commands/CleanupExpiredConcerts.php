<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Konser;

class CleanupExpiredConcerts extends Command
{
    protected $signature = 'concerts:cleanup';

    protected $description = 'Delete expired concerts';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        // Hapus Konser yang telah kedaluwarsa (tanggal_konser < tanggal saat ini)
        Konser::where('tanggal_konser', '<=', $now)->delete();

        $this->info('Expired concerts have been deleted.');
    }
}