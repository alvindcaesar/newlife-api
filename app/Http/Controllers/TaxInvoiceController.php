<?php

namespace App\Http\Controllers;

use App\Models\TaxInvoice;
use Illuminate\Http\Request;

class TaxInvoiceController extends Controller
{
    public function index()
    {
        $perPage = 100;

        $bills = TaxInvoice::paginate($perPage);

        return response()->json(['bills' => $bills], 200);
    }

    public function show($dispurNo)
    {
        $bill = TaxInvoice::find($dispurNo);

        if (!$bill) {
            return response()->json(['message' => 'Bill not found'], 404);
        }

        return response()->json($bill);
    }

    public function store(Request $request)
    {
        $bill = TaxInvoice::create($request->except('url'));

        $createdBillId = $bill->DispurID;

        return response()->json(['message' => 'Data saved successfully', 'DispurID' => $createdBillId], 201);
    }
}
