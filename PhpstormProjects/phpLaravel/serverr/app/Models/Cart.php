<?php

namespace App\Models;


use Illuminate\Support\Collection;

class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function add($productId, $productName, $quantity, $productPrice)
    {
        $item = [
            'id' => $productId,
            'name' => $productName,
            'qty' => $quantity,
            'price' => $productPrice,
            'options' => [],
        ];

        $this->items->push($item);
    }

    public function content()
    {
        return $this->items;
    }

    public function destroy()
    {
        $this->items = collect([]);
    }

    // Другие методы для работы с корзиной, если необходимо
}

