<?php

namespace App\Http\Controllers;

use App\Models\TaxInvoiceDetail;

class TaxInvoiceDetailController extends Controller
{
    public function index()
    {
        $perPage = 100;

        $bills = TaxInvoiceDetail::paginate($perPage);

        // $sortedBills = $bills->sortBy('ItemNo')->values();

        return response()->json(['bills' => $bills], 200);
    }

    public function show($dispurNo)
    {
        $bills = TaxInvoiceDetail::where('DispurNo', $dispurNo)->get();

        if (!$bills) {
            return response()->json(['message' => 'Bill not found'], 404);
        }

        $sortedBills = $bills->sortBy('ItemNo')->values();

        return response()->json(['bill_details' => $sortedBills], 200);
    }
}