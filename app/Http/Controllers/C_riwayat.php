<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_riwayat extends Controller
{
    //
    public function insertRiwayat($NIK_PEGAWAI) 
    {
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $riwayat = DB::table('riwayat')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
       
        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'riwayat' => $riwayat,
            'submenu' => ''
           
        );
        return view('riwayat/insert_view_riwayat',$data);
    }

    public function tambahRiwayat(Request $post)
    {
        DB::table('riwayat')->insert([
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'riwayat_pangkat' => $post->riwayat_pangkat,
            'riwayat_jabatan' => $post->riwayat_jabatan,
            'riwayat_pendidikan' => $post->riwayat_pendidikan,
            'riwayat_diklat' => $post->riwayat_diklat,
            

                                  
        ]);

        return redirect('/riwayat/insert_view_riwayat/'.$post->NIK_PEGAWAI);
    }

    public function hapus($id, $NIK_PEGAWAI)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('riwayat')->where('id',$id)->delete();
      
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/riwayat/insert_view_riwayat/'.$NIK_PEGAWAI);
    }

}
