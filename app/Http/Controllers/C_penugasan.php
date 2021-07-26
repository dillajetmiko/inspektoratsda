<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_penugasan extends Controller
{
    public function insertPenugasan($ID_SPT) 
    {
        $spt = DB::table('spt')->where('ID_SPT', $ID_SPT)->get();
        $penugasan = DB::table('penugasan')->where('ID_SPT', $ID_SPT)->get();
        $pegawai = DB::table('pegawai')->get();

        $data = array(
            'menu' => 'spt',
            'spt' => $spt,
            'penugasan' => $penugasan,
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('penugasan/insert_view_penugasan',$data);
    }

    public function tambahPenugasan(Request $post)
    {
        DB::table('penugasan')->insert([
            'ID_SPT' => $post->ID_SPT,
            'NIP_PEGAWAI' => $post->NIP_PEGAWAI,
            'PENUGASAN' => $post->PENUGASAN,        
        ]);

        return redirect('/penugasan/insert_view_penugasan/'.$post->ID_SPT);
    }

    public function editDetailpeminjaman($id_peminjaman,$kode_buku)
    {
        $detailpeminjaman = DB::table('detail_peminjaman')->where('id_peminjaman', $id_peminjaman)->where('kode_buku',$kode_buku)->get();
        //return view('edit_detailpeminjaman',['detailpeminjaman' => $detailpeminjaman]);

        $data = array(
            'menu' => 'Peminjaman',
            'detailpeminjaman' => $detailpeminjaman,
            'submenu' => '',
        );
        return view('detailpeminjaman/edit_detailpeminjaman',$data);
    }

    public function updateDetailpeminjaman(Request $post)
    {
        // update tabel detailpeminjaman
        DB::table('detail_peminjaman')->where('id_peminjaman', $post->id_peminjaman)->where('kode_buku',$post->kode_buku)->update([
            'status_peminjaman' => $post->status_peminjaman,
            'denda_perbuku' => $post->denda_perbuku,
            'tanggal_haruskembali' => $post->tanggal_haruskembali,
            'tanggal_kembali' => $post->tanggal_kembali,
            'perpanjangan' => $post->perpanjangan,
            'status_verifikasi' => $post->status_verifikasi,
        ]);

        //kembali ke halaman data detailpeminjaman
        return redirect('/lihatdetailpeminjaman/'.$post->id_peminjaman);
    }

}
