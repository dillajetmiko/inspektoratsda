<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_kenaikangaji extends Controller
{
    //
    public function insertKenaikanGaji($NIK_PEGAWAI) 
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $kenaikan_gaji = DB::table('kenaikan_gaji')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();

        $data = array(
            'menu' => 'pegawai',
            'nama' => $nama,
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
            'MASA_KERJA' => $post->MASA_KERJA, 
            'MASA_KERJA_KESELURUHAN' => $post->MASA_KERJA_KESELURUHAN, 
            
        ]);

        return redirect('/kenaikan_gaji/insert_view_kenaikan_gaji/'.$post->NIK_PEGAWAI);
    }

    public function hapus($ID_KENAIKAN_GAJI,$NIK_PEGAWAI)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('kenaikan_gaji')->where('ID_KENAIKAN_GAJI',$ID_KENAIKAN_GAJI)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/kenaikan_gaji/insert_view_kenaikan_gaji/'.$NIK_PEGAWAI);
    }
}
