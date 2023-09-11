<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = $category->products; // Получение продуктов для данной категории
        return view('categories.show', compact('category', 'products'));
    }
}
