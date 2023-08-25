<?php

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\ProgramSosial;
use App\Models\Ketenagakejaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Events\Routing;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\EkonomiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ProgramSosialController;
use App\Http\Controllers\KetenagakerjaanController;
use App\Http\Controllers\KirimEmailController;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/chart', [DashboardController::class, 'chart']);
Route::get('/get-data', [DashboardController::class, 'getData']);

Route::post('/akses/store', [SessionController::class, 'store'] )->middleware('checkRole:admin,superadmin,agent');
Route::get('/akses', [SessionController::class, 'create'] )->middleware('checkRole:admin,superadmin');
Route::get('/form/{id}', [FormController::class, 'index'] )->name('form')->middleware('checkRole:admin,superadmin,agent');
Route::get('/verif', [FormController::class, 'verif'] )->middleware('checkRole:admin,superadmin,agent');

Route::controller(KeluargaController::class)->group(function (){
    Route::get('/keluarga', 'index')->name('keluarga');
    Route::post('/keluarga/store', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/keluarga/update/{keluarga:id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/keluarga/create', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/keluarga/{id}/edit', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/keluarga/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(RumahController::class)->group(function (){
    Route::get('/rumah', 'index');
    Route::get('/rumah/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/rumah/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/rumah/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/rumah/store/', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/rumah/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(PendudukController::class)->group(function (){
    Route::get('/penduduk', 'index');
    Route::get('/penduduk/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/penduduk/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/penduduk/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/penduduk/store/{keluarga:id}', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/penduduk/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(PendidikanController::class)->group(function (){
    Route::get('/pendidikan', 'index');
    Route::get('/pendidikan/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/pendidikan/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/pendidikan/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/pendidikan/store', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/pendidikan/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(KetenagakerjaanController::class)->group(function (){
    Route::get('/pekerjaan', 'index');
    Route::get('/pekerjaan/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/pekerjaan/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/pekerjaan/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/pekerjaan/store', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/pekerjaan/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(KesehatanController::class)->group(function (){
    Route::get('/kesehatan', 'index');
    Route::get('/kesehatan/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/kesehatan/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/kesehatan/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/kesehatan/store', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/kesehatan/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(ProgramSosialController::class)->group(function (){
    Route::get('/sosial', 'index');
    Route::get('/sosial/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/sosial/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/sosial/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/sosial/store', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/sosial/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(ProgramController::class)->group(function (){
    Route::get('/program', 'index');
    Route::get('/program/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/program/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/program/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/program/store/{keluarga:id}', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/program/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});
Route::controller(UsahaController::class)->group(function (){
    Route::get('/usaha', 'index');
    Route::get('/usaha/edit/{id}', 'edit')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/usaha/update/{id}', 'update')->middleware('checkRole:admin,superadmin,agent');
    Route::get('/usaha/create/{keluarga:id}', 'create')->middleware('checkRole:admin,superadmin,agent');
    Route::post('/usaha/store', 'store')->middleware('checkRole:admin,superadmin,agent');
    Route::delete('/usaha/delete/{id}', 'destroy')->middleware('checkRole:admin,superadmin,agent');
});

// Auth::routes();
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'index'])->name('indexlogin');
    Route::post('/login', [SessionController::class, 'login'])->name('loginpost');
});

Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::get('/email', [KirimEmailController::class, 'index']);
Route::post('/mail/send', [KirimEmailController::class, 'kirim']);

Route::middleware(['checkRole:superadmin'])->group(function(){
    Route::get('/bantuan', [BantuanController::class, 'index']);
    Route::get('/bantuan_datalist', [BantuanController::class, 'bantuan']);
    Route::get('/bantuan/create', [BantuanController::class, 'create']);
    Route::get('/bantuan/edit/{id}', [BantuanController::class, 'edit']);
    Route::post('/bantuan/update/{id}', [BantuanController::class, 'update']);
    Route::post('/bantuan/store/{id}', [BantuanController::class, 'store']);
    Route::delete('/bantuan/delete/{id}', [BantuanController::class, 'destroy']);
});