<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['rating', 'user_id', 'product_id'];

    // Отношение к пользователю, который оставил рейтинг
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Отношение к товару, к которому привязан рейтинг
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Метод для вычисления среднего рейтинга товара
    public static function averageRatingForProduct($productId)
    {
        return Rating::where('product_id', $productId)->avg('rating');
    }
}
