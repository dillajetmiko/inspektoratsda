<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_cetak extends Controller
{
    //
    public function index()
    {
        $cetak = DB::table('temuan')->get();
        $id = DB::table('opd')->get();

        $data = array(
            'menu' => 'cetak',
            'cetak' => $cetak,
            'id' => $id,
            'submenu' => ''
        );

        return view('cetak/cetak',$data);
    }
}
