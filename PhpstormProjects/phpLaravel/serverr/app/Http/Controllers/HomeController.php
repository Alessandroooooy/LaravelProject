<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::orderBy('created_at', 'desc')->take(6)->get();

        return view('home', compact('products'));
    }

    public function home()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

}
