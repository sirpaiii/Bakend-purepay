<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Person;

class PeopleController extends Controller
{
    public function show($id)
    {
        $person = Person::find($id);

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
}
