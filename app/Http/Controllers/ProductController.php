<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with('categoryProduct');

    // Cek apakah ada filter category_id di query string
    if ($request->has('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    return response()->json($query->get());
}

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:category_products,id',
            'name' => 'required|string',
            'provider' => 'required|string',
            'price' => 'required|integer'
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::with('categoryProduct')->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'provider', 'price', 'category_id']));
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
