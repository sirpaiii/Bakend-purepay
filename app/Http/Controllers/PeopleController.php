<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PeopleController extends Controller
{
    // Menampilkan data profil
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
            'data' => [
                'id' => $person->id,
                'name' => $person->name,
                'email' => $person->email,
                'phone' => $person->phone,
                'balance' => $person->balance ?: 0
            ]
        ], 200);
    }

    public function update(Request $request, $id)
{
    $person = Person::find($id);

    if (!$person) {
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    // Validasi semua field sebagai opsional (nullable)
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
    ]);

    // Hanya update field yang dikirim (non-null)
    $person->update(array_filter($validated));

    return response()->json([
        'success' => true,
        'message' => 'Profil berhasil diperbarui',
        'data' => $person
    ], 200);
}

    // Menghapus user
    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}