<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_temuan extends Controller
{
    //
    public function index()
    {
        $temuan = DB::table('temuan')->get();
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'submenu' => ''
        );

        return view('temuan/view_temuan',$data);
    }

    public function insertTemuan()
    {
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'submenu' => ''
        );
        return view('temuan/insert_temuan');
        //return view('tambah_bahasa');     
    }
}
