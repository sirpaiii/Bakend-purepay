<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopUp;
use App\Models\Transfer;
use App\Models\ProductTransaction;
use App\Models\Person;


class TransactionHistoryController extends Controller
{
    public function getHistory(Request $request)
{
    $personId = $request->query('person_id');

    $topUps = TopUp::where('user_id', $personId)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'Top Up',
                'amount' => $item->amount,
                'date' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

    $transfers = Transfer::where('sender_id', $personId)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'Transfer',
                'amount' => $item->amount,
                'date' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

    $purchases = ProductTransaction::where('person_id', $personId)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'Pembelian Produk',
                'amount' => $item->amount,
                'date' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

    $history = $topUps
        ->merge($transfers)
        ->merge($purchases)
        ->sortByDesc('date')
        ->values();

    return response()->json($history);
}

public function getRecentHistory(Request $request)
{
    $personId = $request->query('person_id');

    $topUps = TopUp::where('user_id', $personId)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'Top Up',
                'amount' => $item->amount,
                'date' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

    $transfers = Transfer::where('sender_id', $personId)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'Transfer',
                'amount' => $item->amount,
                'date' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

    $purchases = ProductTransaction::where('person_id', $personId)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'Pembelian Produk',
                'amount' => $item->amount,
                'date' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

    $history = $topUps
        ->merge($transfers)
        ->merge($purchases)
        ->sortByDesc('date')
        ->take(10)
        ->values();

    return response()->json($history);
}


}
