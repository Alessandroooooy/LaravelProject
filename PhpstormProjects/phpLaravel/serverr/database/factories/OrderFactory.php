<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'total_price' => $this->faker->randomFloat(2, 10, 500),
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $products = Product::factory(rand(1, 5))->create();

            foreach ($products as $product) {
                $order->products()->attach($product, ['quantity' => rand(1, 3)]);
            }
        });
    }
}

