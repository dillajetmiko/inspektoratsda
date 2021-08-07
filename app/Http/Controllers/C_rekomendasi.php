<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_rekomendasi extends Controller
{
    public function insertRekomendasi($ID_TEMUAN) 
    {
        $temuan = DB::table('temuan')->where('id', $ID_TEMUAN)->get();
        $rekomendasi = DB::table('rekomendasi')->where('ID_TEMUAN', $ID_TEMUAN)->get();
        $punya_opd = DB::table('punya_opd')->get();
        $status = DB::table('status')->get();
        $opd = DB::table('opd')->get();

        $data = array(
            'menu' => 'temuan',
            'temuan' => $temuan,
            'rekomendasi' => $rekomendasi,
            'status' => $status,
            'punya_opd' => $punya_opd,
            'opd' => $opd,
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

    public function editrekomendasi($id)
    {
        $rekomendasi = DB::table('rekomendasi')->where('id', $id)->get();
        $status = DB::table('status')->get();
        $data = array(
            'menu' => 'temuan',
            'rekomendasi' => $rekomendasi,
            'status' => $status,
            'submenu' => ''
           
        );
        return view('rekomendasi/edit_rekomendasi',$data);
    }

    public function updateRekomendasi(Request $post)
    {
        // update tabel Rekomendasi
        DB::table('rekomendasi')->where('id', $post->id)->update([
            'ID_TEMUAN' => $post->ID_TEMUAN,
            'ID_STATUS' => $post->ID_STATUS,
            'KODE_REKOMENDASI' => $post->KODE_REKOMENDASI,
            'URAIAN_REKOMENDASI' => $post->URAIAN_REKOMENDASI,
            'URAIAN_TINDAK_LANJUT' => $post->URAIAN_TINDAK_LANJUT,
            'TANGGAL_TINDAK_LANJUT' => $post->TANGGAL_TINDAK_LANJUT,        
            'HASIL_TELAAH_TINDAK_LANJUT' => $post->HASIL_TELAAH_TINDAK_LANJUT,
        ]);

        //kembali ke halaman data detailpeminjaman
        return redirect('/rekomendasi/insert_view_rekomendasi/'.$post->ID_TEMUAN);
    }

    public function hapus($id,$ID_TEMUAN)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('punya_opd')->where('ID_REKOMENDASI',$id)->delete();
        DB::table('rekomendasi')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/rekomendasi/insert_view_rekomendasi/'.$ID_TEMUAN);
    }
}
