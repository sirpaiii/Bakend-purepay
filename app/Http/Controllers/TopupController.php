<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topup;
use App\Models\Person;
use Illuminate\Support\Facades\Http;

class TopupController extends Controller
{
     // Request top up
    public function requestTopup(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:people,id',
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string'
        ]);

        // Buat record topup dulu dengan status pending
        $topup = Topup::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'status' => 'pending'
        ]);

        // Kirim ke API Duitku eksternal
        $response = Http::post('http://localhost:8000/public/index.php?action=request_transaction', [
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'merchantOrderId' => 'TOPUP-' . $topup->id
        ]);

        return response()->json([
            'message' => 'Top up request berhasil dibuat',
            'topup' => $topup,
            'payment' => json_decode($response->body(), true)
        ]);
    }

    // Callback dari Duitku
    public function handleCallback(Request $request)
    {
        $data = $request->all();

        if ($data['statusCode'] === '00') {
            // Ambil ID topup dari merchantOrderId
            $id = str_replace('TOPUP-', '', $data['merchantOrderId']);
            $topup = Topup::find($id);

            if ($topup && $topup->status !== 'completed') {
                // Update saldo user
                $user = Person::find($topup->user_id);
                $user->saldo += $topup->amount;
                $user->save();

                // Update status topup
                $topup->update([
                    'status' => 'completed',
                    'paid_at' => now(),
                    'payment_reference' => $data['reference']
                ]);
            }
        }

        return response()->json(['message' => 'Callback diterima'], 200);
    }

    // Lihat riwayat topup user
    public function history($user_id)
    {
        $topups = Topup::where('user_id', $user_id)->latest()->get();
        return response()->json($topups);
    }
}
