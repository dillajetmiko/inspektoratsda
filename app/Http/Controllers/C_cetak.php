<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\TemuanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class C_cetak extends Controller
{
    //
    public function index()
    {
        $nama = Auth::user()->name;
        $cetak = [];
        $temuan = DB::table('temuan')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $rekomendasi = DB::table('rekomendasi')->get();
        $lhp2 = [];

        $data = array(
            'menu' => 'cetak',
            'nama' => $nama,
            'cetak' => $cetak,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'rekomendasi' => $rekomendasi,
            'submenu' => ''
        );

        return view('cetak/cetak',$data);
    }

    public function cari(Request $request)
	{
		$nama = Auth::user()->name;
        // menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$cetak = DB::table('temuan')->where('ID_LHP',$cari)->get();
        $id = DB::table('opd')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $rekomendasi = DB::table('rekomendasi')->get();
        $lhp2 = DB::table('lhp')->where('id',$cari)->get();

        $data = array(
            'menu' => 'cetak',
            'nama' => $nama,
            'cetak' => $cetak,
            'id' => $id,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'rekomendasi' => $rekomendasi,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('cetak/cetak',$data);
 
	}

    public function export($id)
	{
		$nama = Auth::user()->name;
        // menangkap data pencarian
		$cari = $id;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$cetak = DB::table('temuan')->where('ID_LHP',$cari)->get();
        $id = DB::table('opd')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $lhp2 = DB::table('lhp')->where('id',$cari)->get();

        $data = array(
            'menu' => 'cetak',
            'nama' => $nama,
            'cetak' => $cetak,
            'id' => $id,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('cetak/export',$data);
 
	}

    public function export1()
    {
        $nama = Auth::user()->name;
        $cetak = [];
        $temuan = DB::table('temuan')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $lhp2 = [];

        $data = array(
            'menu' => 'cetak',
            'nama' => $nama,
            'cetak' => $cetak,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'submenu' => ''
        );

        return view('cetak/export',$data);
    }

    public function exportExcel($id) 
    {
        return Excel::download(new TemuanExport($id), 'temuan.xlsx');
    }
}
