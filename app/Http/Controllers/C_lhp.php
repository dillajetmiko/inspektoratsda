<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_lhp extends Controller
{
    //
    public function index()
    {
        $lhp = DB::table('lhp')->get();
        $id = DB::table('spt')->get();
        $data = array(
            'menu' => 'lhp',
            'lhp' => $lhp,
            'id' => $id,
            'submenu' => ''
        );

        return view('LHP/view_lhp',$data);
    }

    public function downloadbackup($UPLOAD_FILE)
    {
        $file = base64_decode($UPLOAD_FILE);
        $path=storage_path('app/'.$file);
        return response()->download($path);
    }

    public function download($NOMOR_LHP)
    {
        $lhp = DB::table('lhp')->where('NOMOR_LHP', $NOMOR_LHP)->get();
        // dd($lhp);
        // dd($lhp[0]);
        // $file = base64_decode($UPLOAD_FILE);
        $path=storage_path('app/'.$lhp[0]->UPLOAD_FILE);
        return response()->download($path);
    }

    public function download1()
    {
        $path=storage_path('file.jpg');
        return response()->download($path);
    }

    public function insertLHP()
    {
        $lhp = DB::table('lhp')->get();
        $id = DB::table('spt')->get();

        $data = array(
            'menu' => 'lhp',
            'lhp' => $lhp,
            'id' => $id,
            'submenu' => ''
        );

        return view('LHP/insert_lhp',$data); 
    }

    public function tambahLHP(Request $post)
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
 
        DB::table('lhp')->insert([
            'NOMOR_LHP' => $post->NOMOR_LHP,
<<<<<<< HEAD
            'ID_SPT' => $post->ID_SPT,
            'NIP' => '1',
=======
            'NIP' => Auth::user()->NIP,
>>>>>>> d8ec5cfcb39d36488cb3cae3b896e4ad756c1f9a
            'TANGGAL_LHP' => $post->TANGGAL_LHP,
            'JUDUL_PEMERIKSAAN' => $post->JUDUL_PEMERIKSAAN,
            'UPLOAD_FILE' => $path,
            'ANGGARAN' => $post->ANGGARAN,
        ]);

        return redirect('/lhp');
    }

    public function editLHP($NOMOR_LHP) 
    {
        $lhp = DB::table('lhp')->where('NOMOR_LHP', $NOMOR_LHP)->get();
        $id = DB::table('spt')->get();
        
        $data = array(
            'menu' => 'lhp',
            'lhp' => $lhp,
            'id' => $id,
            'submenu' => ''
           
        );
        return view('LHP/edit_lhp',$data);
    }

    public function updateLHP(Request $post)
    {
        DB::table('lhp')->where('NOMOR_LHP', $post->NOMOR_LHP)->update([
            'NOMOR_LHP' => $post->NOMOR_LHP,
            'ID_SPT' => $post->ID_SPT,
            'NIP' => '1',
            'TANGGAL_LHP' => $post->TANGGAL_LHP,
            'JUDUL_PEMERIKSAAN' => $post->JUDUL_PEMERIKSAAN,
            'ANGGARAN' => $post->ANGGARAN,
        ]);

        return redirect('/lhp');
    }

    public function hapus($NOMOR_LHP)
    {
    	DB::table('lhp')->where('NOMOR_LHP',$NOMOR_LHP)->delete();
	    return redirect('/lhp');
    }
}
