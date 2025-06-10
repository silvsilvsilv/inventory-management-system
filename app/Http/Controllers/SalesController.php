<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function getAllSalesAdmin()
    {
        $sales = Sales::query()->paginate(10);

        return view('admin.sales', compact('sales'));
    }
    
    public function getAllSalesManager()
    {
        $sales = Sales::query()->paginate(10);

        return view('manager.sales', compact('sales'));
    }
}
