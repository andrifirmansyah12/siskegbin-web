<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminManajemenRoleController;
use App\Http\Controllers\AdminAnggotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('role:admin')->name('dashboard');

Route::resource('/manajemen-role', AdminManajemenRoleController::class)->middleware('role:admin');
Route::resource('/data-anggota', AdminAnggotaController::class)->middleware('role:admin');

Route::get('/jadwal-kegiatan', function () {
    return view('admin.jadwal-kegiatan.index');
});

Route::get('/aktivasi-kegiatan', function () {
    return view('admin.aktivasi-kegiatan.index');
});

Route::get('/data-kegiatan', function () {
    return view('admin.data-kegiatan.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
