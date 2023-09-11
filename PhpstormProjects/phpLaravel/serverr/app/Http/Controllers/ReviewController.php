<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(Product $product)
    {
        $reviews = $product->reviews; // предположим, что у товара есть отношение к отзывам

        return view('reviews.index', compact('product', 'reviews'));
    }

    public function create()
    {
        // Метод для отображения формы создания отзыва
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        // Метод для сохранения нового отзыва
        $validatedData = $request->validate([
            'text' => 'required',
            'product_id' => 'required',
        ]);

        $review = Review::create($validatedData);

        return redirect()->route('products.show', ['product' => $review->product_id])
            ->with('success', 'Отзыв успешно создан.');
    }

    public function edit(Review $review)
    {
        // Метод для отображения формы редактирования отзыва
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        // Метод для обновления отзыва
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        $review->update($validatedData);

        return redirect()->route('products.show', ['product' => $review->product_id])
            ->with('success', 'Отзыв успешно обновлен.');
    }

    public function destroy(Review $review)
    {
        // Метод для удаления отзыва
        $product_id = $review->product_id;
        $review->delete();

        return redirect()->route('products.show', ['product' => $product_id])
            ->with('success', 'Отзыв успешно удален.');
    }
}
