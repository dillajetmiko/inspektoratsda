<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_lhp extends Controller
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

        return view('LHP/view_lhp');
    }

    public function insertLHP()
    {
        // $data = array(
        //     'menu' => 'data_master',
        //     'submenu' => 'bahasa'
        // );
        return view('LHP/insert_lhp');
        //return view('tambah_bahasa');     
    }
}
