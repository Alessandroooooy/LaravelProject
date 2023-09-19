<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {

        return view('ratings.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'product_id' => 'required',
        ]);

        $rating = Rating::create($validatedData);

        return redirect()->route('products.show', ['product' => $rating->product_id])
            ->with('success', 'Рейтинг успешно создан.');
    }

    public function edit(Rating $rating)
    {

        return view('ratings.edit', compact('rating'));
    }

    public function update(Request $request, Rating $rating)
    {

        $validatedData = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
        ]);

        $rating->update($validatedData);

        return redirect()->route('products.show', ['product' => $rating->product_id])
            ->with('success', 'Рейтинг успешно обновлен.');
    }

    public function destroy(Rating $rating)
    {

        $product_id = $rating->product_id;
        $rating->delete();

        return redirect()->route('products.show', ['product' => $product_id])
            ->with('success', 'Рейтинг успешно удален.');
    }
}

