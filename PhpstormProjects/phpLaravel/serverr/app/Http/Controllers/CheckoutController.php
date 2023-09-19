<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        return view('checkout.index');
    }

    public function confirm(Request $request)
    {

        return redirect()->route('order.thank-you');
    }
}
