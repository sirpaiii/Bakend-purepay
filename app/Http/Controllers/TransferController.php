<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function transfer(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:people,id',
            'receiver_id' => 'required|exists:people,id|different:sender_id',
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string'
        ]);

        // Ambil data sender dan receiver
        $sender = Person::find($request->sender_id);
        $receiver = Person::find($request->receiver_id);

        // Cek dan buat balance jika belum ada
        if (!$sender->balance) {
            $sender->balance()->create(['saldo' => 0]);
        }

        if (!$receiver->balance) {
            $receiver->balance()->create(['saldo' => 0]);
        }

        $senderBalance = $sender->balance;
        $receiverBalance = $receiver->balance;

        // Cek saldo cukup
        if ($senderBalance->saldo < $request->amount) {
            return response()->json(['error' => 'Saldo tidak cukup'], 400);
        }

        // Proses transaksi
        DB::beginTransaction();
        try {
            $senderBalance->saldo -= $request->amount;
            $receiverBalance->saldo += $request->amount;
            $senderBalance->save();
            $receiverBalance->save();

            Transfer::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'amount' => $request->amount,
                'message' => $request->message,
                'status' => 'completed',
                'transferred_at' => now()
            ]);

            DB::commit();

            return response()->json(['message' => 'Transfer berhasil']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Transfer gagal',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
