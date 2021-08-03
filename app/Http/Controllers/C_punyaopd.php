<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_punyaopd extends Controller
{
    //
    public function insertOPD($KODE_TEMUAN) 
    {
        $temuan = DB::table('temuan')->where('KODE_TEMUAN', $KODE_TEMUAN)->get();
        $punya_opd = DB::table('punya_opd')->where('KODE_TEMUAN', $KODE_TEMUAN)->get();
        $opd = DB::table('opd')->get();

        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'punya_opd' => $punya_opd,
            'opd' => $opd,
            'submenu' => ''
           
        );
        return view('punya_opd/insert_view_punya_opd',$data);
    }

    public function tambahOPD(Request $post)
    {
        DB::table('punya_opd')->insert([
            'KODE_TEMUAN' => $post->KODE_TEMUAN,
            'KODE_OPD' => $post->KODE_OPD, 
        ]);

        return redirect('/punya_opd/insert_view_punya_opd/'.$post->KODE_TEMUAN);
    }

    public function hapus($KODE_TEMUAN,$KODE_OPD)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('punya_opd')->where('KODE_TEMUAN',$KODE_TEMUAN)->where('KODE_OPD',$KODE_OPD)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/punya_opd/insert_view_punya_opd/'.$KODE_TEMUAN);
    }

}

