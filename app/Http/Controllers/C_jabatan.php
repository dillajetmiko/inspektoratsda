<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_jabatan extends Controller
{
        public function insertJabatan($NIK_PEGAWAI) 
        {
            $nama = Auth::user()->name;
            $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
            $jabatan = DB::table('jabatan')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();
    
            $data = array(
                'menu' => 'pegawai',
                'nama' => $nama,
                'pegawai' => $pegawai,
                'jabatan' => $jabatan,
                'submenu' => ''
               
            );
            return view('jabatan/insert_view_jabatan',$data);
        }
    
        public function tambahJabatan(Request $post)
        {
            DB::table('jabatan')->insert([
                'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
                'TMT_JABATAN' => $post->TMT_JABATAN,
                'NAMA_JABATAN' => $post->NAMA_JABATAN,        
            ]);
    
            return redirect('/jabatan/insert_view_jabatan/'.$post->NIK_PEGAWAI);
        }
    
        
    
        public function hapus($ID_JABATAN, $NIK_PEGAWAI)
        {
            // menghapus data detail_peminjaman berdasarkan id yang dipilih
            DB::table('jabatan')->where('ID_JABATAN',$ID_JABATAN)->delete();
                
            // alihkan halaman ke halaman detail_peminjaman
            return redirect('/jabatan/insert_view_jabatan/'.$NIK_PEGAWAI);
        }
    
    }
    

