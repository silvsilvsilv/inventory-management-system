<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Logs extends Model
{
    protected $table = "stock_adjustments";
    protected $fillable = [
        'user_id',
        'product_id',
        'stock_added',
        'type'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function products()
    {
        return $this->belongsTo(Products::class,'product_id');
    }

}
