<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_rekomendasi extends Controller
{
    public function insertRekomendasi($KODE_TEMUAN) 
    {
        $temuan = DB::table('temuan')->where('KODE_TEMUAN', $KODE_TEMUAN)->get();
        $rekomendasi = DB::table('rekomendasi')->where('ID_TEMUAN', $KODE_TEMUAN)->get();
        $status = DB::table('status')->get();

        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'rekomendasi' => $rekomendasi,
            'status' => $status,
            'submenu' => ''
           
        );
        return view('rekomendasi/insert_view_rekomendasi',$data);
    }

    public function tambahRekomendasi(Request $post)
    {
        DB::table('rekomendasi')->insert([
            'ID_TEMUAN' => $post->ID_TEMUAN,
            'ID_STATUS' => $post->ID_STATUS,
            'KODE_REKOMENDASI' => $post->KODE_REKOMENDASI,
            'URAIAN_REKOMENDASI' => $post->URAIAN_REKOMENDASI,
            'URAIAN_TINDAK_LANJUT' => $post->URAIAN_TINDAK_LANJUT,
            'TANGGAL_TINDAK_LANJUT' => $post->TANGGAL_TINDAK_LANJUT,        
            'HASIL_TELAAH_TINDAK_LANJUT' => $post->HASIL_TELAAH_TINDAK_LANJUT,
        ]);

        return redirect('/rekomendasi/insert_view_rekomendasi/'.$post->ID_TEMUAN);
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

    public function hapus($id,$id_spt)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('penugasan')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/penugasan/insert_view_penugasan/'.$id_spt);
    }
}
