<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Получите список товаров, которые вы хотите отобразить на главной странице
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();

        // Здесь вы можете добавить любую другую бизнес-логику для вашего интернет-магазина

        return view('home', ['products' => $products]);
    }
}

