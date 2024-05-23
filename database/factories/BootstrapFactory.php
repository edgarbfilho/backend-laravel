<?php

namespace Database\Factories;

use App\Models\Bootstrap;
use Illuminate\Database\Eloquent\Factories\Factory;

class BootstrapFactory extends Factory
{
    protected $model = Bootstrap::class;

    public function definition()
    {
        return [
            'campo1' => $this->faker->word,
            'campo2' => $this->faker->word,
        ];
    }
}
