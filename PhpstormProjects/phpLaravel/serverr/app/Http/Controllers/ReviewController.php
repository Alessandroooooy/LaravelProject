<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(Product $product)
    {
        $reviews = $product->reviews;

        return view('reviews.index', compact('product', 'reviews'));
    }

    public function create()
    {

        return view('reviews.create');
    }

    public function store(Request $request)
    {

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

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {

        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        $review->update($validatedData);

        return redirect()->route('products.show', ['product' => $review->product_id])
            ->with('success', 'Отзыв успешно обновлен.');
    }

    public function destroy(Review $review)
    {

        $product_id = $review->product_id;
        $review->delete();

        return redirect()->route('products.show', ['product' => $product_id])
            ->with('success', 'Отзыв успешно удален.');
    }
}
