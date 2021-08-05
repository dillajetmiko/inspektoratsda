<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_kenaikangaji extends Controller
{
    //
    public function insertKenaikanGaji($NIK_PEGAWAI) 
    {
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $kenaikan_gaji = DB::table('kenaikan_gaji')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $pangkat = DB::table('pangkat')->get();

        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'kenaikan_gaji' => $kenaikan_gaji,
            'pangkat' => $pangkat,
            'submenu' => ''
           
        );
        return view('kenaikan_gaji/insert_view_kenaikan_gaji',$data);
    }

    public function tambahKenaikanGaji(Request $post)
    {
        DB::table('kenaikan_gaji')->insert([
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'TMT_KENAIKAN_GAJI' => $post->TMT_KENAIKAN_GAJI, 
            'NOMINAL_GAJI' => $post->NOMINAL_GAJI, 
            'ID_PANGKAT' => $post->ID_PANGKAT, 
            'NAMA_GOLONGAN' => $post->NAMA_GOLONGAN, 
            'MASA_KERJA' => $post->MASA_KERJA, 
            
        ]);

        return redirect('/kenaikan_gaji/insert_view_kenaikan_gaji/'.$post->NIK_PEGAWAI);
    }

    public function hapus($NIK_PEGAWAI)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('kenaikan_gaji')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/kenaikan_gaji/insert_view_kenaikan_gaji/'.$NIK_PEGAWAI);
    }
}
