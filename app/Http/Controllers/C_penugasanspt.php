<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_penugasanspt extends Controller
{
    public function index()
    {
        $years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        $nama = Auth::user()->name;
        $spt = DB::table('spt')->get();
        $penugasan = DB::table('penugasan')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'penugasanspt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'pegawai' => $pegawai,
            'jenis_pengawasan' => $jenis_pengawasan,
            'years' => $years,
            'submenu' => ''
        );

        return view('penugasan_spt/view_penugasan_spt',$data);
    }

    public function cari(Request $request)
	{
		$years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        // menangkap data pencarian
		$nik = $request->nik;
        $bulan = $request->bulan;
        $tahun = $request->year;
        $tanggal = $request->tanggal;

        // $spt = DB::table('penugasan')
        //                 ->leftJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
        //                 ->where('penugasan.NIK_PEGAWAI',$nik)
        //                 ->whereYear('tgl_mulai', $tahun)
        //                 ->whereMonth('tgl_mulai', $bulan)
        //                 ->get();
        if($nik == 0){
            $spt = DB::table('spt')
                            ->where('tgl_mulai', '<=', $tanggal)
                            ->where('tgl_selesai', '>=', $tanggal)
                            ->get();
        }else{
            $spt = DB::table('penugasan')
                            ->leftJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
                            ->where('penugasan.NIK_PEGAWAI',$nik)
                            ->where('tgl_mulai', '<=', $tanggal)
                            ->where('tgl_selesai', '>=', $tanggal)
                            ->get();
        }
        // dd($spt);
        // return;

        // if ($kode_opd == 0 && $tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->get();
        // }elseif($jenis == 0 && $tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->get();
        // }elseif($jenis == 0 && $kode_opd == 0){
        //     $temuan = DB::table('temuan')->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($jenis == 0){
        //     $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($kode_opd == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->get();
        // }else{
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }

        $nama = Auth::user()->name;
        $penugasan = DB::table('penugasan')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'penugasanspt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'pegawai' => $pegawai,
            'jenis_pengawasan' => $jenis_pengawasan,
            'years' => $years,
            'nik' => $nik,
            'tanggal' => $tanggal,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('penugasan_spt/view_penugasan_spt',$data);
 
	}

    public function export(Request $request)
	{
		$years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        // menangkap data pencarian
		$nik = $request->nik;
        $bulan = $request->bulan;
        $tahun = $request->year;
        $tanggal = $request->tanggal;

        // $spt = DB::table('penugasan')
        //                 ->leftJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
        //                 ->where('penugasan.NIK_PEGAWAI',$nik)
        //                 ->whereYear('tgl_mulai', $tahun)
        //                 ->whereMonth('tgl_mulai', $bulan)
        //                 ->get();
        if($nik == 0){
            $spt = DB::table('spt')
                            ->where('tgl_mulai', '<=', $tanggal)
                            ->where('tgl_selesai', '>=', $tanggal)
                            ->get();
        }else{
            $spt = DB::table('penugasan')
                            ->leftJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
                            ->where('penugasan.NIK_PEGAWAI',$nik)
                            ->where('tgl_mulai', '<=', $tanggal)
                            ->where('tgl_selesai', '>=', $tanggal)
                            ->get();
        }
        // dd($spt);
        // return;

        // if ($kode_opd == 0 && $tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->get();
        // }elseif($jenis == 0 && $tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->get();
        // }elseif($jenis == 0 && $kode_opd == 0){
        //     $temuan = DB::table('temuan')->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($jenis == 0){
        //     $temuan = DB::table('temuan')->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($kode_opd == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }elseif($tahun == 0){
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->get();
        // }else{
        //     $temuan = DB::table('temuan')->where('KODE_JENIS_TEMUAN',$jenis)->where('KODE_OPD',$kode_opd)->whereYear('TANGGAL_TEMUAN', $tahun)->get();
        // }

        $nama = Auth::user()->name;
        $penugasan = DB::table('penugasan')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();
        $no = 0;

        $data = array(
            'menu' => 'penugasanspt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'pegawai' => $pegawai,
            'jenis_pengawasan' => $jenis_pengawasan,
            'years' => $years,
            'no' => $no,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('penugasan_spt/export',$data);
 
	}
}
