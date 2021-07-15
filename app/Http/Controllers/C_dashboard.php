<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_dashboard extends Controller
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

        return view('dashboard');
    }
}
