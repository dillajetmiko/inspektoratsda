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
        $temuan = DB::table('temuan')->get();
        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'submenu' => ''
        );
        return view('temuan/insert_temuan',$data);
    }
    // public function tambahTemuan(Request $post)
    // {
    //     DB::table('temuan')->insert([
    //         'NOMOR_LHP' => $post->NOMOR_LHP,
    //         'NIP' => '1',
    //         'TANGGAL_LHP' => $post->TANGGAL_LHP,
    //         'JUDUL_PEMERIKSAAN' => $post->JUDUL_PEMERIKSAAN,
    //         'ANGGARAN' => $post->ANGGARAN,
    //     ]);

    //     return redirect('/temuan');
    // }
    
}
