<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_lhp;
use App\Http\Controllers\C_temuan;
use App\Http\Controllers\C_pegawai;
use App\Http\Controllers\C_dashboard;
use App\Http\Controllers\C_login;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_spt;
use App\Http\Controllers\C_penugasan;
use App\Http\Controllers\C_cetak;




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
    
    $data = array(
        'menu' => 'dashboard',
        'submenu' => ''
    );

    return view('dashboard', $data);
});

Route::get('/login', [C_login::class, 'getLogin']);
// Route::get('/postlogin', [C_login::class, 'postLogin']);
Route::post('/postLogin', 'C_login@postLogin');

Route::get('/login1', [C_login::class, 'getLogin1']);
Route::post('/postLogin1', 'C_login@postLogin1');

Route::get('/dashboard', [C_dashboard::class, 'index']);

Route::get('/lhp', [C_lhp::class, 'index']);
Route::get('/lhp/insert_lhp', [C_lhp::class, 'insertLHP']);
Route::post('/lhp/tambah_lhp', [C_lhp::class, 'tambahLHP']);
Route::get('/lhp/edit_lhp/{NOMOR_LHP}', [C_lhp::class, 'editLHP']);
Route::post('/lhp/update_lhp', [C_lhp::class, 'updateLHP']);
Route::get('/lhp/hapus/{NOMOR_LHP}', [C_lhp::class, 'hapus']);
// Route::get('/filedownload', [C_lhp::class, 'download1'])->name('file.download');
// Route::get('/filedownload/{UPLOAD_FILE}', [C_lhp::class, 'download'])->name('file.download');
Route::get('/filedownload/{NOMOR_LHP}', [C_lhp::class, 'download'])->name('file.download');
Route::get('/download/{UPLOAD_FILE}', [C_lhp::class, 'download'])->name('file.download');

Route::get('/temuan', [C_temuan::class, 'index']);
Route::get('/temuan/insert_temuan', [C_temuan::class, 'insertTemuan']);
Route::post('/temuan/tambah_temuan', [C_temuan::class, 'tambahTemuan']);
Route::get('/temuan/edit_temuan/{KODE_TEMUAN}', [C_temuan::class, 'editTemuan']);
Route::post('/temuan/update_temuan', [C_temuan::class, 'updateTemuan']);
Route::get('/temuan/hapus/{KODE_TEMUAN}', [C_temuan::class, 'hapus']);
Route::get('/temuan/cari',[C_temuan::class, 'cari']);

Route::get('/user', [C_user::class, 'index']);
Route::get('/user/insert_user', [C_user::class, 'insertUser']);
Route::post('/user/tambah_user', [C_user::class, 'tambahUser']);
Route::get('/user/edit_user/{NIP}', [C_user::class, 'editUser']);
Route::post('/user/update_user', [C_user::class, 'updateUser']);
Route::get('/user/hapus/{NIP}', [C_user::class, 'hapus']);

Route::get('/pegawai', [C_pegawai::class, 'index']);
Route::get('/pegawai/insert_pegawai', [C_pegawai::class, 'insertPegawai']);
Route::post('/pegawai/tambah_pegawai', [C_pegawai::class, 'tambahPegawai']);
Route::get('/pegawai/edit_pegawai/{NIP_PEGAWAI}', [C_pegawai::class, 'editPegawai']);
Route::post('/pegawai/update_pegawai', [C_pegawai::class, 'updatePegawai']);
Route::get('/pegawai/hapus/{NIP_PEGAWAI}', [C_pegawai::class, 'hapus']);


Route::get('/spt', [C_spt::class, 'index']);
Route::get('/spt/insert_spt', [C_spt::class, 'insertSpt']);
Route::post('/spt/tambah_spt', [C_spt::class, 'tambahSpt']);
Route::get('/spt/edit_spt/{ID_SPT}', [C_spt::class, 'editSpt']);
Route::post('/spt/update_spt', [C_spt::class, 'updateSpt']);
Route::get('/spt/hapus/{ID_SPT}', [C_spt::class, 'hapus']);

Route::get('/penugasan', [C_penugasan::class, 'index']);
Route::get('/penugasan/insert_penugasan', [C_spt::class, 'insertPenugasan']);
Route::post('/penugasan/tambah_penugasan', [C_spt::class, 'tambahPenugasan']);

Route::get('/cetak', [C_cetak::class, 'index']);
Route::get('/cetak/cari',[C_cetak::class, 'cari']);

