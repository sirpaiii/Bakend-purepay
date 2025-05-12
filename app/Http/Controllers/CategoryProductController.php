<?php

namespace App\Http\Controllers;
use App\Models\CategoryProduct;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
     public function index()
    {
        return response()->json(CategoryProduct::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);
        $category = CategoryProduct::create(['name' => $request->name]);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = CategoryProduct::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->update(['name' => $request->name]);
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
