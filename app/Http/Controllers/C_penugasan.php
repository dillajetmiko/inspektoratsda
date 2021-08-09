<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_penugasan extends Controller
{
    public function insertPenugasan($ID_SPT) 
    {
        $nama = Auth::user()->name;
        $spt = DB::table('spt')->where('id', $ID_SPT)->get();
        $penugasan = DB::table('penugasan')->where('id_spt', $ID_SPT)->get();
        $pegawai = DB::table('pegawai')->get();
        $tugas = DB::table('tugas')->get();

        $data = array(
            'menu' => 'spt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'pegawai' => $pegawai,
            'tugas' => $tugas,
            'submenu' => ''
           
        );
        return view('penugasan/insert_view_penugasan',$data);
    }

    public function tambahPenugasan(Request $post)
    {
        DB::table('penugasan')->insert([
            'id_spt' => $post->ID_SPT,
            'ID_TUGAS' => $post->ID_TUGAS,        
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
        ]);

        return redirect('/penugasan/insert_view_penugasan/'.$post->ID_SPT);
    }

    public function hapus($id,$id_spt)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('penugasan')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/penugasan/insert_view_penugasan/'.$id_spt);
    }

}
