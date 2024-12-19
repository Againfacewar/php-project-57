<?php

namespace Database\Factories;

use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LabelFactory extends Factory
{
    protected $model = Label::class;

    public function definition(): array
    {
        return [
            'name' => Str::limit($this->faker->word, 13),
            'description' => Str::limit($this->faker->sentence, 97),
        ];
    }
}
