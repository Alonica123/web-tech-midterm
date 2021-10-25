<?php

namespace Database\Factories;

use App\Models\BoholInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoholInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BoholInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barangay' => $this->faker->word,
        'town' => $this->faker->word,
        'province' => $this->faker->word,
        'code' => $this->faker->word,
        'population' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
