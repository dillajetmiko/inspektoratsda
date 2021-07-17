<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_lhp extends Controller
{
    //
    public function index()
    {
        $lhp = DB::table('lhp')->get();
        $data = array(
            'menu' => 'LHP',
            'lhp' => $lhp,
            'submenu' => ''
        );

        return view('LHP/view_lhp',$data);
    }

    public function insertLHP()
    {
        $lhp = DB::table('lhp')->get();
        $data = array(
            'menu' => 'lhp',
            'lhp' => $lhp,
            'submenu' => ''
        );

        return view('LHP/insert_lhp',$data); 
    }

    public function tambahLHP(Request $post)
    {
        DB::table('lhp')->insert([
            'NOMOR_LHP' => $post->NOMOR_LHP,
            'NIP' => '1',
            'TANGGAL_LHP' => $post->TANGGAL_LHP,
            'JUDUL_PEMERIKSAAN' => $post->JUDUL_PEMERIKSAAN,
            'ANGGARAN' => $post->ANGGARAN,
        ]);

        return redirect('/lhp');
    }
    
}
