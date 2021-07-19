<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_lhp;
use App\Http\Controllers\C_temuan;
use App\Http\Controllers\C_dashboard;
use App\Http\Controllers\C_login;
use App\Http\Controllers\C_user;
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
Route::post('/postLogin', 'C_login@postLogin');

Route::get('/dashboard', [C_dashboard::class, 'index']);

Route::get('/lhp', [C_lhp::class, 'index']);
Route::get('/lhp/insert_lhp', [C_lhp::class, 'insertLHP']);
Route::post('/lhp/tambah_lhp', [C_lhp::class, 'tambahLHP']);
Route::get('/lhp/edit_lhp/{NOMOR_LHP}', [C_lhp::class, 'editLHP']);
Route::post('/lhp/update_lhp', [C_lhp::class, 'updateLHP']);
Route::get('/lhp/hapus/{NOMOR_LHP}', [C_lhp::class, 'hapus']);

Route::get('/temuan', [C_temuan::class, 'index']);
Route::get('/temuan/insert_temuan', [C_temuan::class, 'insertTemuan']);
Route::post('/temuan/tambah_temuan', [C_temuan::class, 'tambahTemuan']);
Route::get('/temuan/edit_temuan/{KODE_TEMUAN}', [C_temuan::class, 'editTemuan']);
Route::post('/temuan/update_temuan', [C_temuan::class, 'updateTemuan']);
Route::get('/temuan/hapus/{KODE_TEMUAN}', [C_temuan::class, 'hapus']);

Route::get('/user', [C_user::class, 'index']);
Route::get('/user/insert_user', [C_user::class, 'insertUser']);
Route::post('/user/tambah_user', [C_user::class, 'tambahUser']);
Route::get('/user/edit_user/{NIP}', [C_user::class, 'editUser']);
Route::post('/user/update_user', [C_user::class, 'updateUser']);
Route::get('/user/hapus/{NIP}', [C_user::class, 'hapus']);

Route::get('/cetak', [C_cetak::class, 'index']);

