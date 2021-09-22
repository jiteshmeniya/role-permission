<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         $stations =[
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
        ];

        return [

            'asal' => $this->faker->randomElements($stations),
            'tujuan' => $this->faker->randomElements($stations),
            // 'jarak' => $this->faker->numberBetween(20,150),
            'tarif' => $this->faker->numberBetween(20000000,12000000),

        ];
    }
}
