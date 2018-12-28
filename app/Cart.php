<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->hasOne(Order::class);
    }
    public function product() {
        return $this->hasOne(Product::class);
    }
}
