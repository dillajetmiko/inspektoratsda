<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_cetak extends Controller
{
    //
    public function index()
    {
        $cetak = [];
        $temuan = DB::table('temuan')->get();
        $lhp = DB::table('lhp')->get();
        $lhp2 = [];

        $data = array(
            'menu' => 'cetak',
            'cetak' => $cetak,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'submenu' => ''
        );

        return view('cetak/cetak',$data);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$cetak = DB::table('temuan')->where('NOMOR_LHP',$cari)->get();
        $id = DB::table('opd')->get();
        $lhp = DB::table('lhp')->get();
        $lhp2 = DB::table('lhp')->where('NOMOR_LHP',$cari)->get();

        $data = array(
            'menu' => 'cetak',
            'cetak' => $cetak,
            'id' => $id,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('cetak/cetak',$data);
 
	}
}
