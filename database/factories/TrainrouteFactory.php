<?php

namespace Database\Factories;

use App\Models\Trainroute;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainrouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainroute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'departure' => $this->faker->numberBetween(1,16),
            'arrival' => $this->faker->numberBetween(1,16),
            'distance' => $this->faker->numberBetween(45,200),
            'price' => $this->faker->numberBetween(25000000,100000000),
        ];
    }
}
