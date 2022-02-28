<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('is_admin');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard.index');
// });

Route::get('/manajemen-role', function () {
    return view('admin.manajemen-role.index');
});

Route::get('/add-manajemen-role', function () {
    return view('admin.manajemen-role.add');
});

Route::get('/jadwal-kegiatan', function () {
    return view('admin.jadwal-kegiatan.index');
});

Route::get('/data-anggota', function () {
    return view('admin.data-anggota.index');
});

Route::get('/aktivasi-kegiatan', function () {
    return view('admin.aktivasi-kegiatan.index');
});

Route::get('/data-kegiatan', function () {
    return view('admin.data-kegiatan.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
