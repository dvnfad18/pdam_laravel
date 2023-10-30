<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\FavoritController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\TransaksiController;

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



// ===================== ADMIN ROUTE START================= 
Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admins/insert', [AdminController::class, 'store']);
Route::post('/admins/{idAdmin}', [AdminController::class, 'update']);
Route::delete('/admins/del/{idAdmin}', [AdminController::class, 'destroy']);
// ===================== ADMIN ROUTE END=================

// ===================== ASET ROUTE START================= 
Route::get('/asets', [AsetController::class, 'index']);
Route::post('/asets/insert', [AsetController::class, 'store']);
Route::post('/asets/{idAset}', [AsetController::class, 'update']);
Route::delete('/asets/del/{idAset}', [AsetController::class, 'destroy']);
Route::get('/getDetilAset', [DetailController::class, 'index']);
Route::get('/getDataBarangFav', [FavoritController::class, 'index']);
// ===================== ASET ROUTE END=================

// ===================== CUST ROUTE START================= 
Route::post('/login', [CustController::class, 'login']);
Route::get('/cust', [CustController::class, 'index']);
Route::post('/cust/insert', [CustController::class, 'store']);
Route::post('/cust/{idCust}', [CustController::class, 'update']);
Route::delete('/cust/del/{idCust}', [CustController::class, 'destroy']);
// ===================== CUST ROUTE END=================

// ===================== TRANSAKSI ROUTE START================= 
Route::get('/trans', [TransaksiController::class, 'index']);
Route::post('/trans/insert', [TransaksiController::class, 'store']);
Route::post('/trans/{idTrans}', [TransaksiController::class, 'update']);
Route::delete('/trans/del/{idTrans}', [TransaksiController::class, 'destroy']);
// ===================== TRANSAKSI ROUTE END=================

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
