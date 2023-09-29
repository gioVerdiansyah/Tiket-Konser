<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order; // Impor model yang relevan

class DeleteOldRecords extends Command
{
    protected $signature = 'delete:old_records';

    protected $description = 'Hapus data dari 5 menit';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $limaMenitLalu = now()->subMinutes(10);

        Order::where('created_at', '<', $limaMenitLalu)->delete();

        $this->info('Data lama berhasil dihapus.');
    }
}
