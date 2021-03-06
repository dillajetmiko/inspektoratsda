<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Http\Controllers\C_rekomendasi;
use App\Http\Controllers\C_keluarga;
use App\Http\Controllers\C_pangkat;
use App\Http\Controllers\C_diklat;
use App\Http\Controllers\C_kenaikangaji;
use App\Http\Controllers\C_pendidikan;
use App\Http\Controllers\C_jabatan;
use App\Http\Controllers\C_opd;
use App\Http\Controllers\C_tugas;
use App\Http\Controllers\C_jenispengawasan;
use App\Http\Controllers\C_kategoritemuan;
use App\Http\Controllers\C_dupak;
use App\Http\Controllers\C_ppm;
use App\Http\Controllers\C_generatepdf;






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
    $nama = Auth::user()->name;

    $data = array(
        'menu' => 'dashboard',
        'nama' => $nama,
        'submenu' => ''
    );

    return view('dashboard', $data);
})->middleware('auth');

Route::get('/login', [C_login::class, 'getLogin'])->name('login');
// Route::post('/postlogin', [C_login::class, 'postLogin']);
Route::post('/loginSubmit', [C_register::class, 'authenticate']);
// Route::post('/postLogin', 'C_login@postLogin');


// Route::post('/register', [C_register::class, 'store']);
// Route::get('/register', [C_register::class, 'create']);

Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/login');
});

Route::get('/login1', [C_login::class, 'getLogin1']);
Route::post('/postLogin1', 'C_login@postLogin1');

Route::get('/dashboard', [C_dashboard::class, 'index'])->middleware('auth');

Route::get('/opd', [C_opd::class, 'index'])->middleware('auth');
Route::get('/opd/insert_opd', [C_opd::class, 'insertOPD'])->middleware('auth');
Route::post('/opd/tambah_opd', [C_opd::class, 'tambahOPD'])->middleware('auth');
Route::get('/opd/edit_opd/{KODE_OPD}', [C_opd::class, 'editOPD'])->middleware('auth');
Route::post('/opd/update_opd', [C_opd::class, 'updateOPD'])->middleware('auth');
Route::get('/opd/hapus/{KODE_OPD}', [C_opd::class, 'hapus'])->middleware('auth');

Route::get('/tugas', [C_tugas::class, 'index'])->middleware('auth');
Route::get('/tugas/insert_tugas', [C_tugas::class, 'insertTugas'])->middleware('auth');
Route::post('/tugas/tambah_tugas', [C_tugas::class, 'tambahTugas'])->middleware('auth');
Route::get('/tugas/edit_tugas/{ID_TUGAS}', [C_tugas::class, 'editTugas'])->middleware('auth');
Route::post('/tugas/update_tugas', [C_tugas::class, 'updateTugas'])->middleware('auth');
Route::get('/tugas/hapus/{ID_TUGAS}', [C_tugas::class, 'hapus'])->middleware('auth');

Route::get('/jenis_pengawasan', [C_jenispengawasan::class, 'index'])->middleware('auth');
Route::get('/jenis_pengawasan/insert_jenis_pengawasan', [C_jenispengawasan::class, 'insertJenispengawasan'])->middleware('auth');
Route::post('/jenis_pengawasan/tambah_jenis_pengawasan', [C_jenispengawasan::class, 'tambahJenispengawasan'])->middleware('auth');
Route::get('/jenis_pengawasan/edit_jenis_pengawasan/{KODE_jenis_pengawasan}', [C_jenispengawasan::class, 'editJenispengawasan'])->middleware('auth');
Route::post('/jenis_pengawasan/update_jenis_pengawasan', [C_jenispengawasan::class, 'updateJenispengawasan'])->middleware('auth');
Route::get('/jenis_pengawasan/hapus/{KODE_jenis_pengawasan}', [C_jenispengawasan::class, 'hapus'])->middleware('auth');

Route::get('/kategori_temuan', [C_kategoritemuan::class, 'index'])->middleware('auth');
Route::get('/kategori_temuan/insert_kategori_temuan', [C_kategoritemuan::class, 'insertKategoriTemuan'])->middleware('auth');
Route::post('/kategori_temuan/tambah_kategori_temuan', [C_kategoritemuan::class, 'tambahKategoriTemuan'])->middleware('auth');
Route::get('/kategori_temuan/edit_kategori_temuan/{KODE_kategori_temuan}', [C_kategoritemuan::class, 'editKategoriTemuan'])->middleware('auth');
Route::post('/kategori_temuan/update_kategori_temuan', [C_kategoritemuan::class, 'updateKategoriTemuan'])->middleware('auth');
Route::get('/kategori_temuan/hapus/{KODE_kategori_temuan}', [C_kategoritemuan::class, 'hapus'])->middleware('auth');

