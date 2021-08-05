<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class C_temuan extends Controller
{
    //
    public function index()
    {
        $years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        $temuan = DB::table('temuan')->get();
        $id = DB::table('opd')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $rekomendasi = DB::table('rekomendasi')->get();
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'id' => $id,
            'punya_opd' => $punya_opd,
            'rekomendasi' => $rekomendasi,
            'years' => $years,
            'submenu' => ''
        );

        return view('temuan/view_temuan',$data);
    }

    public function cari(Request $request)
	{
		$years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        // menangkap data pencarian
		$jenis = $request->cari;
        $kode_opd = $request->KODE_OPD;
        $tahun = $request->year;

        // $temuan = DB::table('punya_opd')
        //                     ->leftJoin('temuan', 'temuan.KODE_TEMUAN', '=', 'punya_opd.KODE_TEMUAN')
        //                     ->where('punya_opd.KODE_OPD',$kode_opd);

        if ($kode_opd == 0 && $tahun == 0){
            $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->get();
        }elseif($jenis == 0 && $tahun == 0){
            $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->get();
        }elseif($jenis == 0 && $kode_opd == 0){
            $temuan = DB::table('temuan')->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        }elseif($jenis == 0){
            $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        }elseif($kode_opd == 0){
            $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        }elseif($tahun == 0){
            $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->get();
        }else{
            $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        }

        $id = DB::table('opd')->get();

        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'id' => $id,
            'punya_opd' => $punya_opd,
            'years' => $years,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('temuan/view_temuan',$data);
 
	}

    public function insertTemuan()
    {
        $temuan = DB::table('temuan')->get();
        $id = DB::table('opd')->get();
        $id2 = DB::table('lhp')->get();
        $id3 = DB::table('jenis_temuan')->get();

        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'id' => $id,
            'id2' => $id2,
            'id3' => $id3,
            'submenu' => ''
        );
        return view('temuan/insert_temuan',$data);
          
    }

    public function tambahTemuan(Request $post)
    {
        DB::table('temuan')->insert([
            'KODE_TEMUAN' => $post->KODE_TEMUAN,
            // 'NIP' => Auth::user()->NIP,
            'NOMOR_LHP' => $post->NOMOR_LHP,
            'URAIAN_TEMUAN' => $post->URAIAN_TEMUAN,
            'TANGGAL_TEMUAN' => $post->TANGGAL_TEMUAN,
            'KERUGIAN' => $post->KERUGIAN,
            'KODE_JENIS_TEMUAN' => $post->KODE_JENIS_TEMUAN,
           
        ]);

        // return redirect('/temuan');
        return redirect('/rekomendasi/insert_view_rekomendasi/'.$post->KODE_TEMUAN);
    }

      public function editTemuan($KODE_TEMUAN) 
    {
        $temuan = DB::table('temuan')->where('KODE_TEMUAN', $KODE_TEMUAN)->get();
        $id = DB::table('opd')->get();
        $id2 = DB::table('lhp')->get();
        $id3 = DB::table('jenis_temuan')->get();
    
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'id' => $id,
            'id2' => $id2,
            'id3' => $id3,
            'submenu' => ''
           
        );
        return view('temuan/edit_temuan',$data);
    }

    public function updateTemuan(Request $post)
    {
        // update tabel anggota
        DB::table('temuan')->where('KODE_TEMUAN', $post->KODE_TEMUAN)->update([
            'KODE_TEMUAN' => $post->KODE_TEMUAN,
            'NOMOR_LHP' => $post->NOMOR_LHP,
            'URAIAN_TEMUAN' => $post->URAIAN_TEMUAN,
            'TANGGAL_TEMUAN' => $post->TANGGAL_TEMUAN,
            'KERUGIAN' => $post->KERUGIAN,
            'KODE_JENIS_TEMUAN' => $post->KODE_JENIS_TEMUAN,
        ]);

        //kembali ke halaman data anggota
        return redirect('/temuan');
    }
    
    public function hapus($KODE_TEMUAN)
    {
    	DB::table('punya_opd')->where('KODE_TEMUAN',$KODE_TEMUAN)->delete();
        DB::table('temuan')->where('KODE_TEMUAN',$KODE_TEMUAN)->delete();
    	return redirect('/temuan');
    }
}
