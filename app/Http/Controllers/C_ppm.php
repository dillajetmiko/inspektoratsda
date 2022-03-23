<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class C_ppm extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $ppm = DB::table('dupak_ppm')->get();
        $peserta = DB::table('dupak_detail_ppm')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis = DB::table('dupak_angka_kredit')->get();

        $data = array(
            'menu' => 'ppm',
            'nama' => $nama,
            'ppm' => $ppm,
            'peserta' => $peserta,
            'pegawai' => $pegawai,
            'jenis' => $jenis,
            'submenu' => ''
        );

        return view('ppm/view_ppm',$data);
    }

    public function insertPPM()
    {
        $nama = Auth::user()->name;
        $ppm = DB::table('dupak_ppm')->get();
        $jenis = DB::table('dupak_angka_kredit')->get();

        $data = array(
            'menu' => 'ppm',
            'nama' => $nama,
            'ppm' => $ppm,
            'jenis' => $jenis,
            'submenu' => ''
        );

        return view('ppm/insert_ppm',$data); 
    }

    public function tambahPPM(Request $post)
    {  
        $id = DB::table('dupak_ppm')->insertGetId([
            'kegiatan' => $post->kegiatan,
            'tgl_mulai' => $post->tgl_mulai,
            'id_angka_kredit' => $post->jenis_ppm,
            'lama_jam' => $post->lama_jam,
            
        ]);

        // return redirect('/ppm');
        return redirect('/ppm_detail/insert_view_peserta/'.$id);
    }

    public function editPPM($ID_PPM) 
    {
        $nama = Auth::user()->name;
        $ppm = DB::table('dupak_ppm')->where('id', $ID_PPM)->get();
        $jenis = DB::table('dupak_angka_kredit')->get();

        $data = array(
            'menu' => 'ppm',
            'nama' => $nama,
            'ppm' => $ppm,
            'jenis' => $jenis,
            'submenu' => ''
           
        );
        return view('ppm/edit_ppm',$data);
    }

    public function updatePPM(Request $post)
    {
        DB::table('dupak_ppm')->where('id', $post->id)->update([     
            'kegiatan' => $post->kegiatan,
            'tgl_mulai' => $post->tgl_mulai,
            'id_angka_kredit' => $post->jenis_ppm,
            'lama_jam' => $post->lama_jam,
        ]);

        return redirect('/ppm');
    }

    public function hapus($id)
    {
        DB::table('dupak_detail_ppm')->where('ppm_id',$id)->delete();
        $delete=DB::table('dupak_ppm')->where('id',$id)->delete();
    	if ($delete)
        {
            session()->flash('success', 'Data berhasil dihapus');
        }else{
            session()->flash('failed', 'Data gagal dihapus!');
        }
        
	    return redirect('/ppm');
    }


    

    public function insertPeserta($id_ppm) 
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->get();
        $ppm = DB::table('dupak_ppm')->where('id', $id_ppm)->get();
        $detail_ppm = DB::table('dupak_detail_ppm')->where('ppm_id', $id_ppm)->get();
        
        $data = array(
            'menu' => 'ppm',
            'nama' => $nama,
            'pegawai' => $pegawai,
            'ppm' => $ppm,
            'detail_ppm' => $detail_ppm,
            'submenu' => ''
           
        );
        return view('ppm_detail/insert_view_peserta',$data);
    }

    public function tambahPeserta(Request $post)
    {
        DB::table('dupak_detail_ppm')->insert([
            'ppm_id' => $post->id_ppm,
            'pegawai_id' => $post->NIK_PEGAWAI,
            'peran' => $post->peran, 
        ]);

        return redirect('/ppm_detail/insert_view_peserta/'.$post->id_ppm);
    }

    public function hapusPeserta($id,$id_ppm)
    {
        // menghapus data detail_peminjaman berdasarkan id yang dipilih
        DB::table('dupak_detail_ppm')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman detail_peminjaman
        return redirect('/ppm_detail/insert_view_peserta/'.$id_ppm);
    }


}
