<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function getAllCategories(Request $request)
    {
        $query = Categories::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
    
        $categories = $query->paginate(10)->appends(['search' => $request->search]);
    
        return view('admin.categories', compact('categories'));
    }

    public function editCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|string|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000'
        ]);

        $id = (int) $request->id;
        $category = Categories::findOrFail($id);

        if (!$category) {
            return redirect()->route('admin.categories')->withErrors(['Category not found.']);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $category = Categories::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Logs::create([
            'category_id'=>$category->id,
            'user_id'=> Auth::user()->id,
            'type'=>'create',
            'created_at'=>Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);


        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }
    public function deleteCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|string|exists:categories,id',
        ]);

        $id = (int) $request->id;
        $category = Categories::findOrFail($id);
        $category->update(['deleted_at' => Carbon::now()]);

        Logs::create([
            'category_id'=>$id,
            'user_id'=> Auth::user()->id,
            'type'=>'delete',
            'created_at'=>Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
