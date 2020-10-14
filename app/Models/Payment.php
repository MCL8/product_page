<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'currency', 'amount'];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
