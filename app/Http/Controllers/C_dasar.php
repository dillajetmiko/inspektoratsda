<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_dasar extends Controller
{
    public function insertDasar($ID_SPT) 
    {
        $nama = Auth::user()->name;
        $spt = DB::table('spt')->where('id', $ID_SPT)->get();
        $dasar = DB::table('dasar')->where('id_spt', $ID_SPT)->get();

        $data = array(
            'menu' => 'spt',
            'nama' => $nama,
            'spt' => $spt,
            'dasar' => $dasar,
            'submenu' => ''
           
        );
        return view('dasar/insert_view_dasar',$data);
    }

    public function tambahDasar(Request $post)
    {
        DB::table('dasar')->insert([
            'id_spt' => $post->ID_SPT,
            'uraian_dasar' => $post->uraian_dasar, 
        ]);

        return redirect('/dasar/insert_view_dasar/'.$post->ID_SPT);
    }

    public function hapus($id,$id_spt)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('dasar')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/dasar/insert_view_dasar/'.$id_spt);
    }

}
