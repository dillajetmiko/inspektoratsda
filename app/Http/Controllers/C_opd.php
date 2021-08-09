<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_opd extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $opd = DB::table('opd')->get();

        $data = array(
            'menu' => 'opd',
            'nama' => $nama,
            'opd' => $opd,
            'submenu' => ''
        );

        return view('opd/view_opd',$data);
    }

    public function insertOPD()
    {
        $nama = Auth::user()->name;
        $opd = DB::table('opd')->get();

        $data = array(
            'menu' => 'opd',
            'nama' => $nama,
            'opd' => $opd,
            'submenu' => ''
        );

        return view('opd/insert_opd',$data); 
    }

    public function tambahOPD(Request $post)
    {  
        DB::table('opd')->insert([
            'KODE_OPD' => $post->KODE_OPD,
            'NAMA_OPD' => $post->NAMA_OPD,
        ]);

        return redirect('/opd');
    }

    public function editOPD($KODE_OPD) 
    {
        $nama = Auth::user()->name;
        $opd = DB::table('opd')->where('KODE_OPD', $KODE_OPD)->get();
        
        $data = array(
            'menu' => 'opd',
            'nama' => $nama,
            'opd' => $opd,
            'submenu' => ''
           
        );
        return view('opd/edit_opd',$data);
    }

    public function updateOPD(Request $post)
    {
        DB::table('opd')->where('KODE_OPD', $post->KODE_OPD)->update([
            'KODE_OPD' => $post->KODE_OPD,
            'NAMA_OPD' => $post->NAMA_OPD,
        ]);
        
        return redirect('/opd');
    }

    public function hapus($KODE_OPD)
    {
    	DB::table('opd')->where('KODE_OPD',$KODE_OPD)->delete();
	    return redirect('/opd');
    }
}