Route::get('/lhp', [C_lhp::class, 'index'])->middleware('auth');
Route::get('/lhp/insert_lhp', [C_lhp::class, 'insertLHP'])->middleware('auth');
Route::post('/lhp/tambah_lhp', [C_lhp::class, 'tambahLHP'])->middleware('auth');
Route::get('/lhp/edit_lhp/{id}', [C_lhp::class, 'editLHP'])->middleware('auth');
Route::post('/lhp/update_lhp', [C_lhp::class, 'updateLHP'])->middleware('auth');
Route::get('/lhp/hapus/{id}', [C_lhp::class, 'hapus'])->middleware('auth');
// Route::get('/filedownload', [C_lhp::class, 'download1'])->name('file.download');
// Route::get('/filedownload/{UPLOAD_FILE}', [C_lhp::class, 'download'])->name('file.download');


Route::get('/filedownload/{id}', [C_lhp::class, 'download'])->name('file.download')->middleware('auth');
Route::get('/download/{UPLOAD_FILE}', [C_lhp::class, 'download'])->name('file.download')->middleware('auth');

Route::get('/temuan', [C_temuan::class, 'index'])->middleware('auth');
Route::get('/temuan/insert_temuan', [C_temuan::class, 'insertTemuan'])->middleware('auth');
Route::post('/temuan/tambah_temuan', [C_temuan::class, 'tambahTemuan'])->middleware('auth');
Route::get('/temuan/edit_temuan/{id}', [C_temuan::class, 'editTemuan'])->middleware('auth');
Route::post('/temuan/update_temuan', [C_temuan::class, 'updateTemuan'])->middleware('auth');
Route::get('/temuan/hapus/{id}', [C_temuan::class, 'hapus'])->middleware('auth');
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
Route::get('/cetak/export/{id}', [C_cetak::class, 'exportExcel'])->middleware('auth');

Route::get('/pegawai', [C_pegawai::class, 'index'])->middleware('auth');
Route::get('/pegawai/insert_pegawai', [C_pegawai::class, 'insertPegawai'])->middleware('auth');
Route::post('/pegawai/tambah_pegawai', [C_pegawai::class, 'tambahPegawai'])->middleware('auth');
Route::get('/pegawai/edit_pegawai/{NIK_PEGAWAI}', [C_pegawai::class, 'editPegawai'])->middleware('auth');
Route::post('/pegawai/update_pegawai', [C_pegawai::class, 'updatePegawai'])->middleware('auth');
Route::get('/pegawai/hapus/{NIK_PEGAWAI}', [C_pegawai::class, 'hapus'])->middleware('auth');
Route::get('/pegawai/cetak_pegawai', [C_pegawai::class, 'cetak'])->middleware('auth');
Route::get('/pegawai/download/{NIK_PEGAWAI}', [C_pegawai::class, 'download'])->name('file.download')->middleware('auth');
Route::get('/pegawai/generate-docx/{NIK_PEGAWAI}', [C_pegawai::class, 'generateDocx']);

Route::get('/spt', [C_spt::class, 'index'])->middleware('auth');
Route::get('/spt/insert_spt', [C_spt::class, 'insertSpt'])->middleware('auth');
Route::post('/spt/tambah_spt', [C_spt::class, 'tambahSpt'])->middleware('auth');
Route::get('/spt/edit_spt/{ID_SPT}', [C_spt::class, 'editSpt'])->middleware('auth');
Route::post('/spt/update_spt', [C_spt::class, 'updateSpt'])->middleware('auth');
Route::get('/spt/hapus/{ID_SPT}', [C_spt::class, 'hapus'])->middleware('auth');
Route::get('/spt/cetak_spt', [C_spt::class, 'cetak'])->middleware('auth');
Route::get('/spt/download/{ID_SPT}', [C_spt::class, 'download'])->name('file.download')->middleware('auth');
Route::get('/spt/generate-docx/{ID_SPT}', [C_spt::class, 'generateDocx']);
Route::get('/spt/cari', [C_spt::class, 'cari'])->middleware('auth');
Route::get('/spt/export', [C_spt::class, 'export'])->middleware('auth');

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

