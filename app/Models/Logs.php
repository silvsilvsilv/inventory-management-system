<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Logs extends Model
{
    use HasFactory;
    protected $table = "logs";
    protected $fillable = [
        'user_id',
        'product_id',
        'category_id',
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
    public function categories()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

}
