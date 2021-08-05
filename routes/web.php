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
use App\Http\Controllers\C_register;
use App\Http\Controllers\C_dasar;
use App\Http\Controllers\C_punyaopd;
use App\Http\Controllers\C_riwayat;
use App\Http\Controllers\C_penugasanspt;
use App\Http\Controllers\C_keluarga;
use App\Http\Controllers\C_pangkat;
use App\Http\Controllers\C_diklat;
use App\Http\Controllers\C_kenaikangaji;







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
})->middleware('auth');

Route::get('/login', [C_login::class, 'getLogin'])->name('login');
Route::post('/postlogin', [C_login::class, 'postLogin']);
Route::post('/loginSubmit', [C_register::class, 'authenticate']);
// Route::post('/postLogin', 'C_login@postLogin');


Route::post('/register', [C_register::class, 'store']);
Route::get('/register', [C_register::class, 'create']);

Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/login');
});

Route::get('/login1', [C_login::class, 'getLogin1']);
Route::post('/postLogin1', 'C_login@postLogin1');

Route::get('/dashboard', [C_dashboard::class, 'index'])->middleware('auth');

Route::get('/lhp', [C_lhp::class, 'index'])->middleware('auth');
Route::get('/lhp/insert_lhp', [C_lhp::class, 'insertLHP'])->middleware('auth');
Route::post('/lhp/tambah_lhp', [C_lhp::class, 'tambahLHP'])->middleware('auth');
Route::get('/lhp/edit_lhp/{NOMOR_LHP}', [C_lhp::class, 'editLHP'])->middleware('auth');
Route::post('/lhp/update_lhp', [C_lhp::class, 'updateLHP'])->middleware('auth');
Route::get('/lhp/hapus/{NOMOR_LHP}', [C_lhp::class, 'hapus'])->middleware('auth');
// Route::get('/filedownload', [C_lhp::class, 'download1'])->name('file.download');
// Route::get('/filedownload/{UPLOAD_FILE}', [C_lhp::class, 'download'])->name('file.download');


Route::get('/filedownload/{NOMOR_LHP}', [C_lhp::class, 'download'])->name('file.download')->middleware('auth');
Route::get('/download/{UPLOAD_FILE}', [C_lhp::class, 'download'])->name('file.download')->middleware('auth');

Route::get('/temuan', [C_temuan::class, 'index'])->middleware('auth');
Route::get('/temuan/insert_temuan', [C_temuan::class, 'insertTemuan'])->middleware('auth');
Route::post('/temuan/tambah_temuan', [C_temuan::class, 'tambahTemuan'])->middleware('auth');
Route::get('/temuan/edit_temuan/{KODE_TEMUAN}', [C_temuan::class, 'editTemuan'])->middleware('auth');
Route::post('/temuan/update_temuan', [C_temuan::class, 'updateTemuan'])->middleware('auth');
Route::get('/temuan/hapus/{KODE_TEMUAN}', [C_temuan::class, 'hapus'])->middleware('auth');
Route::get('/temuan/cari',[C_temuan::class, 'cari'])->middleware('auth');

Route::get('/user', [C_user::class, 'index'])->middleware('auth');
Route::get('/user/insert_user', [C_user::class, 'insertUser'])->middleware('auth');
Route::post('/user/tambah_user', [C_user::class, 'tambahUser'])->middleware('auth');
Route::get('/user/edit_user/{NIP}', [C_user::class, 'editUser'])->middleware('auth');
Route::post('/user/update_user', [C_user::class, 'updateUser'])->middleware('auth');
Route::get('/user/hapus/{NIP}', [C_user::class, 'hapus'])->middleware('auth');

Route::get('/cetak', [C_cetak::class, 'index'])->middleware('auth');
Route::get('/cetak/cari',[C_cetak::class, 'cari'])->middleware('auth');
// Route::get('/cetak/export/{NOMOR_LHP}', [C_cetak::class, 'export'])->middleware('auth');
Route::get('/cetak/export/{NOMOR_LHP}', [C_cetak::class, 'exportExcel'])->middleware('auth');

