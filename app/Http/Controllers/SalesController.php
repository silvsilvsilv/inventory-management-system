<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function getAllSales()
    {
        $sales = Sales::query()->paginate(10);

        return view('admin.sales', compact('sales'));
    }
    
}
