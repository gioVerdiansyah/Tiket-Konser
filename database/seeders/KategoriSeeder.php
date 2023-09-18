<?php

namespace Database\Seeders;
use app\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fake('id_ID')->randomElement()
        $sayah = [
            'Hip-Hop',
            'Ludruk',
            'CampurSari',
            'Rock',
            'Pop'
        ];
        for ($i=1;  $i++;) {
            Kategori::create([
                'nama_kategori'=>fake()->call($sayah)
            ]);
        }
    }
}
