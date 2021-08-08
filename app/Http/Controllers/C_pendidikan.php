<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_pendidikan extends Controller
{
        public function insertPendidikan($NIK_PEGAWAI) 
        {
            
            $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
            $pendidikan = DB::table('pendidikan')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
    
            $data = array(
                'menu' => 'pegawai',
                'pegawai' => $pegawai,
                'pendidikan' => $pendidikan,
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
    
