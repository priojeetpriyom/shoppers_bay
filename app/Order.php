<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded;

    public function __construct()
    {


    }

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
