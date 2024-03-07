<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataTestingController;
use App\Http\Controllers\DataTrainingController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.signin');
});
Route::get('/Dashboard-Admin', function () {
    return view('admin.dashboard');
});
// Route::get('/Data-Testing', function () {
//     return view('admin.dataTesting');
// });
// Route::get('/Data-Training', function () {
//     return view('admin.dataTraining');
// });
// Route::get('/Tambah-Data-Testing', function () {
//     return view('admin.tambahDataTesting');
// });

// Route::post('/tambah-data-testing', [DataTestingController::class, 'tambahDataTesting']);
// Route::get('/Data-Testing', [DataTestingController::class, 'getDataTesting']);
// Route::get('/Delete-Data-Testing/{id}', [DataTestingController::class, 'deleteDataTesting']);
// Route::put('/Update-Data-Testing/{id}', [DataTestingController::class, 'updateDataTesting'])->name('Update-Data-Testing');
// Route::get('/normalisasi-data', [DataTestingController::class, 'normalisasiData']);

// Route::post('/tambah-data-training', [DataTrainingController::class, 'tambahDataTraining']);
// Route::get('/Data-Training', [DataTrainingController::class, 'getDataTraining']);
// Route::get('/Delete-Data-Training/{id}', [DataTrainingController::class, 'deleteDataTraining']);
// Route::put('/Update-Data-Training/{id}', [DataTrainingController::class, 'updateDataTraining'])->name('Update-Data-Training');
// Route::get('/normalisasi-data-training', [DataTrainingController::class, 'normalisasiData']);

// Route::get('/Hasil-Data', [HasilController::class, 'getHasil']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);


// Rute yang hanya dapat diakses oleh admin
Route::group(['middleware' => 'admin'], function () {
    // Daftar rute yang hanya dapat diakses oleh admin di sini
    Route::get('/Dashboard-Admin', function () {
        return view('admin.dashboard');
    });


    Route::post('/tambah-data-testing', [DataTestingController::class, 'tambahDataTesting']);
    Route::get('/Data-Testing', [DataTestingController::class, 'getDataTesting']);
    Route::get('/Delete-Data-Testing/{id}', [DataTestingController::class, 'deleteDataTesting']);
    Route::put('/Update-Data-Testing/{id}', [DataTestingController::class, 'updateDataTesting'])->name('Update-Data-Testing');
    Route::get('/normalisasi-data', [DataTestingController::class, 'normalisasiData']);

    Route::post('/tambah-data-training', [DataTrainingController::class, 'tambahDataTraining']);
    Route::get('/Data-Training', [DataTrainingController::class, 'getDataTraining']);
    Route::get('/Delete-Data-Training/{id}', [DataTrainingController::class, 'deleteDataTraining']);
    Route::put('/Update-Data-Training/{id}', [DataTrainingController::class, 'updateDataTraining'])->name('Update-Data-Training');
    Route::get('/normalisasi-data-training', [DataTrainingController::class, 'normalisasiData']);
    Route::get('/normalisasi-data-jarak', [DataTrainingController::class, 'normalisasiDataJarak']);
});

// Rute yang hanya dapat diakses oleh user
Route::group(['middleware' => 'user'], function () {
    // Daftar rute yang hanya dapat diakses oleh user di sini
    Route::get('/user/dashboard', function () {
        // Logika dan tampilan untuk halaman user
        return view('admin.hasilKlasifikasi');
    })->name('user.dashboard');

});

Route::get('/Hasil-Data', [HasilController::class, 'getHasil']);
