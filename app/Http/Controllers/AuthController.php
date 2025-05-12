<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerFirebase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firebase_uid' => 'required|unique:people,firebase_uid',
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'        => 'required|email|unique:people,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        $user = Person::create([
            'firebase_uid' => $request->firebase_uid,
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'User created successfully',
            'data'    => $user,
        ], 201);
    }

    public function loginFirebase(Request $request)
    {
        return response()->json(['message' => 'success'], 200)
    ->header('Access-Control-Allow-Origin', '*')
    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
    ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        $request->validate([
            'firebase_uid' => 'required|string',
        ]);

        $user = Person::where('firebase_uid', $request->firebase_uid)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json([
            'message' => 'Login successful',
            'user' => $user
        ]);
    }
}
