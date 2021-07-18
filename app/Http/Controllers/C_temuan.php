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
        $id = DB::table('opd')->get();
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'id' => $id,
            'submenu' => ''
        );

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
            'NIP' => '1',
            'NOMOR_LHP' => $post->NOMOR_LHP,
            'URAIAN_TEMUAN' => $post->URAIAN_TEMUAN,
            'KODE_REKOMENDASI' => $post->KODE_REKOMENDASI,
            'URAIAN_REKOMENDASI' => $post->URAIAN_REKOMENDASI,
            'URAIAN_TINDAK_LANJUT' => $post->URAIAN_TINDAK_LANJUT,
            'KODE_STATUS' => $post->KODE_STATUS,
            'JENIS_PENGAWASAN' => $post->JENIS_PENGAWASAN,
            'KODE_OPD' => $post->KODE_OPD,
            'NAMA_PEJABAT' => $post->NAMA_PEJABAT,
            'TANGGAL_TEMUAN' => $post->TANGGAL_TEMUAN,
            'TANGGAL_TINDAK_LANJUT' => $post->TANGGAL_TINDAK_LANJUT,
            'KERUGIAN' => $post->KERUGIAN,
            'KODE_JENIS_TEMUAN' => $post->KODE_JENIS_TEMUAN,
            'HASIL_TELAAH' => $post->HASIL_TELAAH
           
        ]);

        return redirect('/temuan');
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
            'NIP' => '1',
            'NOMOR_LHP' => $post->NOMOR_LHP,
            'URAIAN_TEMUAN' => $post->URAIAN_TEMUAN,
            'KODE_REKOMENDASI' => $post->KODE_REKOMENDASI,
            'URAIAN_REKOMENDASI' => $post->URAIAN_REKOMENDASI,
            'URAIAN_TINDAK_LANJUT' => $post->URAIAN_TINDAK_LANJUT,
            'KODE_STATUS' => $post->KODE_STATUS,
            'JENIS_PENGAWASAN' => $post->JENIS_PENGAWASAN,
            'KODE_OPD' => $post->KODE_OPD,
            'NAMA_PEJABAT' => $post->NAMA_PEJABAT,
            'TANGGAL_TEMUAN' => $post->TANGGAL_TEMUAN,
            'TANGGAL_TINDAK_LANJUT' => $post->TANGGAL_TINDAK_LANJUT,
            'KERUGIAN' => $post->KERUGIAN,
            'KODE_JENIS_TEMUAN' => $post->KODE_JENIS_TEMUAN,
            'HASIL_TELAAH' => $post->HASIL_TELAAH
        ]);

        //kembali ke halaman data anggota
        return redirect('/temuan');
    }
    
    public function hapus($KODE_TEMUAN)
    {
    	DB::table('temuan')->where('KODE_TEMUAN',$KODE_TEMUAN)->delete();
	    return redirect('/temuan');
    }

}