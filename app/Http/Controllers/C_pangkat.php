<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class C_pangkat extends Controller
{
    //
    public function insertPangkat($NIK_PEGAWAI) 
    {
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();

        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'pangkat' => $pangkat,
            'submenu' => ''
           
        );
        return view('pangkat/insert_view_pangkat',$data);
    }

    public function tambahPangkat(Request $post)
    {
        DB::table('pangkat')->insert([
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'TMT_PANGKAT' => $post->TMT_PANGKAT, 
            'NAMA_PANGKAT' => $post->NAMA_PANGKAT, 
        ]);

        return redirect('/pangkat/insert_view_pangkat/'.$post->NIK_PEGAWAI);
    }

    public function hapus($ID_PANGKAT, $NIK_PEGAWAI)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('pangkat')->where('ID_PANGKAT',$ID_PANGKAT)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/pangkat/insert_view_pangkat/'.$NIK_PEGAWAI);
    }
}
