<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph,
            'user_id' => User::factory(), // Создание комментария от пользователя
            'product_id' => Product::factory(), // Создание комментария для продукта
        ];
    }
}

