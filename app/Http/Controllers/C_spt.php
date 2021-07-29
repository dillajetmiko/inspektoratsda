<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_spt extends Controller
{
    //
     //
     public function index()
     {
         $spt = DB::table('spt')->get();
         $penugasan = DB::table('penugasan')->get();
         $pegawai = DB::table('pegawai')->get();
         $data = array(
             'menu' => 'spt',
             'spt' => $spt,
             'penugasan' => $penugasan,
             'pegawai' => $pegawai,
             'submenu' => ''
         );
 
         return view('SPT/view_spt',$data);
     }
 
     public function downloadbackup($FILE_SPT)
     {
         $file = base64_decode($FILE_SPT);
         $path=storage_path('app/'.$file);
         return response()->download($path);
     }
 
     public function download($ID_SPT)
     {
         $spt = DB::table('spt')->where('ID_SPT', $ID_SPT)->get();
         // dd($lhp);
         // dd($lhp[0]);
         // $file = base64_decode($FILE_SPT);
         $path=storage_path('app/'.$spt[0]->FILE_SPT);
         return response()->download($path);
     }
 
     public function download1()
     {
         $path=storage_path('file.jpg');
         return response()->download($path);
     }
 
     public function insertSpt()
     {
         $spt = DB::table('spt')->get();
         $data = array(
             'menu' => 'spt',
             'spt' => $spt,
             'submenu' => ''
         );
 
         return view('SPT/insert_spt',$data); 
     }
 
     public function tambahSpt(Request $post)
     {  
        if($post->file('file')) { 
            // Validation
            $post->validate([
                'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
            ]); 

            $name = $post->file('file')->getClientOriginalName();

            // $path = $post->file('file')->store('public/files');  
            $path = $post->file('file')->storeAs('public/files',$name);  
        }else{
            $path = null;
        }
  
         DB::table('spt')->insert([
             'ID_SPT' => $post->ID_SPT,
             'NOMOR_SPT' => $post->NOMOR_SPT,
             'TANGGAL_SPT' => $post->TANGGAL_SPT,
             'DASAR_SPT' => $post->DASAR_SPT,
             'ISI_SPT' => $post->ISI_SPT,
             'FILE_SPT' => $path
          
         ]);
 
         return redirect('/penugasan/insert_view_penugasan/'.$post->ID_SPT);
     }
 
     public function editSpt($ID_SPT) 
     {
         $spt = DB::table('spt')->where('ID_SPT', $ID_SPT)->get();
 
         $data = array(
             'menu' => 'spt',
             'spt' => $spt,
             'submenu' => ''
            
         );
         return view('SPT/edit_spt',$data);
     }
 
     public function updateSPt(Request $post)
     {
        if($post->file('file')) { 
            // Validation
            $post->validate([
                'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
            ]); 

            $name = $post->file('file')->getClientOriginalName();

            // $path = $post->file('file')->store('public/files');  
            $path = $post->file('file')->storeAs('public/files',$name); 
            
            DB::table('spt')->where('ID_SPT', $post->ID_SPT)->update([
                'NOMOR_SPT' => $post->NOMOR_SPT,
                'TANGGAL_SPT' => $post->TANGGAL_SPT,
                'DASAR_SPT' => $post->DASAR_SPT,
                'ISI_SPT' => $post->ISI_SPT,         
                'FILE_SPT' => $path         
            ]);
        }else{
            DB::table('spt')->where('ID_SPT', $post->ID_SPT)->update([
                'NOMOR_SPT' => $post->NOMOR_SPT,
                'TANGGAL_SPT' => $post->TANGGAL_SPT,
                'DASAR_SPT' => $post->DASAR_SPT,
                'ISI_SPT' => $post->ISI_SPT         
            ]);
        } 
 
         return redirect('/spt');
     }

     public function cetak() 
     {
         $spt = DB::table('spt')->get();
 
         $data = array(
             'menu' => 'spt',
             'spt' => $spt,
             'submenu' => ''
            
         );
         return view('SPT/cetak_spt',$data);
     }
 
     public function hapus($ID_SPT)
     {
         DB::table('penugasan')->where('ID_SPT',$ID_SPT)->delete();
         DB::table('spt')->where('ID_SPT',$ID_SPT)->delete();
         return redirect('/spt');
     }
  
}
