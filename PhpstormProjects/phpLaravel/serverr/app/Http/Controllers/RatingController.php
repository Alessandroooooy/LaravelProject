<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {
        // Метод для отображения формы создания рейтинга
        return view('ratings.create');
    }

    public function store(Request $request)
    {
        // Метод для сохранения нового рейтинга
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
        // Метод для отображения формы редактирования рейтинга
        return view('ratings.edit', compact('rating'));
    }

    public function update(Request $request, Rating $rating)
    {
        // Метод для обновления рейтинга
        $validatedData = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
        ]);

        $rating->update($validatedData);

        return redirect()->route('products.show', ['product' => $rating->product_id])
            ->with('success', 'Рейтинг успешно обновлен.');
    }

    public function destroy(Rating $rating)
    {
        // Метод для удаления рейтинга
        $product_id = $rating->product_id;
        $rating->delete();

        return redirect()->route('products.show', ['product' => $product_id])
            ->with('success', 'Рейтинг успешно удален.');
    }
}