Route::get('/punya_opd/insert_view_punya_opd/{id}', [C_punyaopd::class, 'insertOPD'])->middleware('auth');
Route::post('/punya_opd/insert_view_punya_opd', [C_punyaopd::class, 'tambahOPD'])->middleware('auth');
Route::get('/punya_opd/edit_punya_opd/{KODE_REKOMENDASI}', [C_punyaopd::class, 'editOPD'])->middleware('auth');
Route::post('/punya_opd/update_punya_opd', [C_punyaopd::class, 'updatOPD'])->middleware('auth');
Route::get('/punya_opd/hapus/{ID_REKOMENDASI}&{KODE_OPD}', [C_punyaopd::class, 'hapus'])->middleware('auth');

Route::get('/riwayat/insert_view_riwayat/{NIP_PEGAWAI}', [C_riwayat::class, 'insertRiwayat'])->middleware('auth');
Route::post('/riwayat/insert_view_riwayat', [C_riwayat::class, 'tambahRiwayat'])->middleware('auth');
Route::get('/riwayat/edit_riwayat/{NIP_PEGAWAI}', [C_riwayat::class, 'editRiwayat'])->middleware('auth');
Route::post('/riwayat/update_riwayat', [C_riwayat::class, 'updateRiwayat'])->middleware('auth');
Route::get('/riwayat/hapus/{id}&{NIP_PEGAWAI}', [C_riwayat::class, 'hapus'])->middleware('auth');

Route::get('/keluarga/insert_view_keluarga/{NIK_PEGAWAI}', [C_keluarga::class, 'insertKeluarga'])->middleware('auth');
Route::post('/keluarga/insert_view_keluarga', [C_keluarga::class, 'tambahKeluarga'])->middleware('auth');
Route::get('/keluarga/edit_keluarga/{NIK_PEGAWAI}', [C_keluarga::class, 'editKeluarga'])->middleware('auth');
Route::post('/keluarga/update_keluarga', [C_keluarga::class, 'updateKeluarga'])->middleware('auth');
Route::get('/keluarga/hapus/{ID_KELUARGA}&{NIK_PEGAWAI}', [C_keluarga::class, 'hapus'])->middleware('auth');

Route::get('/pendidikan/insert_view_pendidikan/{NIK_PEGAWAI}', [C_pendidikan::class, 'insertPendidikan'])->middleware('auth');
Route::post('/pendidikan/insert_view_pendidikan', [C_pendidikan::class, 'tambahPendidikan'])->middleware('auth');
Route::get('/pendidikan/edit_pendidikan/{NIK_PEGAWAI}', [C_pendidikan::class, 'editPendidikan'])->middleware('auth');
Route::post('/pendidikan/update_pendidikan', [C_pendidikan::class, 'updatePendidikan'])->middleware('auth');
Route::get('/pendidikan/hapus/{ID_PENDIDIKAN}&{NIK_PEGAWAI}', [C_pendidikan::class, 'hapus'])->middleware('auth');

Route::get('/jabatan/insert_view_jabatan/{NIK_PEGAWAI}', [C_jabatan::class, 'insertJabatan'])->middleware('auth');
Route::post('/jabatan/insert_view_jabatan', [C_jabatan::class, 'tambahJabatan'])->middleware('auth');
Route::get('/jabatan/edit_jabatan/{NIK_PEGAWAI}', [C_jabatan::class, 'editJabatan'])->middleware('auth');
Route::post('/jabatan/update_jabatan', [C_jabatan::class, 'updateJabatan'])->middleware('auth');
Route::get('/jabatan/hapus/{ID_JABATAN}&{NIK_PEGAWAI}', [C_jabatan::class, 'hapus'])->middleware('auth');

Route::get('/penugasan_spt', [C_penugasanspt::class, 'index'])->middleware('auth');
Route::get('/penugasan_spt/cari',[C_penugasanspt::class, 'cari'])->middleware('auth');
Route::get('/penugasan_spt/export', [C_penugasanspt::class, 'export'])->middleware('auth');

