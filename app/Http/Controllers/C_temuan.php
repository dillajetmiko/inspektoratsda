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
        $nama = Auth::user()->name;
        $temuan = DB::table('temuan')->get();
        $lhp = DB::table('lhp')->get();
        $id = DB::table('opd')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $kategori_temuan = DB::table('kategori_temuan')->get();
        $rekomendasi = DB::table('rekomendasi')->leftJoin('status','status.KODE_STATUS','=','rekomendasi.ID_STATUS')->get();
        $data = array(
            'menu' => 'temuan',
            'nama' => $nama,
            'temuan' => $temuan,
            'lhp' => $lhp,
            'id' => $id,
            'punya_opd' => $punya_opd,
            'kategori_temuan' => $kategori_temuan,
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

        $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->get();
        // if ($kode_opd == 0 && $tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->get();
        // }elseif($jenis == 0 && $tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->get();
        // }elseif($jenis == 0 && $kode_opd == 0){
        //     $temuan = DB::table('temuan')->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($jenis == 0){
        //     $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($kode_opd == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->get();
        // }else{
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }

        $nama = Auth::user()->name;
        $id = DB::table('opd')->get();
        $rekomendasi = DB::table('rekomendasi')->leftJoin('status','status.KODE_STATUS','=','rekomendasi.ID_STATUS')->get();

        $data = array(
            'menu' => 'temuan',
            'nama' => $nama,
            'temuan' => $temuan,
            'id' => $id,
            // 'punya_opd' => $punya_opd,
            'rekomendasi' => $rekomendasi,
            'years' => $years,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('temuan/view_temuan',$data);
 
	}

    public function insertTemuan()
    {
        $nama = Auth::user()->name;
        $temuan = DB::table('temuan')->get();
        $id = DB::table('opd')->get();
        $id2 = DB::table('lhp')->get();
        $id3 = DB::table('jenis_temuan')->get();
        $id4 = DB::table('kategori_temuan')->get();

        $data = array(
            'menu' => 'temuan',
            'nama' => $nama,
            'temuan' => $temuan,
            'id' => $id,
            'id2' => $id2,
            'id3' => $id3,
            'id4' => $id4,
            'submenu' => ''
        );
        return view('temuan/insert_temuan',$data);
          
    }

    public function tambahTemuan(Request $post)
    {
        $id = DB::table('temuan')->insertGetId([
            'ID_KATEGORI' => $post->ID_KATEGORI,
            // 'NIP' => Auth::user()->NIP,
            'ID_LHP' => $post->ID_LHP,
            'URAIAN_TEMUAN' => $post->URAIAN_TEMUAN,
            'KERUGIAN' => $post->KERUGIAN,
            'KODE_JENIS_TEMUAN' => $post->KODE_JENIS_TEMUAN,
           
        ]);

        // return redirect('/temuan');
        return redirect('/rekomendasi/insert_view_rekomendasi/'.$id);
    }

      public function editTemuan($id) 
    {
        $nama = Auth::user()->name;
        $temuan = DB::table('temuan')->where('id', $id)->get();
        $id = DB::table('opd')->get();
        $id2 = DB::table('lhp')->get();
        $id3 = DB::table('jenis_temuan')->get();
        $id4 = DB::table('kategori_temuan')->get();

    
        $data = array(
            'menu' => 'temuan',
            'nama' => $nama,
            'temuan' => $temuan,
            'id' => $id,
            'id2' => $id2,
            'id3' => $id3,
            'id4' => $id4,
            'submenu' => ''
           
        );
        return view('temuan/edit_temuan',$data);
    }

    public function updateTemuan(Request $post)
    {
        // update tabel anggota
        DB::table('temuan')->where('id', $post->id)->update([
            'ID_KATEGORI' => $post->ID_KATEGORI,
            'ID_LHP' => $post->ID_LHP,
            'URAIAN_TEMUAN' => $post->URAIAN_TEMUAN,
            'KERUGIAN' => $post->KERUGIAN,
            'KODE_JENIS_TEMUAN' => $post->KODE_JENIS_TEMUAN,
        ]);

        //kembali ke halaman data anggota
        return redirect('/temuan');
    }
    
    public function hapus($id)
    {
    	DB::table('punya_opd')->leftJoin('rekomendasi', 'rekomendasi.id', '=', 'punya_opd.ID_REKOMENDASI')
        ->where('rekomendasi.ID_TEMUAN',$id)->delete();
        DB::table('rekomendasi')->where('ID_TEMUAN',$id)->delete();
        DB::table('temuan')->where('id',$id)->delete();
    	return redirect('/temuan');
    }
}
