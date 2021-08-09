<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_tugas extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $tugas = DB::table('tugas')->get();

        $data = array(
            'menu' => 'tugas',
            'nama' => $nama,
            'tugas' => $tugas,
            'submenu' => ''
        );

        return view('tugas/view_tugas',$data);
    }

    public function insertTugas()
    {
        $nama = Auth::user()->name;
        $tugas = DB::table('tugas')->get();

        $data = array(
            'menu' => 'tugas',
            'nama' => $nama,
            'tugas' => $tugas,
            'submenu' => ''
        );

        return view('tugas/insert_tugas',$data); 
    }

    public function tambahTugas(Request $post)
    {  
        DB::table('tugas')->insert([
            'ID_TUGAS' => $post->ID_TUGAS,
            'NAMA_TUGAS' => $post->NAMA_TUGAS,
            'urutan' => $post->urutan,
        ]);

        return redirect('/tugas');
    }

    public function editTugas($ID_TUGAS) 
    {
        $nama = Auth::user()->name;
        $tugas = DB::table('tugas')->where('ID_TUGAS', $ID_TUGAS)->get();
        
        $data = array(
            'menu' => 'tugas',
            'nama' => $nama,
            'tugas' => $tugas,
            'submenu' => ''
           
        );
        return view('tugas/edit_tugas',$data);
    }

    public function updateTugas(Request $post)
    {
        DB::table('tugas')->where('ID_TUGAS', $post->ID_TUGAS)->update([
            'ID_TUGAS' => $post->ID_TUGAS,
            'NAMA_TUGAS' => $post->NAMA_TUGAS,
            'urutan' => $post->urutan,
        ]);
        
        return redirect('/tugas');
    }

    public function hapus($ID_TUGAS)
    {
    	DB::table('tugas')->where('ID_TUGAS',$ID_TUGAS)->delete();
	    return redirect('/tugas');
    }
}
