<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'rating' =>$this->faker->numberBetween(1, 5),
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
