<?php

namespace Database\Seeders;

use App\Models\Konser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arry = [
            'public/img/gnr.jpg',
            'kaka',
            'jj'
        ];

        for ($i=1; $i <= 2; $i++) {
            Konser::create([
                'foto_tiket' => 'img/gnr.jpg',
                'nama' => fake('id_ID')->randomElement($arry),
                'harga' => '12000'
            ]);
        }
    }
}
