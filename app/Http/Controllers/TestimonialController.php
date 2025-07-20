<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        return response()->json(Testimonial::latest()->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'message' => 'required|string',
        ]);

        $testimonial = Testimonial::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Testimoni berhasil disimpan',
            'data' => $testimonial
        ], 201);
    }
}
