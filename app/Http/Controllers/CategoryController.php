<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('category/addCategory', ['categories' => $categories]);}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean'
        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->is_active = 1;
        $category->save();
    }

    public function allCategories()
    {
        $categories = Category::all();
        return view('category/categories', ['categories' => $categories]);
    }
}
