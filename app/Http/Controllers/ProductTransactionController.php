<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use App\Models\Person;
use App\Models\Product;
use App\Models\Balance;
use Illuminate\Support\Facades\DB;

class ProductTransactionController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'person_id' => 'required|exists:people,id',
            'product_id' => 'required|exists:products,id',
            'nomor_tujuan' => 'nullable|string',
        ]);

        $person = Person::findOrFail($request->person_id);
        $product = Product::findOrFail($request->product_id);
        $balance = $person->balance;

        if (!$balance) {
            $balance = $person->balance()->create(['saldo' => 0]);
        }

        if ($balance->saldo < $product->price) {
            return response()->json(['message' => 'Saldo tidak mencukupi'], 400);
        }

        DB::beginTransaction();

        try {
            $balance->saldo -= $product->price;
            $balance->save();

            $transaction = ProductTransaction::create([
                'person_id'    => $person->id,
                'product_id'   => $product->id,
                'nomor_tujuan' => $request->nomor_tujuan,
                'amount'       => $product->price,
                'status'       => 'completed',
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Pembelian berhasil',
                'transaction' => $transaction,
                'sisa_saldo' => $balance->saldo
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Pembelian gagal', 'error' => $e->getMessage()], 500);
        }
    }

    

    // Opsional: histori pembelian
    public function history($person_id)
    {
        $transactions = ProductTransaction::where('person_id', $person_id)
            ->with('product')
            ->latest()
            ->get();

        return response()->json($transactions);
    }
}
