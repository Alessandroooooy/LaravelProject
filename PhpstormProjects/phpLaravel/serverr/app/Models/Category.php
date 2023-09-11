<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    public $products;
    protected $fillable = [
        'name',
    ];

    // Пример связи с товарами
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

