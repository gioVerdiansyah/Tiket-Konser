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
        $kategori = [
            ["nama_kategori" => "Pop",],
            ["nama_kategori" => "Rock",],
            ["nama_kategori" => "Jazz",],
            ["nama_kategori" => "Hip-Hop",],
            ["nama_kategori" => "R&B",],
            ["nama_kategori" => "Dangdut",],
            ["nama_kategori" => "Keroncong",],
            ["nama_kategori" => "Blues",],
            ["nama_kategori" => "EDM",],
            ["nama_kategori" => "Klasik",],
            ["nama_kategori" => "Reggae",],
            ["nama_kategori" => "Metal",],
        ];

        Kategori::insert($kategori);
    }
}