<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;
    protected $table = 'sale_items';
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Get the sale that owns the sales item.
     */
    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }

    /**
     * Get the product that owns the sales item.
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
