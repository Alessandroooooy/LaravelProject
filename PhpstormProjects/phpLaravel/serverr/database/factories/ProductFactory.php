<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Пример случайной цены от 10 до 1000
            'category_id' => Category::factory(), // Создание продукта с произвольной категорией
            'image' => 'your-image-filename.jpg', // Укажите имя файла изображения
        ];
    }
}
