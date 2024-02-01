<?php

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\TaxInvoiceController;
use App\Http\Controllers\TaxInvoiceDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login", [UserController::class, 'loginApi']);

Route::get('members/{memberCode}', [MemberController::class, 'getMemberByMemberCode'])->middleware('auth:sanctum');
Route::get('system-users/{identifier}', [SystemUserController::class, 'getUserByName']);

// Tax Invoice Routes
Route::get('bills', [TaxInvoiceController::class, 'index']);
Route::get('bills/{dispurNo}', [TaxInvoiceController::class, 'show']);
Route::post('bills', [TaxInvoiceController::class, 'store']);

// Tax Invoice Detail Routes
Route::get('bill-details', [TaxInvoiceDetailController::class, 'index']);
Route::get('bill-details/{dispurNo}', [TaxInvoiceDetailController::class, 'show']);

// Payment Routes
Route::get('payments', [PaymentController::class, 'index']);
Route::get('payments/{billNo}', [PaymentController::class, 'show']);

