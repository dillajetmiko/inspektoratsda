<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C_dasar extends Controller
{
    public function insertDasar($ID_SPT) 
    {
        $spt = DB::table('spt')->where('ID_SPT', $ID_SPT)->get();
        $dasar = DB::table('dasar')->where('ID_SPT', $ID_SPT)->get();

        $data = array(
            'menu' => 'spt',
            'spt' => $spt,
            'dasar' => $dasar,
            'submenu' => ''
           
        );
        return view('dasar/insert_view_dasar',$data);
    }

    public function tambahDasar(Request $post)
    {
        DB::table('dasar')->insert([
            'ID_SPT' => $post->ID_SPT,
            'uraian_dasar' => $post->uraian_dasar, 
        ]);

        return redirect('/dasar/insert_view_dasar/'.$post->ID_SPT);
    }

}
