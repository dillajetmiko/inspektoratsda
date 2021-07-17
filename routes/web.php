<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_lhp;
use App\Http\Controllers\C_temuan;
use App\Http\Controllers\C_dashboard;
use App\Http\Controllers\C_login;
use App\Http\Controllers\C_user;



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
    return view('dashboard');
});

Route::get('/login', [C_login::class, 'getLogin']);
Route::post('/postLogin', 'C_login@postLogin');

Route::get('/dashboard', [C_dashboard::class, 'index']);

Route::get('/lhp', [C_lhp::class, 'index']);
Route::get('/lhp/insert_lhp', [C_lhp::class, 'insertLHP']);
Route::post('/lhp/tambah_lhp', [C_lhp::class, 'tambahLHP']);
Route::post('/lhp/edit_lhp/{NOMOR_LHP}', [C_lhp::class, 'editLHP']);
Route::post('/lhp/update_lhp', [C_lhp::class, 'updateLHP']);
Route::post('/lhp/hapus/{NOMOR_LHP}', [C_lhp::class, 'hapus']);

Route::get('/temuan', [C_temuan::class, 'index']);
Route::get('/temuan/insert_temuan', [C_temuan::class, 'insertTemuan']);

Route::get('/user', [C_user::class, 'index']);
Route::get('/user/insert_user', [C_user::class, 'insertUser']);

