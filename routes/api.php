<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KategoriiController;
use App\Http\Controllers\FavoritController;

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
// Route::get('/admins', [AdminController::class, 'index']);
// Route::post('/admins/insert', [AdminController::class, 'store']);
// Route::post('/admins/{idAdmin}', [AdminController::class, 'update']);
// Route::delete('/admins/del/{idAdmin}', [AdminController::class, 'destroy']);
// ===================== ADMIN ROUTE END=================
// // ===================== ASET ROUTE START================= 
// Route::post('/asets', [AsetController::class, 'index']);
// Route::post('/asets/insert', [AsetController::class, 'store']);
// Route::post('/asets/{idAset}', [AsetController::class, 'update']);
// Route::delete('/asets/del/{idAset}', [AsetController::class, 'destroy']);
// Route::post('addDataKeranjang', [AsetController::class, 'addDataKeranjang']);
// Route::post('getDataKeranjang', [AsetController::class, 'getDataKeranjang']);
// // ===================== ASET ROUTE END=================
// // ===================== CUST ROUTE START================= 
// Route::post('/cust/insert', [CustController::class, 'store']);
// Route::delete('/cust/del/{idCust}', [CustController::class, 'destroy']);
// // ===================== CUST ROUTE END=================
// // ===================== TRANSAKSI ROUTE START================= 
// Route::get('/trans', [TransaksiController::class, 'index']);
// Route::post('/trans/insert', [TransaksiController::class, 'store']);
// Route::post('/trans/{idTrans}', [TransaksiController::class, 'update']);
// Route::delete('/trans/del/{idTrans}', [TransaksiController::class, 'destroy']);
// // ===================== TRANSAKSI ROUTE END=================
// // ===================== KATEGORI ROUTE START================= 
// Route::post('/kategori/insert', [KategoriiController::class, 'store']);
// Route::post('/kategori/{idKategori}', [KategoriiController::class, 'update']);
// Route::delete('/kategori/del/{idKategori}', [KategoriiController::class, 'destroy']);
// // ===================== KATEGORI ROUTE END=================

// =====================  ROUTE BARUUUUUU====================
Route::post('/login', [CustController::class, 'login']);
Route::post('/register', [CustController::class, 'register']);
Route::post('/getDataAset', [AsetController::class, 'getDataAset']);
Route::post('/kategori', [KategoriiController::class, 'index']);
Route::post('/getDetilAset', [AsetController::class, 'getDetilAset']);
Route::get('/cust', [CustController::class, 'index']);
Route::post('/cust/{idCust}', [CustController::class, 'update']);
Route::post('/getUserById', [CustController::class, 'getUserById']);
Route::post('/updateProfile', [CustController::class, 'updateProfile']);
Route::post('/getTotalKeranjang', [AsetController::class, 'getTotalKeranjang']);
Route::post('/getAllPaymen', [AsetController::class, 'getAllPaymen']);
Route::post('/storeDetil', [AsetController::class, 'storeDetil']);
Route::post('/getDataKeranjang', [AsetController::class, 'getDataKeranjang']);
Route::post('/getDetilJual', [AsetController::class, 'getDetilJual']);
Route::post('/getNota', [AsetController::class, 'getNota']);
Route::post('/getDataAsetFav', [FavoritController::class, 'getDataAsetFav']);
Route::post('/storeJual', [AsetController::class, 'storeJual']);
Route::post('/getDataJualByCustomer', [AsetController::class, 'getDataJualByCustomer']);
Route::post('/updateQty', [AsetController::class, 'updateQty']);
Route::post('/updateJual', [AsetController::class, 'updateJual']);
Route::post('/updateKlaim', [AsetController::class, 'updateKlaim']);
Route::post('/updateDataBarang', [AsetController::class, 'updateDataBarang']);

Route::post('/updateStatusKeranjang', [AsetController::class, 'updateStatusKeranjang']);
Route::post('/updateDataKeranjang', [AsetController::class, 'updateDataKeranjang']);
Route::post('/addDataKeranjang', [AsetController::class, 'addDataKeranjang']);
Route::post('/favorit/{idCust}', [FavoritController::class, 'update']);
Route::post('/addDataFavorit', [FavoritController::class, 'addDataFavorit']);
Route::post('/deleteDataFavorit', [FavoritController::class, 'deleteDataFavorit']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
