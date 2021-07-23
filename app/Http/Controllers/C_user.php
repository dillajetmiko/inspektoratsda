<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_user extends Controller
{
    //
    public function index()
    {
        $user = DB::table('user')->get();
        $data = array(
            'menu' => 'user',
            'user' => $user,
            'submenu' => ''
        );

        return view('user/view_user',$data);
    }

    public function insertUser()
    {
        $user = DB::table('user')->get();
        $data = array(
            'menu' => 'user',
            'user' => $user,
            'submenu' => ''
        );

        return view('user/insert_user',$data);
        //return view('tambah_bahasa');     
    }

    public function tambahUser(Request $post)
    {
        $pass = md5($post->PASSWORD);

        DB::table('user')->insert([
            'NIP' => $post->NIP,
            'NAMA' => $post->NAMA,
            'PASSWORD' => $pass,
            'JABATAN' => $post->JABATAN,
            'PANGKAT' => $post->PANGKAT
        ]);

        return redirect('/user');
    }

    public function editUser($NIP) 
    {
        $user = DB::table('user')->where('NIP', $NIP)->get();
    
        $data = array(
            'menu' => 'user',
            'user' => $user,
            'submenu' => ''          
        );
        return view('user/edit_user',$data);
    }

    public function updateUser(Request $post)
    {
        
        if($post->PASSWORD){
            $pass = md5($post->PASSWORD);
    
            DB::table('user')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'NAMA' => $post->NAMA,
            'PASSWORD' => $pass,
            'JABATAN' => $post->JABATAN,
            'PANGKAT' => $post->PANGKAT
            ]);
        }else{
            DB::table('user')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'NAMA' => $post->NAMA,
            'JABATAN' => $post->JABATAN,
            'PANGKAT' => $post->PANGKAT
            ]);
        }
        
        

        //kembali ke halaman data anggota
        return redirect('/user');
    }

    public function hapus($NIP)
    {
    	DB::table('user')->where('NIP',$NIP)->delete();
	    return redirect('/user');
    }
}
