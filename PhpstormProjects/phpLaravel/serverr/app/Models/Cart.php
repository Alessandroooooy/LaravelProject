<?php

namespace App\Models;

class Cart
{
    protected $items = [];

    public function add($productId, $productName, $quantity, $productPrice)
    {

        $key = md5($productId);


        if (array_key_exists($key, $this->items)) {

            $this->items[$key]['quantity'] += $quantity;
        } else {

            $this->items[$key] = [
                'product_id' => $productId,
                'product_name' => $productName,
                'quantity' => $quantity,
                'product_price' => $productPrice,
            ];
        }
    }

    public function content()
    {
        return $this->items;
    }

}

