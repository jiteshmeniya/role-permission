<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Rate;
use App\Models\Snack;
use App\Models\Trainroute;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Employee::factory(20)->create();
        // Rate::factory(100)->create();
        // Snack::factory(20)->create();
        // Trainroute::factory(50)->create();
        // User::factory(10)->create();
        $this->call([
        //     StationSeeder::class
        //     // PermissionTableSeeder::class,
        //     // RoleTableSeeder::class,
            PositionSeeder::class,
        ]);
    }
}
