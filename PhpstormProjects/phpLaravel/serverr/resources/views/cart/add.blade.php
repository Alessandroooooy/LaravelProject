@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Product to Cart</h1>

        <form method="POST" action="{{ route('cart.add') }}">
            @csrf

            <div class="form-group">
                <label for="product">Select Product:</label>
                <select name="product" id="product" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
            </div>

            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
@endsection
