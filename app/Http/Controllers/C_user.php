<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_user extends Controller
{
    //
    public function index()
    {
        // $anggota = DB::table('anggota')->get();
        // $data = array(
        //     'menu' => 'data_master',
        //     'submenu' => 'anggota',
        //     'anggota' => $anggota
        // );

        return view('user/view_user');
    }

    public function insertUser()
    {
        // $data = array(
        //     'menu' => 'data_master',
        //     'submenu' => 'bahasa'
        // );
        return view('user/insert_user');
        //return view('tambah_bahasa');     
    }
}
