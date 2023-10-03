<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetController;

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
// ===================== ASET ROUTE END=================

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
