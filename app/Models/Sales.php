<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalesItem;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'customer_name',
        'total_amount',
        'created_by'
    ];

    /**
     * Get the product that owns the sale.
     */
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    /**
     * 
     * Get the user that is associated with the sale.
     */ 
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    } 
    
}
