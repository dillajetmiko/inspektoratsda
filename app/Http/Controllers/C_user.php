<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_user extends Controller
{
    //
    public function index()
    {
        $user = DB::table('user')->get();
        $data = array(
            'menu' => 'user',
            'user' => $user,
            'submenu' => ''
        );

        return view('user/view_user',$data);
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

    public function hapus($NIP)
    {
    	DB::table('user')->where('NIP',$NIP)->delete();
	    return redirect('/user');
    }
}
