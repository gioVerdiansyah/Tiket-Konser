<?php

namespace Database\Seeders;
use App\Models\Kategori;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $sayah = [
            'Hip-Hop',
            'Ludruk',
            'CampurSari',
            'Rock',
            'Pop'
        ];

        for ($i = 1; $i <= 1; $i++) {
            Kategori::create([
                'nama_kategori' =>'Rock'
            ]);
        }
    }
}
