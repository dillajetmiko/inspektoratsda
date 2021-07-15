<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_lhp;
use App\Http\Controllers\C_temuan;
use App\Http\Controllers\C_dashboard;


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

Route::get('/dashboard', [C_dashboard::class, 'index']);

Route::get('/lhp', [C_lhp::class, 'index']);
Route::get('/lhp/insert_lhp', [C_lhp::class, 'insertLHP']);

Route::get('/temuan', [C_temuan::class, 'index']);
Route::get('/temuan/insert_temuan', [C_temuan::class, 'inserttemuan']);

