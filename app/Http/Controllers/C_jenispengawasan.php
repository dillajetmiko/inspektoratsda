<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_jenispengawasan extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'jenis_pengawasan',
            'nama' => $nama,
            'jenis_pengawasan' => $jenis_pengawasan,
            'submenu' => ''
        );

        return view('jenis_pengawasan/view_jenis_pengawasan',$data);
    }

    public function insertJenispengawasan()
    {
        $nama = Auth::user()->name;
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'jenis_pengawasan',
            'nama' => $nama,
            'jenis_pengawasan' => $jenis_pengawasan,
            'submenu' => ''
        );

        return view('jenis_pengawasan/insert_jenis_pengawasan',$data); 
    }

    public function tambahJenispengawasan(Request $post)
    {  
        DB::table('jenis_pengawasan')->insert([
            'ID_PENGAWASAN' => $post->ID_PENGAWASAN,
            'NAMA_PENGAWASAN' => $post->NAMA_PENGAWASAN,
        ]);

        return redirect('/jenis_pengawasan');
    }

    public function editJenispengawasan($ID_PENGAWASAN) 
    {
        $nama = Auth::user()->name;
        $jenis_pengawasan = DB::table('jenis_pengawasan')->where('ID_PENGAWASAN', $ID_PENGAWASAN)->get();
        
        $data = array(
            'menu' => 'jenis_pengawasan',
            'nama' => $nama,
            'jenis_pengawasan' => $jenis_pengawasan,
            'submenu' => ''
           
        );
        return view('jenis_pengawasan/edit_jenis_pengawasan',$data);
    }

    public function updateJenispengawasan(Request $post)
    {
        DB::table('jenis_pengawasan')->where('ID_PENGAWASAN', $post->ID_PENGAWASAN)->update([
            'ID_PENGAWASAN' => $post->ID_PENGAWASAN,
            'NAMA_PENGAWASAN' => $post->NAMA_PENGAWASAN,
        ]);
        
        return redirect('/jenis_pengawasan');
    }

    public function hapus($ID_PENGAWASAN)
    {
    	DB::table('jenis_pengawasan')->where('ID_PENGAWASAN',$ID_PENGAWASAN)->delete();
	    return redirect('/jenis_pengawasan');
    }
}
