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
        if (!Auth::check()) {
            return false;
        }

        $payment = new Payment(array_merge($request->post(), ['user_id' => Auth::id()]));
        
        return $payment->save();
    }
}