Route::get('/rekomendasi/insert_view_rekomendasi/{ID_TEMUAN}', [C_rekomendasi::class, 'insertRekomendasi'])->middleware('auth');
Route::post('/rekomendasi/insert_view_rekomendasi', [C_rekomendasi::class, 'tambahRekomendasi'])->middleware('auth');
Route::get('/rekomendasi/edit_rekomendasi/{id}', [C_rekomendasi::class, 'editRekomendasi'])->middleware('auth');
Route::post('/rekomendasi/update_rekomendasi', [C_rekomendasi::class, 'updateRekomendasi'])->middleware('auth');
Route::get('/rekomendasi/hapus/{id}&{ID_TEMUAN}', [C_rekomendasi::class, 'hapus'])->middleware('auth');

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

Route::get('/diklat/download/{ID_DIKLAT}', [C_diklat::class, 'download'])->name('file.download')->middleware('auth');


Route::get('/kenaikan_gaji/insert_view_kenaikan_gaji/{NIK_PEGAWAI}', [C_kenaikangaji::class, 'insertKenaikanGaji'])->middleware('auth');
Route::post('/kenaikan_gaji/insert_view_kenaikan_gaji', [C_kenaikangaji::class, 'tambahKenaikanGaji'])->middleware('auth');
Route::get('/kenaikan_gaji/edit_kenaikan_gaji/{NIK_PEGAWAI}', [C_kenaikangaji::class, 'editKenaikanGaji'])->middleware('auth');
Route::post('/kenaikan_gaji/update_kenaikan_gaji', [C_kenaikangaji::class, 'updateKenaikanGaji'])->middleware('auth');
Route::get('/kenaikan_gaji/hapus/{ID_KENAIKAN_GAJI}&{NIK_PEGAWAI}', [C_kenaikangaji::class, 'hapus'])->middleware('auth');

Route::get('/dupak', [C_dupak::class, 'index'])->middleware('auth');
Route::get('/dupak/cari', [C_dupak::class, 'cari'])->middleware('auth');
Route::get('/dupak/pengawasan/{id}', [C_dupak::class, 'pengawasan'])->middleware('auth');
Route::get('/dupak/pendidikan', [C_dupak::class, 'pendidikan'])->middleware('auth');
Route::get('/dupak/penunjang', [C_dupak::class, 'penunjang'])->middleware('auth');
Route::get('/dupak/pengembangan/{id}', [C_dupak::class, 'pengembangan'])->middleware('auth');
Route::get('/dupak/diklat/{id}', [C_dupak::class, 'diklat'])->middleware('auth');
Route::post('/dupak/tambah_pengawasan', [C_dupak::class, 'tambahPengawasan'])->middleware('auth');
Route::post('/dupak/tambah_pendidikan', [C_dupak::class, 'tambahPendidikan'])->middleware('auth');
Route::post('/dupak/tambah_penunjang', [C_dupak::class, 'tambahPenunjang'])->middleware('auth');
Route::post('/dupak/tambah_pengembangan', [C_dupak::class, 'tambahPengembangan'])->middleware('auth');
Route::post('/dupak/tambah_diklat', [C_dupak::class, 'tambahDiklat'])->middleware('auth');
Route::post('/dupak/tambah_dupak', [C_dupak::class, 'tambahDupak'])->middleware('auth');

Route::get('/dupak/cetak-lak', [C_generatepdf::class, 'cetakLAK'])->middleware('auth');
Route::get('/dupak/cetak-ak', [C_generatepdf::class, 'cetakAK'])->middleware('auth');

Route::get('/ppm', [C_ppm::class, 'index'])->middleware('auth');
Route::get('/ppm/insert_ppm', [C_ppm::class, 'insertPPM'])->middleware('auth');
Route::post('/ppm/tambah_ppm', [C_ppm::class, 'tambahPPM'])->middleware('auth');
Route::get('/ppm/edit_ppm/{id}', [C_ppm::class, 'editPPM'])->middleware('auth');
Route::post('/ppm/update_ppm', [C_ppm::class, 'updatePPM'])->middleware('auth');
Route::get('/ppm/hapus/{id}', [C_ppm::class, 'hapus'])->middleware('auth');

Route::get('/ppm_detail/insert_view_peserta/{id_ppm}', [C_ppm::class, 'insertPeserta'])->middleware('auth');
Route::post('/ppm_detail/insert_view_peserta', [C_ppm::class, 'tambahPeserta'])->middleware('auth');
Route::get('/ppm_detail/hapus/{id}&{id_ppm}', [C_ppm::class, 'hapusPeserta'])->middleware('auth');


