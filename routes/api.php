<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
// ======== ADMIN ROUTE START============= 
Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admins/insert', [AdminController::class, 'store']);
Route::post('/admins/{idAdmin}', [AdminController::class, 'update']);
Route::delete('/admins/del/{idAdmin}', [AdminController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
