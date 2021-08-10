<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;

class TemuanExport implements FromView
{
    public function __construct(String $lhp)
    {
        $this->lhp = $lhp;
    }

    public function view(): View
    {
        $nama = Auth::user()->name;
        // $cetak = DB::table('temuan')->where('NOMOR_LHP',$this->lhp)->get();
        $cetak = DB::table('temuan')
                        ->select('temuan.*', 'rekomendasi.*', 'rekomendasi.id as idrekom','temuan.id as idtemuan')
                        ->leftJoin('rekomendasi', 'rekomendasi.ID_TEMUAN', '=', 'temuan.id')
                        ->where('temuan.NOMOR_LHP',$this->lhp)->get();
        $opd = DB::table('opd')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')
                        ->leftJoin('rekomendasi', 'rekomendasi.id', '=', 'punya_opd.ID_REKOMENDASI')
                        ->get();
        $lhp2 = DB::table('lhp')->where('NOMOR_LHP',$this->lhp)->get();

        $uraian='';
        foreach($cetak as $value){
            if($uraian==$value->URAIAN_TEMUAN){
                $value->ID_KATEGORI='';
                $value->URAIAN_TEMUAN='';
                $value->KERUGIAN='';
            }else{
                $uraian=$value->URAIAN_TEMUAN;
            }

        }

        $data = array(
            'menu' => 'cetak',
            'nama' => $nama,
            'cetak' => $cetak,
            'opd' => $opd,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'submenu' => ''
        );

        return view('cetak.cetak_view', $data);
    }
    public function view1(): View
    {
        $cetak = DB::table('temuan')->where('NOMOR_LHP',$this->lhp)->get();
        $id = DB::table('opd')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $rekomendasi = DB::table('rekomendasi')->get();
        $lhp2 = DB::table('lhp')->where('NOMOR_LHP',$this->lhp)->get();

        $data = array(
            'menu' => 'cetak',
            'cetak' => $cetak,
            'id' => $id,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'rekomendasi' => $rekomendasi,
            'submenu' => ''
        );

        return view('cetak.cetak_view', $data);
    }
}
