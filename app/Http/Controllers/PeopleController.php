<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Person;

class PeopleController extends Controller
{
     public function show($id)
    {
        $person = Person::with('balance')->find($id);

        if (!$person) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $person
        ], 200);
    }


     public function update(Request $request, $id)
    {
        $product = Person::findOrFail($id);
        $product->update($request->only(['name', 'phone', 'email']));
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Person::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }

  
}
