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
		$konsers = Konser::all();

		foreach ($konsers as $konser) {
			if (strpos($konser->tanggal_konser, ' to ') !== false) {
				$tanggalSelesai = Carbon::parse(explode(' to ', $konser->tanggal_konser)[1]);

				if ($tanggalSelesai->lte($now) && Carbon::parse($konser->waktu_selesai)->format('H:i:s') <= $now->format('H:i:s')) {
					$konser->delete();
				}
			} else {
				$tanggalKonser = Carbon::parse($konser->tanggal_konser);

				if ($tanggalKonser->lte($now) && Carbon::parse($konser->waktu_selesai)->format('H:i:s') <= $now->format('H:i:s')) {
					$konser->delete();
				}
			}
		}

		$this->info('Expired concerts have been deleted.');
	}


}