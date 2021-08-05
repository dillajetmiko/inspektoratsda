<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_diklat extends Controller
{
    //
    public function insertDiklat($NIK_PEGAWAI) 
    {
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
        $diklat = DB::table('diklat')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();

        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'diklat' => $diklat,
            'submenu' => ''
           
        );
        return view('diklat/insert_view_diklat',$data);
    }

    public function tambahDiklat(Request $post)
    {
        DB::table('diklat')->insert([
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'TANGGAL_DIKLAT' => $post->TANGGAL_DIKLAT, 
            'NAMA_DIKLAT' => $post->NAMA_DIKLAT, 
            'NAMA_DIKLAT' => $post->NAMA_DIKLAT, 
            'UPLOAD_SERTIFIKAT_DIKLAT' => $post->UPLOAD_SERTIFIKAT_DIKLAT, 
            
        ]);

        return redirect('/diklat/insert_view_diklat/'.$post->NIK_PEGAWAI);
    }

    public function hapus($NIK_PEGAWAI)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('diklat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/diklat/insert_view_diklat/'.$NIK_PEGAWAI);
    }
}