Route::get('/pegawai', [C_pegawai::class, 'index'])->middleware('auth');
Route::get('/pegawai/insert_pegawai', [C_pegawai::class, 'insertPegawai'])->middleware('auth');
Route::post('/pegawai/tambah_pegawai', [C_pegawai::class, 'tambahPegawai'])->middleware('auth');
Route::get('/pegawai/edit_pegawai/{NIK_PEGAWAI}', [C_pegawai::class, 'editPegawai'])->middleware('auth');
Route::post('/pegawai/update_pegawai', [C_pegawai::class, 'updatePegawai'])->middleware('auth');
Route::get('/pegawai/hapus/{NIK_PEGAWAI}', [C_pegawai::class, 'hapus'])->middleware('auth');

Route::get('/spt', [C_spt::class, 'index'])->middleware('auth');
Route::get('/spt/insert_spt', [C_spt::class, 'insertSpt'])->middleware('auth');
Route::post('/spt/tambah_spt', [C_spt::class, 'tambahSpt'])->middleware('auth');
Route::get('/spt/edit_spt/{ID_SPT}', [C_spt::class, 'editSpt'])->middleware('auth');
Route::post('/spt/update_spt', [C_spt::class, 'updateSpt'])->middleware('auth');
Route::get('/spt/hapus/{ID_SPT}', [C_spt::class, 'hapus'])->middleware('auth');
Route::get('/spt/cetak_spt', [C_spt::class, 'cetak'])->middleware('auth');
Route::get('/spt/download/{ID_SPT}', [C_spt::class, 'download'])->name('file.download')->middleware('auth');
Route::get('/spt/generate-docx/{ID_SPT}', [C_spt::class, 'generateDocx']);

// Route::get('/penugasan', [C_penugasan::class, 'index'])->middleware('auth');
Route::get('/penugasan/insert_view_penugasan/{ID_SPT}', [C_penugasan::class, 'insertPenugasan'])->middleware('auth');
Route::post('/penugasan/insert_view_penugasan', [C_penugasan::class, 'tambahPenugasan'])->middleware('auth');
Route::get('/penugasan/edit_penugasan/{ID_SPT}', [C_penugasan::class, 'editPenugasan'])->middleware('auth');
Route::post('/penugasan/update_penugasan', [C_penugasan::class, 'updatePenugasan'])->middleware('auth');
Route::get('/penugasan/hapus/{id}&{id_spt}', [C_penugasan::class, 'hapus'])->middleware('auth');

Route::get('/validasi', [C_user::class, 'validasi'])->middleware('auth');
// Route::get('/user/insert_user', [C_user::class, 'insertUser'])->middleware('auth');
// Route::post('/user/tambah_user', [C_user::class, 'tambahUser'])->middleware('auth');
Route::get('/validasi/edit_validasi/{NIP}', [C_user::class, 'editValidasi'])->middleware('auth');
Route::post('/validasi/update_validasi', [C_user::class, 'updateValidasi'])->middleware('auth');
// Route::get('/user/hapus/{NIP}', [C_user::class, 'hapus'])->middleware('auth');

Route::get('/dasar/insert_view_dasar/{ID_SPT}', [C_dasar::class, 'insertDasar'])->middleware('auth');
Route::post('/dasar/insert_view_dasar', [C_dasar::class, 'tambahDasar'])->middleware('auth');
Route::get('/dasar/edit_dasar/{ID_SPT}', [C_dasar::class, 'editdasar'])->middleware('auth');
Route::post('/dasar/update_dasar', [C_dasar::class, 'updatedasar'])->middleware('auth');
Route::get('/dasar/hapus/{id}&{id_spt}', [C_dasar::class, 'hapus'])->middleware('auth');

Route::get('/punya_opd/insert_view_punya_opd/{KODE_TEMUAN}', [C_punyaopd::class, 'insertOPD'])->middleware('auth');
Route::post('/punya_opd/insert_view_punya_opd', [C_punyaopd::class, 'tambahOPD'])->middleware('auth');
Route::get('/punya_opd/edit_punya_opd/{KODE_TEMUAN}', [C_punyaopd::class, 'editOPD'])->middleware('auth');
Route::post('/punya_opd/update_punya_opd', [C_punyaopd::class, 'updatOPD'])->middleware('auth');
Route::get('/punya_opd/hapus/{KODE_TEMUAN}&{KODE_OPD}', [C_punyaopd::class, 'hapus'])->middleware('auth');


