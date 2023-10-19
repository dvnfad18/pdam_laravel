<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAdminController;
use App\Http\Controllers\WebAsetController;
use App\Http\Controllers\WebCustomerController;
use App\Http\Controllers\WebTransaksiController;
use App\Http\Controllers\WebProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');

Route::group(['prefix'=>'pdam', 'middleware'=>['auth'], 'as' => 'admin.'], function(){

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', [HomeController::class, 'count'])->name('dashboardcount');
//     Route::get('template', function () {
//     return view('template');
// });

// Route::get('transaksi', function () {
//     return view('transaksi');
// })->name('transaksi');



// Route::get('aset', function () {
//     return view('aset');
// })->name('aset');

// Route::get('/admincount', [DashboardController::class, 'dashboard'])->name('admindashboard');

Route::get('/pageadmin', [WebAdminController::class, 'page'])->name('PageAdmin');
Route::get('/admin', [WebAdminController::class, 'index'])->name('admins');
Route::get('/admintambah', [WebAdminController::class, 'tambah'])->name('tambahadmin');
Route::post('/insertdata', [WebAdminController::class, 'insert'])->name('insertdata');
Route::get('/tampildata/{id}', [WebAdminController::class, 'tampil'])->name('tampildata');
Route::post('/updatedata/{id}', [WebAdminController::class, 'update'])->name('updatedata');
Route::get('/delete/{id}', [WebAdminController::class, 'delete'])->name('deletedata');


Route::get('/pageaset', [WebAsetController::class, 'page'])->name('PageAset');
Route::get('/aset', [WebAsetController::class, 'index'])->name('aset');
Route::get('/asettambah', [WebAsetController::class, 'tambah'])->name('tambahaset');
Route::post('/asetinsertdata', [WebAsetController::class, 'insert'])->name('asetinsertdata');
Route::get('/asettampildata/{idAset}', [WebAsetController::class, 'tampil'])->name('asettampildata');
Route::post('/asetupdatedata/{idAset}', [WebAsetController::class, 'update'])->name('asetupdatedata');
Route::get('/asetdelete/{idAset}', [WebAsetController::class, 'delete'])->name('asetdeletedata');

Route::get('/pagecust', [WebCustomerController::class, 'page'])->name('PageCustomers');
Route::get('/customers', [WebCustomerController::class, 'index'])->name('customers');
// Route::get('/countcustomers', [WebCustomerController::class, 'count'])->name('countcustomers');

Route::get('/transaksi', [WebTransaksiController::class, 'prosedur'])->name('transaksi');

Route::get('/profile', [WebProfileController::class, 'page'])->name('PageProfile');

});

// Route::get('profil', function () {
//     return view('profile');
// })->name('profil');


// Route::get('/', function () {
//     return view('welcome');
// });




// Route::get('login', function () {
//     return view('login');
// });
// Route::get('register', function () {
//     return view('register');
// });