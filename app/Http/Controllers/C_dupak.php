<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class C_dupak extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        $semester = 0;
        $pegawai = DB::table('pegawai')->get();
        $dupak = new \stdClass;
        $dupak->lama_pendidikan = 0;
        $dupak->lama_diklat = 0;
        $dupak->lama_pengawasan = 0;
        $dupak->lama_pengembangan = 0;
        $dupak->lama_penunjang = 0;
        $jmlunsurutama = 0;
        $jmlak = 0;
        $jmltotal = 0;
        // $dupak = DB::table('dupak')->get();
        // $pengawasan = DB::table('dupak_detail_spt')->join('spt', 'spt.id', '=', 'dupak_detail_spt.spt_id')->get();
        // $diklat = DB::table('dupak_detail_diklat')->join('diklat', 'diklat.ID_DIKLAT', '=', 'dupak_detail_diklat.diklat_id')->get();
        // $pengembangan = DB::table('dupak_detail_ppm')->join('dupak_ppm', 'dupak_ppm.id', '=', 'dupak_detail_ppm.ppm_id')->get();
        // $pendidikan = DB::table('dupak_pendidikan')->get();
        // $penunjang = DB::table('dupak_penunjang')->get();
        // $pegawai = DB::table('pegawai')->get();
        $pegawaidupak = DB::table('pegawai')->get();
        $pegselect = DB::table('pegawai')->get();
        $pangkat = DB::table('pangkat')->get();
        $jabatan = DB::table('jabatan')->get();
        $pengawasan = [];
        $diklat = [];
        $pengembangan = [];
        $pendidikan = [];
        $penunjang = [];
        $jmlpengawasan = 0;
        $jmljampengawasan = 0;
        $lamapengawasan = 0;
        $jmlharipengawasan = 0;
        $jmlpengembangan = 0;
        $jmljampengembangan = 0;
        $jmlharipengembangan = 0;
        $jmldiklat = 0;
        $jmljamdiklat = 0;
        $jmlharidiklat = 0;
        $jmlpenunjang = 0;
        $jmljampenunjang = 0;
        $jmlharipenunjang = 0;
        $jmlpendidikan = 0;
        $totalpendidikan = 0;
        $totaldiklat = 0;
        $totalpengawasan = 0;
        $totalpengembangan = 0;
        $totalpenunjang = 0;
        $no = 0;
        $no1 = 0;
        $no2 = 0;
        $no3 = 0;
        $no4 = 0;
        $data = array(
            'menu' => 'dupak',
            'nama' => $nama,
            'semester' => $semester,
            'pegawai' => $pegawai,
            'dupak' => $dupak,
            'jmlunsurutama' => $jmlunsurutama,
            'jmlak' => $jmlak,
            'jmltotal' => $jmltotal,
            'pegawaidupak' => $pegawaidupak,
            'pegselect' => $pegselect,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
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
            'submenu' => ''
        );
        return view('dupak/view_dupak',$data);
    }

    public function cari(Request $request)
    {
        $year = ($request->tahun) ? $request->tahun : date('Y');
        if(isset($request->semester)) {
            if($request->semester == 1) {
                $start = date("Y-m-d H:i:s", strtotime("$year-01-01"));
                $end = date("Y-m-d H:i:s", strtotime("$year-06-30"));
                $tahun = $request->tahun;
                $nik = $request->NIK_PEGAWAI;
                $request->session()->put('tahun', $tahun);
                $request->session()->put('semester', 1);
                $request->session()->put('nik', $nik);
            }
            elseif ($request->semester == 2) {
                $start = date("Y-m-d H:i:s", strtotime("$year-07-01"));
                $end = date("Y-m-d H:i:s", strtotime("$year-12-31"));
                $tahun = $request->tahun;
                $nik = $request->NIK_PEGAWAI;
                $request->session()->put('tahun', $tahun);
                $request->session()->put('semester', 2);
                $request->session()->put('nik', $nik);
            }else{
                return response('Pilih periode semester terlebih dahulu.', 401);
            }
        }else{
            $tahun = $request->session()->get('tahun');
            $semester = $request->session()->get('semester');
            $nik = $request->session()->get('nik');
            // $start = ( date('n')<=6 ) ? date("Y-m-d H:i:s", strtotime("$year-01-01")) : date("Y-m-d H:i:s", strtotime("$year-07-01"));
            // $end = ( date('n')<=6 ) ? date("Y-m-d H:i:s", strtotime("$year-06-30")) : date("Y-m-d H:i:s", strtotime("$year-12-31"));
            $start = ( $semester=1 ) ? date("Y-m-d H:i:s", strtotime("$tahun-01-01")) : date("Y-m-d H:i:s", strtotime("$tahun-07-01"));
            $end = ( $semester=1 ) ? date("Y-m-d H:i:s", strtotime("$tahun-06-30")) : date("Y-m-d H:i:s", strtotime("$tahun-12-31"));
        }

        // if($request->tahun){
        //     $tahun = $request->tahun;
        //     $request->session()->put('tahun', $tahun);
        // }else{
        //     // $tahun = new \stdClass;
        //     $tahun = $request->session()->get('tahun');
        // }
        
        $nama = Auth::user()->name;
        $semester = $request->semester;
        $pegawai = DB::table('pegawai')->get();
        // $dupak = DB::table('dupak')->where('semester', $semester)->where('tahun', $request->tahun)->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->get();
        $dup = DB::table('dupak')->get();
        $jmlunsurutama = 0;
        $jmlak = 0;
        $jmltotal = 0;
        if(isset($dup)){
            $dupak = DB::table('dupak')->where('semester', $semester)->where('tahun', $request->tahun)->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->first();
            if(isset($dupak)){
            $jmlunsurutama = $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan;
            $jmlak = $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang;
            $jmltotal = $dupak->lama_pendidikan + $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang;}
        } else {
            $dupak = new \stdClass;
            $dupak->lama_pendidikan = 0;
            $dupak->lama_diklat = 0;
            $dupak->lama_pengawasan = 0;
            $dupak->lama_pengembangan = 0;
            $dupak->lama_penunjang = 0;
        }
        $pegawaidupak = DB::table('pegawai')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->get();
        $pegselect = DB::table('pegawai')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->get();
        $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->latest('TMT_PANGKAT')->get();
        $jabatan = DB::table('jabatan')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->latest('TMT_JABATAN')->get();
        $pendidikanpeg = DB::table('pendidikan')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->latest('created_at')->get();
        $pengawasan = DB::table('spt')->join('jenis_pengawasan', 'spt.ID_PENGAWASAN', '=', 'jenis_pengawasan.ID_PENGAWASAN')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'jenis_pengawasan.id_angka_kredit')->join('penugasan', 'spt.id', '=', 'penugasan.id_spt')->join('tugas', 'tugas.ID_TUGAS', '=', 'penugasan.ID_TUGAS')
        ->whereBetween('tgl_mulai',[$start,$end])->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->get();
        $diklat = DB::table('diklat')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'diklat.id_angka_kredit')
        ->whereBetween('TANGGAL_DIKLAT',[$start,$end])->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->get();
        $pengembangan = DB::table('dupak_detail_ppm')->join('dupak_ppm', 'dupak_ppm.id', '=', 'dupak_detail_ppm.ppm_id')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'dupak_ppm.id_angka_kredit')
        ->whereBetween('tgl_mulai',[$start,$end])->where('pegawai_id', $request->NIK_PEGAWAI)->get();
        $pendidikan = DB::table('pendidikan')->join('dupak_angka_kredit', 'dupak_angka_kredit.id', '=', 'pendidikan.id_angka_kredit')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->whereBetween('created_at',[$start,$end])->get();
        // $pendidikan = DB::table('dupak_pendidikan')->get();
        $penunjang = DB::table('dupak_penunjang')
        ->whereBetween('tanggal',[$start,$end])->where('pegawai_id', $request->NIK_PEGAWAI)->get();
        // $dupak = DB::table('dupak')->where('NIK_PEGAWAI', $request->NIK_PEGAWAI)->where('semester', $semester)->where('tahun', $tahun)->get();
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

        $totalpendidikan = $dupak->lama_pendidikan + $dupak->baru_pendidikan;
        $totaldiklat = $dupak->lama_diklat + $dupak->baru_diklat;
        $totalpengawasan = $dupak->lama_pengawasan + $dupak->baru_pengawasan;
        $totalpengembangan = $dupak->lama_pengembangan + $dupak->baru_pengembangan;
        $totalpenunjang = $dupak->lama_penunjang + $dupak->baru_penunjang;


        // var_dump($pangkat);
        $data = array(
            'menu' => 'dupak',
            'tahun' => $tahun,
            'nik' => $nik,
            'nama' => $nama,
            'semester' => $semester,
            'pegawai' => $pegawai,
            'dupak' => $dupak,
            'jmlunsurutama' => $jmlunsurutama,
            'jmlak' => $jmlak,
            'jmltotal' => $jmltotal,
            'pegawaidupak' => $pegawaidupak,
            'pegselect' => $pegselect,
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
            'submenu' => ''
        );
        // dd($pengawasan);
        return view('dupak/view_dupak',$data);
    }

    public function tambahDupak(Request $request)
    {   
        DB::table('dupak')->updateOrInsert(
            ['NIK_PEGAWAI' => $request->NIK_PEGAWAI, 'semester' => $request->semester, 'tahun' => $tahun = $request->tahun],
            [
                'lama_pendidikan' => $request->lama_pendidikan,
                'baru_pendidikan' => $request->baru_pendidikan,
                'lama_diklat' => $request->lama_diklat,
                'baru_diklat' => $request->baru_diklat,
                'lama_pengawasan' => $request->lama_pengawasan,
                'baru_pengawasan' => $request->baru_pengawasan,
                'lama_pengembangan' => $request->lama_pengembangan,
                'baru_pengembangan' => $request->baru_pengembangan,
                'lama_penunjang' => $request->lama_penunjang,
                'baru_penunjang' => $request->baru_penunjang,
            ]
        );

        // return redirect('/pegawai');
        return redirect('/dupak');
    }


















    public function pengawasan($id) 
    {
        $nama = Auth::user()->name;
        $penugasan = DB::table('penugasan')->join('tugas', 'tugas.ID_TUGAS', '=', 'penugasan.ID_TUGAS')->where('id', $id)->get();

        $data = array(
            'menu' => 'spt',
            'nama' => $nama,
            'penugasan' => $penugasan,
            'submenu' => ''
           
        );
        return view('dupak/form/insert_pengawasan',$data);
    }

    public function tambahPengawasan(Request $post)
    {  
        DB::table('dupak_detail_spt')->insert([
            'spt_id' => $post->id_spt,
            'pegawai_id' => $post->NIK_PEGAWAI,
            'peran' => $post->ID_TUGAS,
            'lama_jam' => $post->jumlah_jam,
            'efektif' => $post->efektif,
            'lembur' => $post->lembur,
            'koefisien' => $post->satuan_ak,
        ]);

        return redirect('/penugasan/insert_view_penugasan/'.$post->id_spt);
    }

    public function pengembangan($id) 
    {
        $nama = Auth::user()->name;
        $ppm = DB::table('dupak_ppm')->where('id', $id)->get();
        $pegawai = DB::table('pegawai')->get();

        $data = array(
            'menu' => 'ppm',
            'nama' => $nama,
            'ppm' => $ppm,
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('dupak/form/insert_pengembangan',$data);
    }

    public function tambahPengembangan(Request $post)
    {  
        DB::table('dupak_detail_ppm')->insert([
            'ppm_id' => $post->id_ppm,
            'pegawai_id' => $post->NIK_PEGAWAI,
            'peran' => $post->peran,
            'lama_jam' => $post->jumlah_jam,
            'efektif' => $post->efektif,
            'lembur' => $post->lembur,
            'koefisien' => $post->satuan_ak,
        ]);

        return redirect('/ppm');
    }

    public function pendidikan() 
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->get();

        $data = array(
            'menu' => 'dupak',
            'nama' => $nama,
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('dupak/form/insert_pendidikan',$data);
    }

    public function tambahPendidikan(Request $post)
    {  
        DB::table('dupak_pendidikan')->insert([
            'pegawai_id' => $post->NIK_PEGAWAI,
            'uraian_sub_unsur' => $post->uraian_sub_unsur,
            'butir_kegiatan' => $post->butir_kegiatan,
            'angka_kredit' => $post->angka_kredit,
            'keterangan' => $post->keterangan,
        ]);

        return redirect('/dupak');
    }

    public function penunjang() 
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->get();

        $data = array(
            'menu' => 'dupak',
            'nama' => $nama,
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('dupak/form/insert_penunjang',$data);
    }

    public function tambahPenunjang(Request $post)
    {  
        DB::table('dupak_penunjang')->insert([
            'pegawai_id' => $post->NIK_PEGAWAI,
            'kegiatan' => $post->kegiatan,
            'tanggal' => $post->tanggal,
            'satuan_ak' => $post->satuan_ak,
            'lama_jam' => $post->jumlah_jam,
            'keterangan' => $post->keterangan,
        ]);

        return redirect('/dupak');
    }

    public function diklat($id) 
    {
        $nama = Auth::user()->name;
        $diklat = DB::table('diklat')->where('ID_DIKLAT', $id)->get();

        $data = array(
            'menu' => 'pegawai',
            'nama' => $nama,
            'diklat' => $diklat,
            'submenu' => ''
           
        );
        return view('dupak/form/insert_diklat',$data);
    }

    public function tambahDiklat(Request $post)
    {  
        DB::table('dupak_detail_diklat')->insert([
            'diklat_id' => $post->id_diklat,
            'pegawai_id' => $post->NIK_PEGAWAI,
            'lama_jam' => $post->jumlah_jam,
            'efektif' => $post->efektif,
            'lembur' => $post->lembur,
            'koefisien' => $post->satuan_ak,
            'keterangan' => $post->keterangan,
        ]);

        return redirect('/diklat/insert_view_diklat/'.$post->NIK_PEGAWAI);
    }
}
