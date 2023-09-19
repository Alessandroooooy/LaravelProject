<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Product $product)
    {
        $comments = $product->comments;
        return view('comments.index', compact('product', 'comments'));
    }

    public function create(Product $product)
    {
        return view('comments.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {

    }
}
