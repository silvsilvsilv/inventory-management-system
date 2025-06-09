<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getAllProducts(Request $request)
    {
        $query = Products::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
    
        $products = $query->paginate(10)->appends(['search' => $request->search]);
        $categories = Categories::all();
    
        return view('admin.products', compact('products','categories'));
    }

    public function deleteProduct(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
        ]);

        $id = (int) $request->id;
        $product = Products::findOrFail($id);

        if (!$product) {
            return redirect()->route('admin.products')->withErrors(['Product not found.']);
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

    public function createProduct(Request $request)
    {   
       
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'required|string|exists:categories,id',
        ]);

        $category_id = (int) $request->category_id;

        Products::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'category_id' => $category_id,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function editProduct(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',
            'stock' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|string|exists:categories,id',
        ]);

        $id = (int) $request->id;
        $category_id = (int) $request->category_id;
        $product = Products::findOrFail($id);

        if (!$product) {
            return redirect()->route('admin.products')->withErrors(['Product not found.']);
        }

        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'category_id' => $category_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }
}
