<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_temuan extends Controller
{
    //
    public function index()
    {
        $temuan = DB::table('temuan')->get();
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'submenu' => ''
        );

        return view('temuan/view_temuan',$data);
    }

    public function insertTemuan()
    {
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'submenu' => ''
        );
        return view('temuan/insert_temuan');
        //return view('tambah_bahasa');     
    }
<<<<<<< Updated upstream
=======

    public function tambahTemuan(Request $post)
    {
        DB::table('temuan')->insert([
            'kode_temuan' => $post->kode_temuan,
            'uraian_temuan' => $post->uraian_temuan,
            'rekomendasi' => $post->rekomendasi,
            'nama_opd' => $post->nama_opd,
            'nama_pejabat' => $post->nama_pejabat,
            'tanggal_temuan' => $post->tanggal_temuan,
            'tanggal_tindak_lanjut' => $post->tanggal_tindak_lanjut,
            'nomor_lhp' => $post->nomor_lhp,
            'kerugian' => $post->kerugian,
            'status' => $post->status,
            'hasil_telaah' => $post->hasil_telaah,
            'kode_jenis_temuan' => $post->kode_jenis_temuan
        ]);

        return redirect('/temuan');
    }   
>>>>>>> Stashed changes
}