Route::get('/riwayat/insert_view_riwayat/{NIP_PEGAWAI}', [C_riwayat::class, 'insertRiwayat'])->middleware('auth');
Route::post('/riwayat/insert_view_riwayat', [C_riwayat::class, 'tambahRiwayat'])->middleware('auth');
Route::get('/riwayat/edit_riwayat/{NIP_PEGAWAI}', [C_riwayat::class, 'editRiwayat'])->middleware('auth');
Route::post('/riwayat/update_riwayat', [C_riwayat::class, 'updateRiwayat'])->middleware('auth');
Route::get('/riwayat/hapus/{id}&{NIP_PEGAWAI}', [C_riwayat::class, 'hapus'])->middleware('auth');

Route::get('/keluarga/insert_view_keluarga/{NIK_PEGAWAI}', [C_keluarga::class, 'insertKeluarga'])->middleware('auth');
Route::post('/keluarga/insert_view_keluarga', [C_keluarga::class, 'tambahKeluarga'])->middleware('auth');
Route::get('/keluarga/edit_keluarga/{NIK_PEGAWAI}', [C_keluarga::class, 'editKeluarga'])->middleware('auth');
Route::post('/keluarga/update_keluarga', [C_keluarga::class, 'updateKeluarga'])->middleware('auth');
Route::get('/keluarga/hapus/{NIK_PEGAWAI}', [C_keluarga::class, 'hapus'])->middleware('auth');

Route::get('/penugasan_spt', [C_penugasanspt::class, 'index'])->middleware('auth');
Route::get('/penugasan_spt/cari',[C_penugasanspt::class, 'cari'])->middleware('auth');

Route::get('/pangkat/insert_view_pangkat/{NIK_PEGAWAI}', [C_pangkat::class, 'insertPangkat'])->middleware('auth');
Route::post('/pangkat/insert_view_pangkat', [C_pangkat::class, 'tambahPangkat'])->middleware('auth');
Route::get('/pangkat/edit_pangkat/{NIK_PEGAWAI}', [C_pangkat::class, 'editPangkat'])->middleware('auth');
Route::post('/pangkat/update_pangkat', [C_pangkat::class, 'updatePangkat'])->middleware('auth');
Route::get('/pangkat/hapus/{ID_PANGKAT}&{NIK_PEGAWAI}', [C_pangkat::class, 'hapus'])->middleware('auth');

Route::get('/diklat/insert_view_diklat/{NIK_PEGAWAI}', [C_diklat::class, 'insertDiklat'])->middleware('auth');
Route::post('/diklat/insert_view_diklat', [C_diklat::class, 'tambahDiklat'])->middleware('auth');
Route::get('/diklat/edit_diklat/{NIK_PEGAWAI}', [C_diklat::class, 'editDiklat'])->middleware('auth');
Route::post('/diklat/update_diklat', [C_diklat::class, 'updateDiklat'])->middleware('auth');
Route::get('/diklat/hapus/{ID_DIKLAT}&{NIK_PEGAWAI}', [C_diklat::class, 'hapus'])->middleware('auth');

Route::get('/diklat/insert_view_diklat/{NIK_PEGAWAI}', [C_diklat::class, 'insertDiklat'])->middleware('auth');
Route::post('/diklat/insert_view_diklat', [C_diklat::class, 'tambahDiklat'])->middleware('auth');
Route::get('/diklat/edit_diklat/{NIK_PEGAWAI}', [C_diklat::class, 'editDiklat'])->middleware('auth');
Route::post('/diklat/update_diklat', [C_diklat::class, 'updateDiklat'])->middleware('auth');
Route::get('/diklat/hapus/{ID_DIKLAT}&{NIK_PEGAWAI}', [C_diklat::class, 'hapus'])->middleware('auth');

Route::get('/kenaikan_gaji/insert_view_kenaikan_gaji/{NIK_PEGAWAI}', [C_kenaikangaji::class, 'insertKenaikanGaji'])->middleware('auth');
Route::post('/kenaikan_gaji/insert_view_kenaikan_gaji', [C_kenaikangaji::class, 'tambahKenaikanGaji'])->middleware('auth');
Route::get('/kenaikan_gaji/edit_kenaikan_gaji/{NIK_PEGAWAI}', [C_kenaikangaji::class, 'editKenaikanGaji'])->middleware('auth');
Route::post('/kenaikan_gaji/update_kenaikan_gaji', [C_kenaikangaji::class, 'updateKenaikanGaji'])->middleware('auth');
Route::get('/kenaikan_gaji/hapus/{ID_KENAIKAN_GAJI}&{NIK_PEGAWAI}', [C_kenaikangaji::class, 'hapus'])->middleware('auth');

