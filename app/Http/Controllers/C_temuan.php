<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_temuan extends Controller
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

        return view('temuan/view_temuan');
    }

    public function insertTemuan()
    {
        // $data = array(
        //     'menu' => 'data_master',
        //     'submenu' => 'bahasa'
        // );
        return view('temuan/insert_temuan');
        //return view('tambah_bahasa');     
    }
}
