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
            'Denny Caknan',
            'Scorpions',
            'Guns and Roses'
        ];

        $sayah = [
            '12000',
            '15000',
            '19999'
        ];

        $img = [
            'gnr.jpg',
            'scorpions.jpg',
            'denny.jpg'
        ];

        sort($sayah);
        sort($img);
        sort($arry);


        for ($i = 0; $i < 3; $i++) {
            Konser::create([

                'foto_tiket' => $img[$i],
                'nama' => $arry[$i],
                'harga' => $sayah[$i],
                'kategori_id' => 1,
                'kota_id' => 1,

            ]);
        }

    }
}
