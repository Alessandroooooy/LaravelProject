<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = new Cart();
        $cartItems = $cart->content();

        return view('cart.index', compact('cartItems'));
    }

    public function showAddForm()
    {

        $products = Product::all();

        return view('cart.add', compact('products'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $quantity = $request->input('quantity');

        $cart = new Cart();
        $cart->add($productId, $productName, $quantity, $productPrice);
        session()->flash('success', 'Товар добавлен в корзину.');

        return redirect()->route('cart.index');

    }


}




