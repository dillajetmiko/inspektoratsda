<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_punyaopd extends Controller
{
    //
    public function insertOPD($id) 
    {
        $nama = Auth::user()->name;
        $rekomendasi = DB::table('rekomendasi')->where('id', $id)->get();
        $punya_opd = DB::table('punya_opd')->where('ID_REKOMENDASI', $id)->get();
        $opd = DB::table('opd')->get();

        $data = array(
            'menu' => 'temuan',
            'nama' => $nama,
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
            'ID_REKOMENDASI' => $post->ID_REKOMENDASI,
            'KODE_OPD' => $post->KODE_OPD, 
            'NAMA_PEJABAT' => $post->NAMA_PEJABAT,
            'JABATAN_PEJABAT' => $post->JABATAN_PEJABAT,
            'NIP_PEJABAT' => $post->NIP_PEJABAT,
        ]);

        return redirect('/punya_opd/insert_view_punya_opd/'.$post->ID_REKOMENDASI);
    }
  
    public function hapus($ID_REKOMENDASI,$KODE_OPD)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('punya_opd')->where('ID_REKOMENDASI',$ID_REKOMENDASI)->where('KODE_OPD',$KODE_OPD)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/punya_opd/insert_view_punya_opd/'.$ID_REKOMENDASI);
    }

}

