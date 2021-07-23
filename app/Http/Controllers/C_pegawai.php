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
            'NAMA_PEGAWAI' => $post->NAMA_PEGAWAI,
            'TTL_PEGAWAI' => $post->TTL_PEGAWAI,
            'ALAMAT_PEGAWAI' => $post->ALAMAT_PEGAWAI,
            'NO_HP' => $post->NO_HP,
            'JABATAN_PEGAWAI' => $post->JABATAN_PEGAWAI,
            'PANGKAT_PEGAWAI' => $post->PANGKAT_PEGAWAI,
            'UNIT_KERJA_PEGAWAI' => $post->UNIT_KERJA_PEGAWAI,
        ]);

        return redirect('/pegawai');
    }

    public function editPegawai($NIP_PEGAWAI) 
    {
        $pegawai = DB::table('pegawai')->where('NIP_PEGAWAI', $NIP_PEGAWAI)->get();

        $data = array(
            'menu' => 'pegawai',
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('pegawai/edit_pegawai',$data);
    }

    public function updatePegawai(Request $post)
    {
        DB::table('pegawai')->where('NIP_PEGAWAI', $post->NIP_PEGAWAI)->update([
            'NIP_PEGAWAI' => $post->NIP_PEGAWAI,
            'NAMA_PEGAWAI' => $post->NAMA_PEGAWAI,
            'TTL_PEGAWAI' => $post->TTL_PEGAWAI,
            'ALAMAT_PEGAWAI' => $post->ALAMAT_PEGAWAI,
            'NO_HP' => $post->NO_HP,
            'JABATAN_PEGAWAI' => $post->JABATAN_PEGAWAI,
            'PANGKAT_PEGAWAI' => $post->PANGKAT_PEGAWAI,
            'UNIT_KERJA_PEGAWAI' => $post->UNIT_KERJA_PEGAWAI,
        ]);

        return redirect('/pegawai');
    }

    public function hapus($NIP_PEGAWAI)
    {
    	DB::table('pegawai')->where('NIP_PEGAWAI',$NIP_PEGAWAI)->delete();
	    return redirect('/pegawai');
    }
}
