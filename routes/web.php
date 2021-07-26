<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_lhp;
use App\Http\Controllers\C_temuan;
use App\Http\Controllers\C_dashboard;
use App\Http\Controllers\C_login;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_cetak;
use App\Http\Controllers\C_register;



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

