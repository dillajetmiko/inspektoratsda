<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class C_user extends Controller
{
    //
    public function index()
    {
        $user = DB::table('users')->get();
        $data = array(
            'menu' => 'user',
            'user' => $user,
            'submenu' => ''
        );

        return view('user/view_user',$data);
    }

    public function punyaRole($namaRole)
    {
        if($this->role->namaRole == $namaRole){
            return true;
        }
            return false;
    }

    public function insertUser()
    {
        $user = DB::table('users')->get();
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
        DB::table('users')->insert([
            'NIP' => $post->NIP,
            'name' => $post->NAMA,
            'password' => $post->PASSWORD,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT
        ]);

        return redirect('/user');
    }

    public function editUser($NIP) 
    {
        $user = DB::table('users')->where('NIP', $NIP)->get();
    
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
            DB::table('users')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'name' => $post->NAMA,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT
            ]);
            $user = User::find($post->NIP);

            $user->password = $post->PASSWORD;

            $user->save();
        }else{
            DB::table('users')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'name' => $post->NAMA,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT
            ]);
        }
              
        //kembali ke halaman data anggota
        return redirect('/user');
    }

    public function hapus($NIP)
    {
    	DB::table('users')->where('NIP',$NIP)->delete();
	    return redirect('/user');
    }
}
