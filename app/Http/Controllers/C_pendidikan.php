<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_pendidikan extends Controller
{
        public function insertPendidikan($NIK_PEGAWAI) 
        {
            $nama = Auth::user()->name;
            $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
            $pendidikan = DB::table('pendidikan')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
            $jenis = DB::table('dupak_angka_kredit')->get();
    
            $data = array(
                'menu' => 'pegawai',
                'nama' => $nama,
                'pegawai' => $pegawai,
                'pendidikan' => $pendidikan,
                'jenis' => $jenis,
                'submenu' => ''
               
            );
            return view('pendidikan/insert_view_pendidikan',$data);
        }
    
        public function tambahPendidikan(Request $post)
        {
            DB::table('pendidikan')->insert([
                'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
                'TAHUN_PENDIDIKAN' => $post->TAHUN_PENDIDIKAN,
                'STRATA_PENDIDIKAN' => $post->STRATA_PENDIDIKAN,        
                'INSTANSI_PENDIDIKAN' => $post->INSTANSI_PENDIDIKAN,        
                'INSTANSI_PENDIDIKAN' => $post->INSTANSI_PENDIDIKAN,
                'id_angka_kredit' => $post->jenis,        
            ]);
    
            return redirect('/pendidikan/insert_view_pendidikan/'.$post->NIK_PEGAWAI);
        }
    
        
    
        public function hapus($ID_PENDIDIKAN, $NIK_PEGAWAI)
        {
            // menghapus data detail_peminjaman berdasarkan id yang dipilih
            DB::table('pendidikan')->where('ID_PENDIDIKAN',$ID_PENDIDIKAN)->delete();
                
            // alihkan halaman ke halaman detail_peminjaman
            return redirect('/pendidikan/insert_view_pendidikan/'.$NIK_PEGAWAI);
        }
    
    }
    

