<?php

namespace Database\Factories;

use App\Models\Appeal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appeal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'text' => $this->faker->text,
            'client_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'in_work' => $this->faker->boolean
        ];
    }
}
