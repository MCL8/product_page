<?php

namespace App\Models;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getPrice($rate)
    {
        if ($rate == 1) {
            return $this->price;
        }
        return (int)($this->price / $rate);
    }

    public function formattedPrice($currency, $rate)
    {
        if (isset(Currency::CURRENCY_SYMBOLS[$currency])) {
            $currencySymbol = Currency::CURRENCY_SYMBOLS[$currency];
        } else {
            $currencySymbol = '';
        }

        return number_format($this->getPrice($rate), 0, '.', ' ') . ' ' . $currencySymbol;
    }

    public function isPaid($userId)
    {
        return Payment::where([['product_id', '=', $this->id], ['user_id', '=', $userId]])->first();
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'product_id', 'id');
    }
}
