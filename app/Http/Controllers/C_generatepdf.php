<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use PDF;

class C_generatepdf extends Controller
{
    public function cetakLAK(Request $request)
    {
        $semester = $request->session()->get('semester');
        $nik = $request->session()->get('nik');
        $tahun = $request->session()->get('tahun');
        

        if($semester == 1) {
            $start = date("Y-m-d H:i:s", strtotime("$tahun-01-01"));
            $end = date("Y-m-d H:i:s", strtotime("$tahun-06-30"));
        }
        else {
            $start = date("Y-m-d H:i:s", strtotime("$tahun-07-01"));
            $end = date("Y-m-d H:i:s", strtotime("$tahun-12-31"));
        }

        $pegawaidupak = DB::table('pegawai')->where('NIK_PEGAWAI', $nik)->get();
        $pengawasan = DB::table('spt')->join('jenis_pengawasan', 'spt.ID_PENGAWASAN', '=', 'jenis_pengawasan.ID_PENGAWASAN')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'jenis_pengawasan.id_angka_kredit')->join('penugasan', 'spt.id', '=', 'penugasan.id_spt')->join('tugas', 'tugas.ID_TUGAS', '=', 'penugasan.ID_TUGAS')
        ->whereBetween('tgl_mulai',[$start,$end])->where('NIK_PEGAWAI', $nik)->get();
        $diklat = DB::table('diklat')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'diklat.id_angka_kredit')
        ->whereBetween('TANGGAL_DIKLAT',[$start,$end])->where('NIK_PEGAWAI', $nik)->get();
        $pengembangan = DB::table('dupak_detail_ppm')->join('dupak_ppm', 'dupak_ppm.id', '=', 'dupak_detail_ppm.ppm_id')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'dupak_ppm.id_angka_kredit')
        ->whereBetween('tgl_mulai',[$start,$end])->where('pegawai_id', $nik)->get();
        $pendidikan = DB::table('pendidikan')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'pendidikan.id_angka_kredit')->where('NIK_PEGAWAI', $nik)->whereBetween('created_at',[$start,$end])->get();
        // $pendidikan = DB::table('dupak_pendidikan')->get();
        $penunjang = DB::table('dupak_penunjang')
        ->whereBetween('tanggal',[$start,$end])->where('pegawai_id', $nik)->get();

        $jmlpengawasan = 0;
        $jmljampengawasan = 0;
        $lamapengawasan = array();
        foreach($pengawasan as $value){
            $jmlpengawasan = $jmlpengawasan + $value->angka_kredit * $value->lama_jam;
            $jmljampengawasan = $jmljampengawasan + $value->lama_jam;
            $tgl1 = new DateTime($value->tgl_mulai);
            $tgl2 = new DateTime($value->tgl_selesai);
            $tgl = $tgl2->diff($tgl1);
            array_push( $lamapengawasan,  $tgl->days);
        }

        $jmlharipengawasan = 0;
        foreach($lamapengawasan as $value){
            $jmlharipengawasan = $jmlharipengawasan + $value;
        }
        
        $jmlpengembangan = 0;
        $jmljampengembangan = 0;
        $jmlharipengembangan = 0;
        foreach($pengembangan as $value){
            $jmlpengembangan = $jmlpengembangan + $value->angka_kredit * $value->lama_jam;
            $jmljampengembangan = $jmljampengembangan + $value->lama_jam;
            $jmlharipengembangan = $jmlharipengembangan + 1;
        }

        $jmldiklat = 0;
        $jmljamdiklat = 0;
        $jmlharidiklat = 0;
        foreach($diklat as $value){
            $jmldiklat = $jmldiklat + $value->angka_kredit * $value->lama_jam;
            $jmljamdiklat = $jmljamdiklat + $value->lama_jam;
            $jmlharidiklat = $jmlharidiklat + 1;
        }

        $jmlpenunjang = 0;
        $jmljampenunjang = 0;
        $jmlharipenunjang = 0;
        foreach($penunjang as $value){
            $jmlpenunjang = $jmlpenunjang + $value->satuan_ak * $value->lama_jam;
            $jmljampenunjang = $jmljampenunjang + $value->lama_jam;
            $jmlharipenunjang = $jmlharipenunjang + 1;
        }

        $jmlpendidikan = 0;
        foreach($pendidikan as $value){
            $jmlpendidikan = $jmlpendidikan + $value->angka_kredit;
        }

        $data = [
            'title' => 'LAPORAN ANGKA KREDIT',
            'date' => date('m/d/Y'),
            'semester' => $semester,
            'tahun' => $tahun,
            'pegawaidupak' => $pegawaidupak,
            'pengawasan' => $pengawasan,
            'diklat' => $diklat,
            'pengembangan' => $pengembangan,
            'pendidikan' => $pendidikan,
            'penunjang' => $penunjang,
            'jmlpengawasan' => $jmlpengawasan,
            'jmljampengawasan' => $jmljampengawasan,
            'lamapengawasan' => $lamapengawasan,
            'jmlharipengawasan' => $jmlharipengawasan,
            'jmlpengembangan' => $jmlpengembangan,
            'jmljampengembangan' => $jmljampengembangan,
            'jmlharipengembangan' => $jmlharipengembangan,
            'jmldiklat' => $jmldiklat,
            'jmljamdiklat' => $jmljamdiklat,
            'jmlharidiklat' => $jmlharidiklat,
            'jmlpenunjang' => $jmlpenunjang,
            'jmljampenunjang' => $jmljampenunjang,
            'jmlharipenunjang' => $jmlharipenunjang,
            'jmlpendidikan' => $jmlpendidikan,
        ];
          
        $pdf = PDF::loadView('dupak/cetakLAK', $data);
    
        return $pdf->stream('itsolutionstuff.pdf');
    }

    public function cetakAK(Request $request)
    {
        $semester = $request->session()->get('semester');
        $nik = $request->session()->get('nik');
        $tahun = $request->session()->get('tahun');
        

        if($semester == 1) {
            $start = date("Y-m-d H:i:s", strtotime("$tahun-01-01"));
            $end = date("Y-m-d H:i:s", strtotime("$tahun-06-30"));
        }
        else {
            $start = date("Y-m-d H:i:s", strtotime("$tahun-07-01"));
            $end = date("Y-m-d H:i:s", strtotime("$tahun-12-31"));
        }

        $dup = DB::table('dupak')->get();
        $jmlunsurutama = 0;
        $jmlak = 0;
        $jmltotal = 0;
        if(isset($dup)){
            $dupak = DB::table('dupak')->where('semester', $semester)->where('tahun', $tahun)->where('NIK_PEGAWAI', $nik)->first();
            if(isset($dupak)){
                $jmlunsurutama = $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan;
                $jmlak = $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang;
                $jmltotal = $dupak->lama_pendidikan + $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang;

                $totalpendidikan = $dupak->lama_pendidikan + $dupak->baru_pendidikan;
                $totaldiklat = $dupak->lama_diklat + $dupak->baru_diklat;
                $totalpengawasan = $dupak->lama_pengawasan + $dupak->baru_pengawasan;
                $totalpengembangan = $dupak->lama_pengembangan + $dupak->baru_pengembangan;
                $totalpenunjang = $dupak->lama_penunjang + $dupak->baru_penunjang;
            } else {
                $totalpendidikan = 0;
                $totaldiklat = 0;
                $totalpengawasan = 0;
                $totalpengembangan = 0;
                $totalpenunjang = 0;
            }
            
        } else {
            $dupak = new \stdClass;
            $dupak->lama_pendidikan = 0;
            $dupak->lama_diklat = 0;
            $dupak->lama_pengawasan = 0;
            $dupak->lama_pengembangan = 0;
            $dupak->lama_penunjang = 0;
        }

        $pegawaidupak = DB::table('pegawai')->where('NIK_PEGAWAI', $nik)->get();
        $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI', $nik)->latest('TMT_PANGKAT')->get();
        $jabatan = DB::table('jabatan')->where('NIK_PEGAWAI', $nik)->latest('TMT_JABATAN')->get();
        $pendidikanpeg = DB::table('pendidikan')->where('NIK_PEGAWAI', $nik)->latest('created_at')->get();
        $pengawasan = DB::table('spt')->join('jenis_pengawasan', 'spt.ID_PENGAWASAN', '=', 'jenis_pengawasan.ID_PENGAWASAN')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'jenis_pengawasan.id_angka_kredit')->join('penugasan', 'spt.id', '=', 'penugasan.id_spt')->join('tugas', 'tugas.ID_TUGAS', '=', 'penugasan.ID_TUGAS')
        ->whereBetween('tgl_mulai',[$start,$end])->where('NIK_PEGAWAI', $nik)->get();
        $diklat = DB::table('diklat')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'diklat.id_angka_kredit')
        ->whereBetween('TANGGAL_DIKLAT',[$start,$end])->where('NIK_PEGAWAI', $nik)->get();
        $pengembangan = DB::table('dupak_detail_ppm')->join('dupak_ppm', 'dupak_ppm.id', '=', 'dupak_detail_ppm.ppm_id')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'dupak_ppm.id_angka_kredit')
        ->whereBetween('tgl_mulai',[$start,$end])->where('pegawai_id', $nik)->get();
        $pendidikan = DB::table('pendidikan')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'pendidikan.id_angka_kredit')->where('NIK_PEGAWAI', $nik)->whereBetween('created_at',[$start,$end])->get();
        // $pendidikan = DB::table('dupak_pendidikan')->get();
        $penunjang = DB::table('dupak_penunjang')
        ->whereBetween('tanggal',[$start,$end])->where('pegawai_id', $nik)->get();

        $no = 0;
        $no1 = 0;
        $no2 = 0;
        $no3 = 0;
        $no4 = 0;

        $jmlpengawasan = 0;
        $jmljampengawasan = 0;
        $lamapengawasan = array();
        foreach($pengawasan as $value){
            $jmlpengawasan = $jmlpengawasan + $value->angka_kredit * $value->lama_jam;
            $jmljampengawasan = $jmljampengawasan + $value->lama_jam;
            $tgl1 = new DateTime($value->tgl_mulai);
            $tgl2 = new DateTime($value->tgl_selesai);
            $tgl = $tgl2->diff($tgl1);
            array_push( $lamapengawasan,  $tgl->days);
        }

        $jmlharipengawasan = 0;
        foreach($lamapengawasan as $value){
            $jmlharipengawasan = $jmlharipengawasan + $value;
        }
        
        $jmlpengembangan = 0;
        $jmljampengembangan = 0;
        $jmlharipengembangan = 0;
        foreach($pengembangan as $value){
            $jmlpengembangan = $jmlpengembangan + $value->angka_kredit * $value->lama_jam;
            $jmljampengembangan = $jmljampengembangan + $value->lama_jam;
            $jmlharipengembangan = $jmlharipengembangan + 1;
        }

        $jmldiklat = 0;
        $jmljamdiklat = 0;
        $jmlharidiklat = 0;
        foreach($diklat as $value){
            $jmldiklat = $jmldiklat + $value->angka_kredit * $value->lama_jam;
            $jmljamdiklat = $jmljamdiklat + $value->lama_jam;
            $jmlharidiklat = $jmlharidiklat + 1;
        }

        $jmlpenunjang = 0;
        $jmljampenunjang = 0;
        $jmlharipenunjang = 0;
        foreach($penunjang as $value){
            $jmlpenunjang = $jmlpenunjang + $value->satuan_ak * $value->lama_jam;
            $jmljampenunjang = $jmljampenunjang + $value->lama_jam;
            $jmlharipenunjang = $jmlharipenunjang + 1;
        }

        $jmlpendidikan = 0;
        foreach($pendidikan as $value){
            $jmlpendidikan = $jmlpendidikan + $value->angka_kredit;
        }

        $data = [
            'title' => 'LAPORAN ANGKA KREDIT',
            'date' => date('m/d/Y'),
            'semester' => $semester,
            'tahun' => $tahun,
            'dupak' => $dupak,
            'jmlunsurutama' => $jmlunsurutama,
            'jmlak' => $jmlak,
            'jmltotal' => $jmltotal,
            'pegawaidupak' => $pegawaidupak,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'pendidikanpeg' => $pendidikanpeg,
            'pengawasan' => $pengawasan,
            'diklat' => $diklat,
            'pengembangan' => $pengembangan,
            'pendidikan' => $pendidikan,
            'penunjang' => $penunjang,
            'jmlpengawasan' => $jmlpengawasan,
            'jmljampengawasan' => $jmljampengawasan,
            'lamapengawasan' => $lamapengawasan,
            'jmlharipengawasan' => $jmlharipengawasan,
            'jmlpengembangan' => $jmlpengembangan,
            'jmljampengembangan' => $jmljampengembangan,
            'jmlharipengembangan' => $jmlharipengembangan,
            'jmldiklat' => $jmldiklat,
            'jmljamdiklat' => $jmljamdiklat,
            'jmlharidiklat' => $jmlharidiklat,
            'jmlpenunjang' => $jmlpenunjang,
            'jmljampenunjang' => $jmljampenunjang,
            'jmlharipenunjang' => $jmlharipenunjang,
            'jmlpendidikan' => $jmlpendidikan,
            'totalpendidikan' => $totalpendidikan,
            'totaldiklat' => $totaldiklat,
            'totalpengawasan' => $totalpengawasan,
            'totalpengembangan' => $totalpengembangan,
            'totalpenunjang' => $totalpenunjang,
            'no' => $no,
            'no1' => $no1,
            'no2' => $no2,
            'no3' => $no3,
            'no4' => $no4,
        ];
          
        $pdf = PDF::loadView('dupak/cetakAK', $data);
    
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
