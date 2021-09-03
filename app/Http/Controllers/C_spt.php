<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_spt extends Controller
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
        $dasar = DB::table('dasar')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'spt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'dasar' => $dasar,
            'pegawai' => $pegawai,
            'jenis_pengawasan' => $jenis_pengawasan,
            'years' => $years,
            'submenu' => ''
        );

        return view('SPT/view_spt',$data);
    }

    public function cari(Request $request)
	{
		$years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        // menangkap data pencarian
		$jenis = $request->jenis;
        $bulan = $request->bulan;
        $tahun = $request->year;
        $tanggal = $request->tanggal;

        // $spt = DB::table('penugasan')
        //                 ->leftJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
        //                 ->where('penugasan.NIK_PEGAWAI',$nik)
        //                 ->whereYear('tgl_mulai', $tahun)
        //                 ->whereMonth('tgl_mulai', $bulan)
        //                 ->get();
        // if($nik == 0){
        //     $spt = DB::table('spt')
        //                     ->where('tgl_mulai', '<=', $tanggal)
        //                     ->where('tgl_selesai', '>=', $tanggal)
        //                     ->get();
        // }else{
        //     $spt = DB::table('penugasan')
        //                     ->leftJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
        //                     ->where('penugasan.NIK_PEGAWAI',$nik)
        //                     ->where('tgl_mulai', '<=', $tanggal)
        //                     ->where('tgl_selesai', '>=', $tanggal)
        //                     ->get();
        // }
        // dd($spt);
        // return;

        // $tahun_mulai =  DB::table('spt')->whereYear('tgl_mulai', $tahun)->get();
        // $tahun_selesai =  DB::table('spt')->whereYear('tgl_selesai', $tahun)->get();
        // ->where('tgl_mulai', '<=', $tanggal)
        // ->where('tgl_selesai', '>=', $tanggal)

        // DB::table('spt')
        //     ->whereYear('tgl_mulai', $tahun)
        //     ->orWhere(function($query) {
        //         $query->whereYear('tgl_selesai', $tahun);
        //     })
        //     ->get();

        if ($bulan == 0 && $tahun == 0){
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)->get();
        }elseif($jenis == 0 && $tahun == 0){
            $spt = DB::table('spt')
            ->whereMonth('tgl_mulai', $bulan)
            ->orWhere(function($query) use ($bulan) {
                $query->whereMonth('tgl_selesai', $bulan);
            })
            ->get();
        }elseif($jenis == 0 && $bulan == 0){
            // $spt = DB::table('spt')->whereYear('tgl_mulai', $tahun)->get();
            $spt = DB::table('spt')
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($tahun) {
                $query->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }elseif($jenis == 0){
            $spt = DB::table('spt')
            ->whereMonth('tgl_mulai', $bulan)
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($bulan, $tahun) {
                $query->whereMonth('tgl_selesai', $bulan)
                        ->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }elseif($bulan == 0){
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($tahun) {
                $query->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }elseif($tahun == 0){
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)
            ->whereMonth('tgl_mulai', $bulan)
            ->orWhere(function($query) use ($bulan) {
                $query->whereMonth('tgl_selesai', $bulan);
            })
            ->get();
        }else{
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)
            ->whereMonth('tgl_mulai', $bulan)
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($bulan, $tahun) {
                $query->whereMonth('tgl_selesai', $bulan)
                        ->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }

        // dd($spt);
        // return;

        $nama = Auth::user()->name;
        $penugasan = DB::table('penugasan')->get();
        $dasar = DB::table('dasar')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'spt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'dasar' => $dasar,
            'pegawai' => $pegawai,
            'jenis_pengawasan' => $jenis_pengawasan,
            'years' => $years,
            'tanggal' => $tanggal,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('SPT/view_spt',$data);
 
	}

    public function export(Request $request)
	{
		$years=[];
        $year = date("Y");

        foreach (range($year, 2000) as $number) {
            array_push($years, $number);
        }
        // menangkap data pencarian
		$jenis = $request->jenis;
        $bulan = $request->bulan;
        $tahun = $request->year;
        $tanggal = $request->tanggal;

        if ($bulan == 0 && $tahun == 0){
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)->get();
        }elseif($jenis == 0 && $tahun == 0){
            $spt = DB::table('spt')
            ->whereMonth('tgl_mulai', $bulan)
            ->orWhere(function($query) use ($bulan) {
                $query->whereMonth('tgl_selesai', $bulan);
            })
            ->get();
        }elseif($jenis == 0 && $bulan == 0){
            // $spt = DB::table('spt')->whereYear('tgl_mulai', $tahun)->get();
            $spt = DB::table('spt')
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($tahun) {
                $query->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }elseif($jenis == 0){
            $spt = DB::table('spt')
            ->whereMonth('tgl_mulai', $bulan)
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($bulan, $tahun) {
                $query->whereMonth('tgl_selesai', $bulan)
                        ->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }elseif($bulan == 0){
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($tahun) {
                $query->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }elseif($tahun == 0){
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)
            ->whereMonth('tgl_mulai', $bulan)
            ->orWhere(function($query) use ($bulan) {
                $query->whereMonth('tgl_selesai', $bulan);
            })
            ->get();
        }else{
            $spt = DB::table('spt')->where('ID_PENGAWASAN',$jenis)
            ->whereMonth('tgl_mulai', $bulan)
            ->whereYear('tgl_mulai', $tahun)
            ->orWhere(function($query) use ($bulan, $tahun) {
                $query->whereMonth('tgl_selesai', $bulan)
                        ->whereYear('tgl_selesai', $tahun);
            })
            ->get();
        }

        // dd($spt);
        // return;

        $nama = Auth::user()->name;
        $penugasan = DB::table('penugasan')->get();
        $dasar = DB::table('dasar')->get();
        $pegawai = DB::table('pegawai')->get();
        $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

        $data = array(
            'menu' => 'spt',
            'nama' => $nama,
            'spt' => $spt,
            'penugasan' => $penugasan,
            'dasar' => $dasar,
            'pegawai' => $pegawai,
            'jenis_pengawasan' => $jenis_pengawasan,
            'years' => $years,
            'tanggal' => $tanggal,
            'submenu' => ''
        );
 
    		// mengirim data pegawai ke view index
		return view('SPT/export',$data);
	}
 
    public function download($ID_SPT)
    {
        $spt = DB::table('spt')->where('id', $ID_SPT)->get();
        // dd($lhp);
        // dd($lhp[0]);
        // $file = base64_decode($FILE_SPT);
        $path=storage_path('app/'.$spt[0]->FILE_SPT);
        return response()->download($path);
    }
 
     public function insertSpt()
     {
        $nama = Auth::user()->name;
         $spt = DB::table('spt')->get();
         $kepada = DB::table('isi_default')->where('id', 1)->get();
         $jenis_pengawasan = DB::table('jenis_pengawasan')->get();

         $data = array(
             'menu' => 'spt',
             'nama' => $nama,
             'spt' => $spt,
             'kepada' => $kepada,
             'jenis_pengawasan' => $jenis_pengawasan,
             'submenu' => ''
         );
 
         return view('SPT/insert_spt',$data); 
     }
 
     public function tambahSpt(Request $post)
     {  
        if($post->file('file')) { 
            // Validation
            $post->validate([
                'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
            ]); 

            $name = $post->file('file')->getClientOriginalName();

            // $path = $post->file('file')->store('public/files');  
            $path = $post->file('file')->storeAs('public/files',$post->NOMOR_SPT.$name);  
        }else{
            $path = null;
        }

         $id = DB::table('spt')->insertGetId([
            //  'ID_SPT' => $post->ID_SPT,
             'NOMOR_SPT' => $post->NOMOR_SPT,
             'TANGGAL_SPT' => $post->TANGGAL_SPT,
             'PKPT' => substr($post->TANGGAL_SPT,0,4),
             'DASAR_SPT' => $post->DASAR_SPT,
             'ISI_SPT' => $post->ISI_SPT,
             'ID_PENGAWASAN' => $post->ID_PENGAWASAN,
             'isi_kepada' => $post->kepada,
             'isi_jangka_waktu' => $post->isi_jangka_waktu,
             'tgl_mulai' => $post->tgl_mulai,
             'tgl_selesai' => $post->tgl_selesai,
             'FILE_SPT' => $path,
             'keterangan' => $post->keterangan
          
         ]);
 
         return redirect('/dasar/insert_view_dasar/'.$id);
     }
 
     public function editSpt($ID_SPT) 
     {
        $nama = Auth::user()->name;
         $spt = DB::table('spt')->where('id', $ID_SPT)->get();
         $jenis_pengawasan = DB::table('jenis_pengawasan')->get();
 
         $data = array(
             'menu' => 'spt',
             'nama' => $nama,
             'spt' => $spt,
             'jenis_pengawasan' => $jenis_pengawasan,
             'submenu' => ''
            
         );
         return view('SPT/edit_spt',$data);
     }
 
     public function updateSPt(Request $post)
     {
        if($post->file('file')) { 
            // Validation
            $post->validate([
                'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
            ]); 

            $name = $post->file('file')->getClientOriginalName();

            // $path = $post->file('file')->store('public/files');  
            $path = $post->file('file')->storeAs('public/files',$post->NOMOR_SPT.$name); 
            
            DB::table('spt')->where('id', $post->ID_SPT)->update([
                'NOMOR_SPT' => $post->NOMOR_SPT,
                'TANGGAL_SPT' => $post->TANGGAL_SPT,
                'PKPT' => substr($post->TANGGAL_SPT,0,4),
                'DASAR_SPT' => $post->DASAR_SPT,
                'ISI_SPT' => $post->ISI_SPT,         
                'ID_PENGAWASAN' => $post->ID_PENGAWASAN,   
                'isi_kepada' => $post->kepada,      
                'isi_jangka_waktu' => $post->isi_jangka_waktu,      
                'tgl_mulai' => $post->tgl_mulai,      
                'tgl_selesai' => $post->tgl_selesai,      
                'FILE_SPT' => $path,
                'keterangan' => $post->keterangan         
            ]);
        }else{
            DB::table('spt')->where('id', $post->ID_SPT)->update([
                'NOMOR_SPT' => $post->NOMOR_SPT,
                'TANGGAL_SPT' => $post->TANGGAL_SPT,
                'PKPT' => substr($post->TANGGAL_SPT,0,4),
                'DASAR_SPT' => $post->DASAR_SPT,
                'ISI_SPT' => $post->ISI_SPT,     
                'ID_PENGAWASAN' => $post->ID_PENGAWASAN,
                'isi_kepada' => $post->kepada,    
                'isi_jangka_waktu' => $post->isi_jangka_waktu,    
                'tgl_mulai' => $post->tgl_mulai,    
                'tgl_selesai' => $post->tgl_selesai,
                'keterangan' => $post->keterangan    
            ]);
        } 
 
         return redirect('/spt');
     }

     public function cetak() 
     {
        $nama = Auth::user()->name;
         $spt = DB::table('spt')->get();
 
         $data = array(
             'menu' => 'spt',
             'nama' => $nama,
             'spt' => $spt,
             'submenu' => ''
            
         );
         return view('SPT/cetak_spt',$data);
     }
 
     public function hapus($ID_SPT)
     {
         DB::table('penugasan')->where('id_spt',$ID_SPT)->delete();
         DB::table('dasar')->where('id_spt',$ID_SPT)->delete();
         DB::table('spt')->where('id',$ID_SPT)->delete();
         return redirect('/spt');
     }

     public function generateDocx($ID_SPT)
     {
         $spt = DB::table('spt')->where('id',$ID_SPT)->get();
         $penugasan = DB::table('penugasan')->where('id_spt',$ID_SPT)->get();
         $dasar = DB::table('dasar')->where('id_spt',$ID_SPT)->get();
         $pegawai = DB::table('pegawai')->get();
         $tugas = DB::table('tugas')->get();

         $penugasan = DB::table('penugasan')
                        ->leftJoin('tugas', 'tugas.ID_TUGAS', '=', 'penugasan.ID_TUGAS')
                        ->leftJoin('pegawai', 'pegawai.NIK_PEGAWAI', '=', 'penugasan.NIK_PEGAWAI')
                        ->orderBy('urutan', 'asc')
                        ->where('penugasan.id_spt',$ID_SPT)->get();
 
         // $spt[0]->NOMOR_SPT
         $data = array(
             'spt' => $spt,
             'penugasan' => $penugasan,
             'dasar' => $dasar,
             'pegawai' => $pegawai,
             'tugas' => $tugas,
         );
 
         $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Template_SPT.docx'));
 
         $templateProcessor->setValue('isiSPT', $spt[0]->ISI_SPT);
         $templateProcessor->setValue('isi_jangka_waktu', $spt[0]->isi_jangka_waktu);
         $templateProcessor->setValue('isi_kepada', $spt[0]->isi_kepada);
         
         $replacements = array(
             array('nama' => 'Batman', 'customer_address' => 'Gotham City'),
             array('customer_name' => 'Superman', 'customer_address' => 'Metropolis'),
         );
         $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
         
         // $replacements = array(
         //     array('kepada' => 'kepada', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
         //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
         //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
         //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
             
         // );
         // $templateProcessor->cloneRowAndSetValues('nama', $replacements);
 
         $n =0;
         $rows = [];
         foreach($dasar as $value){
             // echo "$value->uraian_dasar <br>";
             $n = $n+1;
             $row=(array) $value;
             $row['n']=$n;
             $row['dasar']='';
             // var_dump($row);
             array_push($rows, $row);
         }
         $rows[0]['dasar']='Dasar    :';
 
         $i =0;
         $rows1 = [];
       
         foreach($penugasan as $value1){
             
             $i = $i+1;
             $row1=(array) $value1;
             $row1['i']=$i;
             $row1['kepada']='';
             // var_dump($row1);
            //  foreach($pegawai as $peg){
            //      if($peg->NIK_PEGAWAI === $value1->NIK_PEGAWAI){
            //          $row1['nama']=$peg->NAMA_PEGAWAI;
            //          // var_dump($row1);
            //      }
            //  }
            //  foreach($tugas as $tug){
            //      if($tug->ID_TUGAS === $value1->ID_TUGAS){
            //          $row1['PENUGASAN']=$tug->NAMA_TUGAS;
            //          // var_dump($row1);
            //      }
            //  }
             array_push($rows1, $row1);
         }
         $rows1[0]['kepada']='Kepada :';
         // $das = array(
         //     array('dasar' => 'Dasar', 'n' => $n, 'isiDasar' => $value->uraian_dasar),
             // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Pemerintah Republik Indonesia Nomor 12 Tahun 2017'),
             // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2020 tentang'),
             // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Program Kerja Pengawasan Tahunan (PKPT) Inspektorat Daerah'), 
         // );
         // dd($das);
         
 
         $templateProcessor->cloneRowAndSetValues('dasar', $rows);
         $templateProcessor->cloneRowAndSetValues('kepada', $rows1);
 
         setlocale(LC_ALL, 'id_ID');
 
         // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));
 
         $templateProcessor->saveAs(storage_path('SPT.docx'));
 
         return response()->download(storage_path('SPT.docx'));
     }
    
     public function generateDocxOri1($ID_SPT)
    {
        $spt = DB::table('penugasan')
            ->rightJoin('spt', 'spt.id', '=', 'penugasan.id_spt')
            ->rightJoin('tugas', 'tugas.ID_TUGAS', '=','penugasan.ID_TUGAS')
            ->orderBy('urutan', 'desc')
            ->where('spt.id',$ID_SPT)->get();

            var_dump($spt);
            return;
        // $penugasan = DB::table('penugasan')->where('id_spt',$ID_SPT)->get();
        $dasar = DB::table('dasar')->where('id_spt',$ID_SPT)->get();
        $pegawai = DB::table('pegawai')->get();
        $tugas = DB::table('tugas')->get();

        // $spt[0]->NOMOR_SPT
        $data = array(
            'spt' => $spt,
            'penugasan' => $penugasan,
            'dasar' => $dasar,
            'pegawai' => $pegawai,
            'tugas' => $tugas,
        );

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Template_SPT.docx'));

        // Variables on different parts of document
        $templateProcessor->setValue('weekday', date('l'));            // On section/content
        $templateProcessor->setValue('time', date('H:i'));             // On footer
        $templateProcessor->setValue('serverName', realpath(__DIR__)); // On header

        // $templateProcessor->setValue('nomorSurat', $spt[0]->NOMOR_SPT);
        // $templateProcessor->setValue('dasar', $spt[0]->DASAR_SPT);
        $templateProcessor->setValue('isi_jangka_waktu', $spt[0]->ISI_SPT);
        
        $replacements = array(
            array('nama' => 'Batman', 'customer_address' => 'Gotham City'),
            array('customer_name' => 'Superman', 'customer_address' => 'Metropolis'),
        );
        $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
        
        // $replacements = array(
        //     array('kepada' => 'kepada', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
            
        // );
        // $templateProcessor->cloneRowAndSetValues('nama', $replacements);

        // dd($dasar);
        $n =0;
        $rows = [];
        foreach($dasar as $value){
            // echo "$value->uraian_dasar <br>";
            $n = $n+1;
            $row=(array) $value;
            $row['n']=$n;
            $row['dasar']='';
            // var_dump($row);
            array_push($rows, $row);
        }
        $rows[0]['dasar']='Dasar    :';

        $i =0;
        $rows1 = [];
      
        foreach($penugasan as $value1){
            
            $i = $i+1;
            $row1=(array) $value1;
            $row1['i']=$i;
            $row1['kepada']='';
            // var_dump($row1);
            foreach($pegawai as $peg){
                if($peg->NIK_PEGAWAI === $value1->NIK_PEGAWAI){
                    $row1['nama']=$peg->NAMA_PEGAWAI;
                    // var_dump($row1);
                }
            }
            foreach($tugas as $tug){
                if($tug->ID_TUGAS === $value1->ID_TUGAS){
                    $row1['PENUGASAN']=$tug->NAMA_TUGAS;
                    // var_dump($row1);
                }
            }
            array_push($rows1, $row1);
        }
        $rows1[0]['kepada']='Kepada :';
        // $das = array(
        //     array('dasar' => 'Dasar', 'n' => $n, 'isiDasar' => $value->uraian_dasar),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Pemerintah Republik Indonesia Nomor 12 Tahun 2017'),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2020 tentang'),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Program Kerja Pengawasan Tahunan (PKPT) Inspektorat Daerah'), 
        // );
        // dd($das);
        

        $templateProcessor->cloneRowAndSetValues('dasar', $rows);
        $templateProcessor->cloneRowAndSetValues('kepada', $rows1);

        setlocale(LC_ALL, 'id_ID');

        // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));

        $templateProcessor->saveAs(storage_path('SPT.docx'));

        return response()->download(storage_path('SPT.docx'));
    }

    public function generateDocxOri($ID_SPT)
    {
        $spt = DB::table('spt')->where('id',$ID_SPT)->get();
        $penugasan = DB::table('penugasan')->where('id_spt',$ID_SPT)->get();
        $dasar = DB::table('dasar')->where('id_spt',$ID_SPT)->get();
        $pegawai = DB::table('pegawai')->get();
        $tugas = DB::table('tugas')->get();

        // $spt[0]->NOMOR_SPT
        $data = array(
            'spt' => $spt,
            'penugasan' => $penugasan,
            'dasar' => $dasar,
            'pegawai' => $pegawai,
            'tugas' => $tugas,
        );

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Template_SPT.docx'));

        // Variables on different parts of document
        $templateProcessor->setValue('weekday', date('l'));            // On section/content
        $templateProcessor->setValue('time', date('H:i'));             // On footer
        $templateProcessor->setValue('serverName', realpath(__DIR__)); // On header

        // $templateProcessor->setValue('nomorSurat', $spt[0]->NOMOR_SPT);
        // $templateProcessor->setValue('dasar', $spt[0]->DASAR_SPT);
        $templateProcessor->setValue('isiSPT', $spt[0]->ISI_SPT);
        
        $replacements = array(
            array('nama' => 'Batman', 'customer_address' => 'Gotham City'),
            array('customer_name' => 'Superman', 'customer_address' => 'Metropolis'),
        );
        $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
        
        // $replacements = array(
        //     array('kepada' => 'kepada', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
            
        // );
        // $templateProcessor->cloneRowAndSetValues('nama', $replacements);

        // dd($dasar);
        $n =0;
        $rows = [];
        foreach($dasar as $value){
            // echo "$value->uraian_dasar <br>";
            $n = $n+1;
            $row=(array) $value;
            $row['n']=$n;
            $row['dasar']='';
            // var_dump($row);
            array_push($rows, $row);
        }
        $rows[0]['dasar']='Dasar    :';

        $i =0;
        $rows1 = [];
      
        foreach($penugasan as $value1){
            
            $i = $i+1;
            $row1=(array) $value1;
            $row1['i']=$i;
            $row1['kepada']='';
            // var_dump($row1);
            foreach($pegawai as $peg){
                if($peg->NIK_PEGAWAI === $value1->NIK_PEGAWAI){
                    $row1['nama']=$peg->NAMA_PEGAWAI;
                    // var_dump($row1);
                }
            }
            foreach($tugas as $tug){
                if($tug->ID_TUGAS === $value1->ID_TUGAS){
                    $row1['PENUGASAN']=$tug->NAMA_TUGAS;
                    // var_dump($row1);
                }
            }
            array_push($rows1, $row1);
        }
        $rows1[0]['kepada']='Kepada :';
        // $das = array(
        //     array('dasar' => 'Dasar', 'n' => $n, 'isiDasar' => $value->uraian_dasar),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Pemerintah Republik Indonesia Nomor 12 Tahun 2017'),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2020 tentang'),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Program Kerja Pengawasan Tahunan (PKPT) Inspektorat Daerah'), 
        // );
        // dd($das);
        

        $templateProcessor->cloneRowAndSetValues('dasar', $rows);
        $templateProcessor->cloneRowAndSetValues('kepada', $rows1);

        setlocale(LC_ALL, 'id_ID');

        // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));

        $templateProcessor->saveAs(storage_path('SPT.docx'));

        return response()->download(storage_path('SPT.docx'));
    }
  
}
