<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminManajemenRoleController;
use App\Http\Controllers\AdminAnggotaController;
use App\Http\Controllers\AdminPengajuanKegiatanController;

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
Route::get('/', [App\Http\Controllers\LoginController::class, 'login'])->name('home');
Route::get('/admin/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/admin/login', [App\Http\Controllers\LoginController::class, 'loginAdmin'])->name('login-admin');
Route::post('/admin/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/forgot-password', [App\Http\Controllers\LoginController::class, 'forgotPassword'])->name('forgotPassword-admin');
Route::post('/admin/forgot-password', [App\Http\Controllers\LoginController::class, 'forgotPasswordEmail'])->name('forgotPasswordEmail-admin');
Route::get('/admin/reset-password', [App\Http\Controllers\LoginController::class, 'reset'])->name('resetPass-admin');
Route::post('/admin/reset-password', [App\Http\Controllers\LoginController::class, 'resetPassword'])->name('resetPassword-admin');

Route::group(['middleware' => ['LoginCheck', 'auth', 'role:admin']], function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('/manajemen-role', AdminManajemenRoleController::class);
    Route::resource('/anggotas', AdminAnggotaController::class);
    Route::resource('/pengajuan-kegiatans', AdminPengajuanKegiatanController::class);

    Route::get('/jadwal-kegiatan', function () {
        return view('admin.jadwal-kegiatan.index');
    });

    Route::get('/aktivasi-kegiatan', function () {
        return view('admin.aktivasi-kegiatan.index');
    });

    Route::get('/data-kegiatan', function () {
        return view('admin.data-kegiatan.index');
    });
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
