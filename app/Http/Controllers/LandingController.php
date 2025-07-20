<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Testimonial; // Jika ingin tampilkan testimoni

class LandingController extends Controller
{
   public function index()
{
    $products = Product::latest()->take(6)->get();
    $testimonials = Testimonial::latest()->take(10)->get();

    // Ambil produk per kategori
    $categories = [
        ['id' => 1, 'name' => 'Token Listrik'],
        ['id' => 2, 'name' => 'Pulsa'],
        ['id' => 3, 'name' => 'Data'],
        ['id' => 4, 'name' => 'Game'],
    ];

    $categoryProducts = [];
    foreach ($categories as $cat) {
        $categoryProducts[$cat['id']] = Product::where('category_id', $cat['id'])->get();
    }

    return view('landing', compact('products', 'testimonials', 'categories', 'categoryProducts'));
}
}
