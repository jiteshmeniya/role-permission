<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Gambir',
            'Bandung',
            'Yogyakarta',
            'Surabaya',
            'Cirebon',
            'Tegal',
            'Pekalongan',
            'Semarang',
            'Purwokerto',
            'Solo',
            'Madiun',
            'Surabaya Turi',
            'Surabaya Gubeng',
            'Malang',
            'Jember',
            'Banyuwangi',
        ]);

        $genres->each(function($genre) {
            Station::create([
                'name' => $genre,
            ]);
        });
    }
}
