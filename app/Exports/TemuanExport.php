<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemuanExport implements FromView
{
    public function __construct(String $lhp)
    {
        $this->lhp = $lhp;
    }

    public function view(): View
    {

        // $temuan = DB::table('temuan')->where('NOMOR_LHP', $this->lhp)->get();
        // $id = DB::table('opd')->get();
        // $data = array(
        //     'menu' => 'temuan',
        //     'temuan' => $temuan,
        //     'id' => $id,
        //     'submenu' => ''
        // );

        $cetak = DB::table('temuan')->where('NOMOR_LHP',$this->lhp)->get();
        $id = DB::table('opd')->get();
        $lhp = DB::table('lhp')->get();
        $punya_opd = DB::table('punya_opd')->get();
        $lhp2 = DB::table('lhp')->where('NOMOR_LHP',$this->lhp)->get();

        $data = array(
            'menu' => 'cetak',
            'cetak' => $cetak,
            'id' => $id,
            'lhp' => $lhp,
            'lhp2' => $lhp2,
            'punya_opd' => $punya_opd,
            'submenu' => ''
        );

        return view('cetak.cetak_view', $data);
    }
}
