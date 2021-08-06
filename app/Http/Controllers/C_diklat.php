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
        if($post->file('file')) { 
            // Validation
            $post->validate([
                'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
            ]); 

            $name = $post->file('file')->getClientOriginalName();

            // $path = $post->file('file')->store('public/files');  
            $path = $post->file('file')->storeAs('public/files',$post->NIK_PEGAWAI.$name);  
        }else{
            $path = null;
        }

        DB::table('diklat')->insert([
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'TANGGAL_DIKLAT' => $post->TANGGAL_DIKLAT, 
            'NAMA_DIKLAT' => $post->NAMA_DIKLAT, 
            'NAMA_DIKLAT' => $post->NAMA_DIKLAT, 
            'UPLOAD_SERTIFIKAT_DIKLAT' => $path, 
            
        ]);

        return redirect('/diklat/insert_view_diklat/'.$post->NIK_PEGAWAI);
    }

    public function download($ID_DIKLAT)
    {
        $diklat = DB::table('diklat')->where('ID_DIKLAT', $ID_DIKLAT)->get();
        // dd($diklat);
        // dd($diklat[0]);
        // $file = base64_decode($UPLOAD_FILE);
        $path=storage_path('app/'.$diklat[0]->UPLOAD_SERTIFIKAT_DIKLAT);
        return response()->download($path);
    }

    public function hapus($ID_DIKLAT, $NIK_PEGAWAI)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('diklat')->where('ID_DIKLAT',$ID_DIKLAT)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/diklat/insert_view_diklat/'.$NIK_PEGAWAI);
    }
}
