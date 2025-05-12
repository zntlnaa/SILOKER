<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PencakerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeleksiAdministrasiController;
use App\Http\Controllers\SeleksiAdministrasi;
use App\Http\Controllers\Apply_loker;


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
    return view('login1');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/register1', function () {
    return view('register1');
});
Route::post('/registeruser',[LoginController::class, 'registeruser'])-> name('registeruser');
Route::post('/loginproses',[LoginController::class, 'loginproses'])-> name('loginproses');

Route::get('/dashboard', [LokerController::class, 'showLoker'])->name('dashboard') ;

//Route untuk menampilkan halaman data lowongan kerja (CRUD)
Route::get('/dataLoker', [LokerController::class, 'indexDataLoker'])->name('dataLoker');

//Route untuk menampilkan halaman edit data lowongan kerja
Route::get('/dataLoker/edit-loker/{idloker}', [LokerController::class, 'editLoker'])->name('edit-loker');

// Route untuk melakukan proses update data lowongan kerja
Route::post('/dataLoker/edit-loker/update-loker/{idloker}', [LokerController::class, 'updateLoker'])->name('update-loker');

// Route untuk konfirmasi penghapusan data lowongan kerja
Route::get('/dataLoker/confirmdelete/{idloker}', [LokerController::class, 'confirmdelete'])->name('confirmdelete');

// Route untuk menghapus data lowongan kerja
Route::get('/dataLoker/confirmdelete/delete-loker/{idloker}',[LokerController::class, 'deleteLoker'])->name('delete-loker');

// Route untuk menambahkan data lowongan kerja
Route::get('/dataLoker/add-loker',[LokerController::class, 'addLoker'])->name('add-loker');

// Route untuk memproses penambahan data lowongan kerja
Route::post('/dataLoker/insert-loker',[LokerController::class, 'insertLoker'])->name('insert-loker');

// Route untuk melihat daftar lowongan kerja berdasarkan status
Route::get('/daftarLoker',[LokerController::class, 'indexDaftarLoker'])->name('daftarLoker');

// Route untuk menampilkan detail loker
Route::get('/dataLoker/detail-loker/{idloker}', [LokerController::class, 'detailLoker'])->name('detail-loker');

// Route untuk menampilkan list pencari kerja yang apply pada loker
Route::get('/dataLoker/detail-loker/{idloker}/pencaker-apply', [PencakerController::class, 'getPencaker'])->name('pencaker-apply');

// Route untuk menampilkan detail pencaker
Route::get('/pencaker-apply/detail-pencaker/{idapply}', [PencakerController::class, 'detailPencaker'])->name('detail-pencaker');




// Route untuk menampilkan list pencari kerja yang apply pada loker
//Route::get('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksiWawancara', [PencakerController::class, 'indexSeleksiWawancara'])->name('seleksiWawancara');

//Route::get('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi', [PencakerController::class, 'seleksiAdministrasi'])->name('seleksi-administrasi');

//Route::post('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi/tidakLulusSeleksiAdministrasi/{idapply}', [PencakerController::class, 'tidakLulusSeleksiAdministrasi'])->name('tidakLulusSeleksiAdministrasi');

//Route::post('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi/lulusSeleksiAdministrasi/{idapply}', [PencakerController::class, 'lulusSeleksiAdministrasi'])->name('lulusSeleksiAdministrasi');
//Route::get('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi', [PencakerController::class, 'seleksi_administrasi'])->name('seleksi-administrasi');
// Route untuk mengupdate nili
// Route::post('/update-nilai', [SeleksiAdministrasiController::class, 'updateNilai']);



// Route::post('/update-nilai', [PencakerController::class, 'updateNilai'])->name('update-nilai');
//Route::post('/save-data', 'SeleksiAdministrasiController@saveData')->name('save-data');


//Route::post('/dataLoker/edit-loker/update-loker/{idloker}', [LokerController::class, 'updateLoker'])->name('update-loker');


// Route untuk menampilkan list pencari kerja yang apply pada loker

// Route untuk tahapan seleksi
Route::get('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-wawancara', [PencakerController::class, 'seleksiWawancara'])->name('seleksi-wawancara');
Route::post('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-wawancara/tidakLulusSeleksiWawancara/{idapply}', [PencakerController::class, 'tidakLulusSeleksiWawancara'])->name('tidakLulusSeleksiWawancara');
Route::post('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-wawancara/lulusSeleksiWawancara/{idapply}', [PencakerController::class, 'lulusSeleksiWawancara'])->name('lulusSeleksiWawancara');
Route::get('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi', [PencakerController::class, 'seleksiAdministrasi'])->name('seleksi-administrasi');
Route::post('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi/tidakLulusSeleksiAdministrasi/{idapply}', [PencakerController::class, 'tidakLulusSeleksiAdministrasi'])->name('tidakLulusSeleksiAdministrasi');
Route::post('/dataLoker/detail-loker/{idloker}/pencaker-apply/seleksi-administrasi/lulusSeleksiAdministrasi/{idapply}', [PencakerController::class, 'lulusSeleksiAdministrasi'])->name('lulusSeleksiAdministrasi');
Route::post('batal-lulus-administrasi/{idloker}', [PencakerController::class, 'batalLulusAdministrasi'])->name('batal-lulus-administrasi');
Route::put('/update/{idloker}', [LokerController::class, 'updateStatus'])->name('updateStatus');



