<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAdminController;
use App\Http\Controllers\WebAsetController;
use App\Http\Controllers\WebCustomerController;
use App\Http\Controllers\WebTransaksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('dashboard');
});

Route::get('template', function () {
    return view('template');
});

Route::get('transaksi', function () {
    return view('transaksi');
});

// Route::get('Customers', function () {
//     return view('Customers');
// });

Route::get('login', function () {
    return view('login');
});

Route::get('aset', function () {
    return view('aset');
});

Route::get('/admin', [WebAdminController::class, 'index'])->name('admin');
Route::get('/admintambah', [WebAdminController::class, 'tambah'])->name('tambahadmin');
Route::post('/insertdata', [WebAdminController::class, 'insert'])->name('insertdata');
Route::get('/tampildata/{idAdmin}', [WebAdminController::class, 'tampil'])->name('tampildata');
Route::post('/updatedata/{idAdmin}', [WebAdminController::class, 'update'])->name('updatedata');
Route::get('/delete/{idAdmin}', [WebAdminController::class, 'delete'])->name('deletedata');

Route::get('/aset', [WebAsetController::class, 'index'])->name('aset');
Route::get('/asettambah', [WebAsetController::class, 'tambah'])->name('tambahaset');
Route::post('/asetinsertdata', [WebAsetController::class, 'insert'])->name('asetinsertdata');
Route::get('/asettampildata/{idAset}', [WebAsetController::class, 'tampil'])->name('asettampildata');
Route::post('/asetupdatedata/{idAset}', [WebAsetController::class, 'update'])->name('asetupdatedata');
Route::get('/asetdelete/{idAset}', [WebAsetController::class, 'delete'])->name('asetdeletedata');

Route::get('/customers', [WebCustomerController::class, 'index'])->name('customers');

Route::get('/transaksi', [WebTransaksiController::class, 'prosedur'])->name('transaksi');

Route::get('profil', function () {
    return view('profile');
});

// Route::get('login', function () {
//     return view('login');
// });
// Route::get('register', function () {
//     return view('register');
// });