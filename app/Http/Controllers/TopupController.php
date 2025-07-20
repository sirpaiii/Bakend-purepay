<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topup;
use App\Models\Person;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TopupController extends Controller
{
    // Request top up
    public function requestTopup(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:people,id',
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string'
        ]);

        // Buat merchant_order_id unik
       // Gunakan ID numerik yang konsisten dan sederhana
$merchantOrderId = (string) now()->timestamp; // 10 digit aman

$topup = Topup::create([
    'user_id' => $request->user_id,
    'amount' => $request->amount,
    'status' => 'pending',
    'merchant_order_id' => $merchantOrderId
]);



        // Kirim request ke Duitku
        try {
            $response = Http::post('http://localhost:8001/public/index.php?action=request_transaction', [
                'user_id' => $validated['user_id'],
                'amount' => $validated['amount'],
                'merchantOrderId' => $merchantOrderId
            ]);

            return response()->json([
                'message' => 'Top up request berhasil dibuat',
                'topup' => $topup,
                'payment' => $response->json()
            ]);

        } catch (\Exception $e) {
            Log::error('Gagal request ke Duitku', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal request transaksi.'], 500);
        }
    }

    // Callback dari Duitku
   public function handleCallback(Request $request)
{
    $data = $request->all();
    Log::info('Callback Duitku:', $data);

    if (isset($data['resultCode']) && $data['resultCode'] === '00') {
        $topup = Topup::where('merchant_order_id', $data['merchantOrderId'])->first();

        if ($topup && $topup->status !== 'completed') {
            $user = Person::find($topup->user_id);

            if ($user) {
                // Ambil atau buat balance
                $balance = $user->balance;

                if ($balance) {
                    $balance->saldo += $topup->amount;
                    $balance->save();
                } else {
                    \App\Models\Balance::create([
                        'person_id' => $user->id,
                        'saldo' => $topup->amount
                    ]);
                }

                $topup->update([
                    'status' => 'completed',
                    'paid_at' => now(),
                    'payment_reference' => $data['reference'] ?? null
                ]);
            } else {
                Log::error('User tidak ditemukan untuk topup', ['user_id' => $topup->user_id]);
            }
        } else {
            Log::warning('Topup tidak ditemukan atau sudah completed', [
                'merchant_order_id' => $data['merchantOrderId']
            ]);
        }
    } else {
        Log::error('Callback gagal atau resultCode bukan 00', $data);
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
