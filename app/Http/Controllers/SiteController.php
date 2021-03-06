<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'currency' => 'string|max:255',
        ]);

        $products = Product::all();
        $currency = $request->get('currency', 'kzt');
        $rate = Currency::getRate($currency);

        return view('welcome', compact('products', 'currency', 'rate'));
    }

    public function payments()
    {
        $payments = Payment::where('user_id', auth()->id())->get();

        return view('payments', compact('payments'));
    }
}
