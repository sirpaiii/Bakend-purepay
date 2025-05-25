<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class ProductTransactionController extends Controller
{
   public function buy(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:people,id',
        'product_id' => 'required|exists:products,id',
        'payment_method' => 'required|string'
    ]);

    $user = Person::findOrFail($request->user_id);
    $product = Product::findOrFail($request->product_id);

    // Buat transaksi terlebih dahulu
    $transaction = ProductTransaction::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'price' => $product->price,
        'status' => 'pending'
    ]);

    // Buat request ke Duitku
    $response = Http::post('http://localhost:8000/public/index.php?action=request_transaction', [
     'merchantOrderId' => 'ORDER-' . $transaction->id,
    'paymentAmount' => $product->price,
    'paymentMethod' => $request->payment_method,
    'productDetails' => 'Pembelian ' . $product->name,
    'email' => 'user@example.com',
    'phoneNumber' => '081234567890',
    'customerVaName' => $user->name,
    'returnUrl' => 'https://yourapp.com/success',
    'callbackUrl' => 'https://your-backend.com/api/product/callback',
    'itemDetails' => [
        [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ]
    ]
]);

    return response()->json([
        'message'     => 'Transaksi produk berhasil dibuat',
        'transaction' => $transaction,
        'payment'     => json_decode($response->body(), true)
    ]);
}

    public function handleCallback(Request $request)
    {
        $data = $request->all();

        if ($data['statusCode'] === '00') {
            $id = str_replace('ORDER-', '', $data['merchantOrderId']);
            $transaction = ProductTransaction::find($id);

            if ($transaction && $transaction->status !== 'completed') {
                $transaction->update([
                    'status' => 'completed',
                    'paid_at' => now(),
                    'payment_reference' => $data['reference']
                ]);
            }
        }

        return response()->json(['message' => 'Callback diterima'], 200);
    }

    public function history($user_id)
    {
        $transactions = ProductTransaction::where('user_id', $user_id)->with('product')->latest()->get();
        return response()->json($transactions);
    }
}
