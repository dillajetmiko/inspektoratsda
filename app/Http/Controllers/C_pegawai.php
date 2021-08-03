<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_pegawai extends Controller
{
    //
    public function index()
    {
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'submenu' => ''
        );

        return view('pegawai/view_pegawai',$data);
    }

    public function insertPegawai()
    {
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'submenu' => ''
        );

        return view('pegawai/insert_pegawai',$data); 
    }

    public function tambahPegawai(Request $post)
    {  
        DB::table('pegawai')->insert([
            'NIP_PEGAWAI' => $post->NIP_PEGAWAI,
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'NAMA_PEGAWAI' => $post->NAMA_PEGAWAI,
            'ALAMAT_PEGAWAI' => $post->ALAMAT_PEGAWAI,
            'TTL_PEGAWAI' => $post->TTL_PEGAWAI,
            'NO_KARTU_PEGAWAI' => $post->NO_KARTU_PEGAWAI,
            'NO_KARTU_SUAMI_ISTRI' => $post->NO_KARTU_SUAMI_ISTRI,
            'NO_TASPEN' => $post->NO_TASPEN,
            'NO_HP' => $post->NO_HP,
            'KELUARGA' => $post->KELUARGA,
            'UNIT_KERJA_PEGAWAI' => $post->UNIT_KERJA_PEGAWAI,
        ]);

        // return redirect('/pegawai');
        return redirect('/riwayat/insert_view_riwayat/'.$post->NIK_PEGAWAI);
    }

    public function editPegawai($NIK_PEGAWAI) 
    {
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();

        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('pegawai/edit_pegawai',$data);
    }

    public function updatePegawai(Request $post)
    {
        DB::table('pegawai')->where('NIK_PEGAWAI', $post->NIK_PEGAWAI)->update([     
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'NAMA_PEGAWAI' => $post->NAMA_PEGAWAI,
            'ALAMAT_PEGAWAI' => $post->ALAMAT_PEGAWAI,
            'TTL_PEGAWAI' => $post->TTL_PEGAWAI,
            'NIP_PEGAWAI' => $post->NIP_PEGAWAI,
            'NO_KARTU_PEGAWAI' => $post->NO_KARTU_PEGAWAI,
            'NO_KARTU_SUAMI_ISTRI' => $post->NO_KARTU_SUAMI_ISTRI,
            'NO_TASPEN' => $post->NO_TASPEN,
            'NO_HP' => $post->NO_HP,
            'KELUARGA' => $post->KELUARGA,
            'UNIT_KERJA_PEGAWAI' => $post->UNIT_KERJA_PEGAWAI,
        ]);

        return redirect('/pegawai');
    }

    public function hapus($NIK_PEGAWAI)
    {
    	DB::table('pegawai')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
	    return redirect('/pegawai');
    }
}
