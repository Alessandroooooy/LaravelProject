<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Product::factory(20)->create();
        Category::factory(5)->create();
        Comment::factory(10)->create();
        Order::factory(10)->create();
        Review::factory(10)->create();
        Rating::factory()->count(50)->create();
    }
}

