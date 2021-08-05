<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class C_dashboard extends Controller
{
    //
    public function index()
    {
        $nama = Auth::user()->NIP;
        // $anggota = DB::table('anggota')->get();
        $data = array(
            'menu' => 'dashboard',
            // 'nama' => $nama,
            'submenu' => ''
        );

        return view('dashboard',$data);
    }
}
