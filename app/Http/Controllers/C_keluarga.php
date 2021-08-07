<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_keluarga extends Controller
{
        public function insertKeluarga($NIK_PEGAWAI) 
        {
            
            $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
            $keluarga = DB::table('keluarga')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
            $status = DB::table('status_keluarga')->get();
    
            $data = array(
                'menu' => 'pegawai',
                'pegawai' => $pegawai,
                'keluarga' => $keluarga,
                'status' => $status,
                'submenu' => ''
               
            );
            return view('keluarga/insert_view_keluarga',$data);
        }
    
        public function tambahKeluarga(Request $post)
        {
            DB::table('keluarga')->insert([
                'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
                'NAMA_KELUARGA' => $post->NAMA_KELUARGA,
                'ID_STATUS_KELUARGA' => $post->ID_STATUS_KELUARGA,        
            ]);
    
            return redirect('/keluarga/insert_view_keluarga/'.$post->NIK_PEGAWAI);
        }
    
        
    
        public function hapus($ID_KELUARGA,$NIK_PEGAWAI)
        {
            // menghapus data detail_peminjaman berdasarkan id yang dipilih
            DB::table('keluarga')->where('ID_KELUARGA',$ID_KELUARGA)->delete();
                
            // alihkan halaman ke halaman detail_peminjaman
            return redirect('/keluarga/insert_view_keluarga/'.$NIK_PEGAWAI);
        }
    
    }
    

