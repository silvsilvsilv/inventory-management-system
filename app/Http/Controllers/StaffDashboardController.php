<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class StaffDashboardController extends Controller
{
    public function dashboardFilter(Request $request)
    {
        $categories = Categories::all();

        $inventoryQuery = Products::query();
        
        $categoryToFind = Categories::where('name', $request->category)->first();

        if ($request->filled('category')) {
            $inventoryQuery->where('category_id', $categoryToFind->id);
        }
        if ($request->filled('filter')) {
            $inventoryQuery->where('name', 'like', '%' . $request->filter . '%');
        }

        $inventory = $inventoryQuery->get();

        return view('manager.staffdash', compact('categories', 'inventory'));
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $product_id = (int) $request->product_id;
        $product = Products::findOrFail($product_id);
        $product->stock = $request->quantity;
        $product->save();

        return redirect()->back()->with('success', 'Product quantity updated successfully.');
    }

    public function managerDashboard()
    {
        $categories = Categories::all();
        $products = Products::all();

        return view('manager.managerdash',compact('categories','products'));
    }
}
