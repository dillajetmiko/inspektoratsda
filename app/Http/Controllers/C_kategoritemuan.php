<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_kategoritemuan extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $kategori_temuan = DB::table('kategori_temuan')->get();

        $data = array(
            'menu' => 'kategori_temuan',
            'nama' => $nama,
            'kategori_temuan' => $kategori_temuan,
            'submenu' => ''
        );

        return view('kategori_temuan/view_kategori_temuan',$data);
    }

    public function insertKategoriTemuan()
    {
        $nama = Auth::user()->name;
        $kategori_temuan = DB::table('kategori_temuan')->get();

        $data = array(
            'menu' => 'kategori_temuan',
            'nama' => $nama,
            'kategori_temuan' => $kategori_temuan,
            'submenu' => ''
        );

        return view('kategori_temuan/insert_kategori_temuan',$data); 
    }

    public function tambahKategoriTemuan(Request $post)
    {  
        DB::table('kategori_temuan')->insert([
            'KODE_KATEGORI' => $post->KODE_KATEGORI,
            'URAIAN_KATEGORI' => $post->URAIAN_KATEGORI,
        ]);

        return redirect('/kategori_temuan');
    }

    public function editKategoriTemuan($KODE_KATEGORI) 
    {
        $nama = Auth::user()->name;
        $kategori_temuan = DB::table('kategori_temuan')->where('KODE_KATEGORI', $KODE_KATEGORI)->get();
        
        $data = array(
            'menu' => 'kategori_temuan',
            'nama' => $nama,
            'kategori_temuan' => $kategori_temuan,
            'submenu' => ''
           
        );
        return view('kategori_temuan/edit_kategori_temuan',$data);
    }

    public function updateKategoriTemuan(Request $post)
    {
        DB::table('kategori_temuan')->where('KODE_KATEGORI', $post->KODE_KATEGORI)->update([
            'KODE_KATEGORI' => $post->KODE_KATEGORI,
            'URAIAN_KATEGORI' => $post->URAIAN_KATEGORI,
        ]);
        
        return redirect('/kategori_temuan');
    }

    public function hapus($KODE_KATEGORI)
    {
    	DB::table('kategori_temuan')->where('KODE_KATEGORI',$KODE_KATEGORI)->delete();
	    return redirect('/kategori_temuan');
    }
}
