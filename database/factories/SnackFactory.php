<?php

namespace Database\Factories;

use App\Models\Snack;
use Illuminate\Database\Eloquent\Factories\Factory;
class SnackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Snack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $snacks = [
            'Rebusan',
            'Kacang Telur',
            'Keripik',
            'Ketan Bumbu',
            'Tahu Gejrot',
            'Es Brasil',
            'Kue Numpia',
            'Bakpia Basah',
            'Bakpia Kukus',
            'Bakso Pak No',
            'Bakso Malang',
        ];
        return [
            'snack_name' => $this->faker->randomElement($snacks),
            'uuid' => $this->faker->uuid(),
            'price' => $this->faker->numberBetween(1000,90000),
        ];
    }
}
