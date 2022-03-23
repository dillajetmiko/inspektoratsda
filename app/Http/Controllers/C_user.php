<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class C_user extends Controller
{
    //
    public function index()
    {
        $nama = Auth::user()->name;
        $user = DB::table('users')->get();
        $role = DB::table('role')->get();

        $data = array(
            'menu' => 'user',
            'nama' => $nama,
            'user' => $user,
            'role' => $role,
            'submenu' => ''
        );

        return view('user/view_user',$data);
    }

    public function insertUser()
    {
        $nama = Auth::user()->name;

        $data = array(
            'menu' => 'user',
            'nama' => $nama,
            'submenu' => ''
        );

        return view('user/insert_user',$data);
        //return view('tambah_bahasa');     
    }

    public function tambahUser(Request $post)
    {
        $user = User::create(request(['NIP','name','email','password']));

        return redirect('/user');
    }

    public function editUser($NIP) 
    {
        $nama = Auth::user()->name;
        $user = DB::table('users')->where('NIP', $NIP)->get();
        $role = DB::table('role')->get();
    
        $data = array(
            'menu' => 'user',
            'nama' => $nama,
            'user' => $user,
            'role' => $role,
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
            'email' => $post->EMAIL,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT,
            'id_role' => $post->id_role,
            ]);
            $user = User::find($post->NIP);

            $user->password = $post->PASSWORD;

            $user->save();
        }else{
            DB::table('users')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'name' => $post->NAMA,
            'email' => $post->EMAIL,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT,
            'id_role' => $post->id_role,
            ]);
        }
              
        //kembali ke halaman data anggota
        return redirect('/user');
    }

    public function hapus($NIP)
    {
    	
        $delete=DB::table('users')->where('NIP',$NIP)->delete();
    	if ($delete)
        {
            session()->flash('success', 'Data berhasil dihapus');
        }else{
            session()->flash('failed', 'Data gagal dihapus!');
        }
	    return redirect('/user');
    }

    public function validasi()
    {
        $user = DB::table('users')->get();
        $role = DB::table('role')->get();

        $data = array(
            'menu' => 'validasi',
            'user' => $user,
            'role' => $role,
            'submenu' => ''
        );

        return view('validasi/view_validasi',$data);
    }

    public function editValidasi($NIP) 
    {
        $user = DB::table('users')->where('NIP', $NIP)->get();
        $role = DB::table('role')->get();
    
        $data = array(
            'menu' => 'validasi',
            'user' => $user,
            'role' => $role,
            'submenu' => ''          
        );
        return view('validasi/edit_validasi',$data);
    }

    public function updateValidasi(Request $post)
    {
        
        if($post->PASSWORD){
            DB::table('users')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'name' => $post->NAMA,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT,
            'id_role' => $post->id_role,
            ]);
            $user = User::find($post->NIP);

            $user->password = $post->PASSWORD;

            $user->save();
        }else{
            DB::table('users')->where('NIP', $post->NIP)->update([
            'NIP' => $post->NIP,
            'name' => $post->NAMA,
            'jabatan' => $post->JABATAN,
            'pangkat' => $post->PANGKAT,
            'id_role' => $post->id_role,
            ]);
        }
              
        //kembali ke halaman data anggota
        return redirect('/validasi');
    }
}
