<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Transactions;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\CategoryProduct;

class TransactionsController extends Controller
{
    public function createVA(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required',
            'target_number' => 'required|string',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // 2. Simpan transaksi ke DB
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'category_id' => $validated['category_id'],
            'target_number' => $validated['target_number'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);

        // 3. Kirim request ke API Duitku
        $response = Http::post('http://localhost:8000/public/index.php?action=get_payment_method&Content-Type=application/json', [
            'amount' => $validated['amount'],
            'paymentMethod' => $validated['payment_method'],
            'merchantOrderId' => $transaction->id,
            'productDetails' => 'Top Up',
            'customerVaName' => auth()->user()->name,
            'email' => auth()->user()->email,
        ]);

        if ($response->successful()) {
            $result = $response->json();

            $transaction->update([
                'payment_code' => $result['vaNumber'] ?? null,
                'reference' => $result['paymentUrl'] ?? null,
            ]);

            return response()->json([
                'message' => 'Virtual Account created',
                'data' => $transaction
            ]);
        }

        return response()->json(['message' => 'Failed to create VA'], 500);
    }

    // 7. Callback dari Duitku
    public function handleCallback(Request $request)
    {
        $transaction = Transaction::find($request->merchantOrderId);

        if (!$transaction) return response()->json(['message' => 'Not found'], 404);

        $transaction->update(['status' => $request->status]);

        return response()->json(['message' => 'Callback processed']);
    }

    // 9. Status transaksi
    public function getStatus($id)
    {
        $transaction = Transaction::findOrFail($id);
        return response()->json($transaction);
    }
}

