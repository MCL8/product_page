<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'currency' => 'required|string|max:255',
            'amount' => 'required|numeric'
        ]);

        $payment = new Payment();
        $payment->user_id = auth()->id();
        $payment->product_id = $request->product_id;
        $payment->currency = $request->currency;
        $payment->amount = $request->amount;

        return $payment->save();
    }
}
