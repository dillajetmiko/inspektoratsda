<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_punyaopd extends Controller
{
    //
    public function insertOPD($KODE_REKOMENDASI) 
    {
        $rekomendasi = DB::table('rekomendasi')->where('KODE_REKOMENDASI', $KODE_REKOMENDASI)->get();
        $punya_opd = DB::table('punya_opd')->where('KODE_REKOMENDASI', $KODE_REKOMENDASI)->get();
        $opd = DB::table('opd')->get();

        $data = array(
            'menu' => 'temuan',
            'rekomendasi' => $rekomendasi,
            'punya_opd' => $punya_opd,
            'opd' => $opd,
            'submenu' => ''
           
        );
        return view('punya_opd/insert_view_punya_opd',$data);
    }

    public function tambahOPD(Request $post)
    {
        DB::table('punya_opd')->insert([
            'KODE_REKOMENDASI' => $post->KODE_REKOMENDASI,
            'KODE_OPD' => $post->KODE_OPD, 
            'NAMA_PEJABAT' => $post->NAMA_PEJABAT,
            'JABATAN_PEJABAT' => $post->JABATAN_PEJABAT,
            'NIP_PEJABAT' => $post->NIP_PEJABAT,
        ]);

        return redirect('/punya_opd/insert_view_punya_opd/'.$post->KODE_REKOMENDASI);
    }

    public function hapus($KODE_TEMUAN,$KODE_OPD)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('punya_opd')->where('KODE_TEMUAN',$KODE_TEMUAN)->where('KODE_OPD',$KODE_OPD)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/punya_opd/insert_view_punya_opd/'.$KODE_TEMUAN);
    }

}

