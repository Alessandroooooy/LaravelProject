<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rating;
use App\Models\Product;
use App\Models\User;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5), // Генерируйте рейтинг от 1 до 5 (вы можете настроить как вам нужно).
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
        ];
    }
}

