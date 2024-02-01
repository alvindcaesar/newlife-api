<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $perPage = 100;

        $payments = Payment::paginate($perPage);

        return response()->json(['payments' =>  $payments], 200);
    }

    public function show($billNo)
    {
        $payments = Payment::where('BillNo', $billNo)->get();

        if($payments->isEmpty()) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $sortedPayments = $payments->sortBy('ItemNo')->values();

        return response()->json(['payments' =>  $sortedPayments], 200);
    }
}
