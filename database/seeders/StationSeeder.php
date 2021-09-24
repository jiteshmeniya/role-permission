<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = collect([
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

        $stations->each(function($station) {
            Station::create([
                'station_name' => $station,
            ]);
        });
    }
}
