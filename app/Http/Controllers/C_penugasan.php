<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_penugasan extends Controller
{
    //
    public function index()
    {
        $penugasan = DB::table('penugasan')->get();
        $data = array(
            'menu' => 'spt',
            'penugasan' => $penugasan,
            'submenu' => ''
        );

        return view('penugasan/insert_view_penugasan',$data);
    }

}
