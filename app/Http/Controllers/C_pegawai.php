<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class C_pegawai extends Controller
{
    //
    public function index()
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'nama' => $nama,
            'pegawai' => $pegawai,
            'submenu' => ''
        );

        return view('pegawai/view_pegawai',$data);
    }

    public function insertPegawai()
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'nama' => $nama,
            'pegawai' => $pegawai,
            'submenu' => ''
        );

        return view('pegawai/insert_pegawai',$data); 
    }

    public function tambahPegawai(Request $post)
    {  
        DB::table('pegawai')->insert([
            'NIP_PEGAWAI' => $post->NIP_PEGAWAI,
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'NAMA_PEGAWAI' => $post->NAMA_PEGAWAI,
            'ALAMAT_PEGAWAI' => $post->ALAMAT_PEGAWAI,
            'JENIS_KELAMIN' => $post->JENIS_KELAMIN,
            'TTL_PEGAWAI' => $post->TTL_PEGAWAI,
            'NO_KARTU_PEGAWAI' => $post->NO_KARTU_PEGAWAI,
            'NO_KARTU_SUAMI_ISTRI' => $post->NO_KARTU_SUAMI_ISTRI,
            'NO_TASPEN' => $post->NO_TASPEN,
            'NO_HP' => $post->NO_HP,
            'UNIT_KERJA_PEGAWAI' => $post->UNIT_KERJA_PEGAWAI,
        ]);

        // return redirect('/pegawai');
        return redirect('/keluarga/insert_view_keluarga/'.$post->NIK_PEGAWAI);
    }

    public function editPegawai($NIK_PEGAWAI) 
    {
        $nama = Auth::user()->name;
        $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI', $NIK_PEGAWAI)->get();

        $data = array(
            'menu' => 'pegawai',
            'nama' => $nama,
            'pegawai' => $pegawai,
            'submenu' => ''
           
        );
        return view('pegawai/edit_pegawai',$data);
    }

    public function updatePegawai(Request $post)
    {
        DB::table('pegawai')->where('NIK_PEGAWAI', $post->NIK_PEGAWAI)->update([     
            'NIK_PEGAWAI' => $post->NIK_PEGAWAI,
            'NAMA_PEGAWAI' => $post->NAMA_PEGAWAI,
            'ALAMAT_PEGAWAI' => $post->ALAMAT_PEGAWAI,
            'JENIS_KELAMIN' => $post->JENIS_KELAMIN,
            'TTL_PEGAWAI' => $post->TTL_PEGAWAI,
            'NIP_PEGAWAI' => $post->NIP_PEGAWAI,
            'NO_KARTU_PEGAWAI' => $post->NO_KARTU_PEGAWAI,
            'NO_KARTU_SUAMI_ISTRI' => $post->NO_KARTU_SUAMI_ISTRI,
            'NO_TASPEN' => $post->NO_TASPEN,
            'NO_HP' => $post->NO_HP,
            'UNIT_KERJA_PEGAWAI' => $post->UNIT_KERJA_PEGAWAI,
        ]);

        return redirect('/pegawai');
    }

    public function hapus($NIK_PEGAWAI)
    {
        DB::table('keluarga')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
        DB::table('kenaikan_gaji')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
        DB::table('pangkat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
        DB::table('jabatan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
        DB::table('pendidikan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
        DB::table('diklat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
        $delete=DB::table('pegawai')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->delete();
    	if ($delete)
        {
            session()->flash('success', 'Data berhasil dihapus');
        }else{
            session()->flash('failed', 'Data gagal dihapus!');
        }
        
	    return redirect('/pegawai');
    }
    
    public function generateDocx($NIK_PEGAWAI)
     {
         $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
         $keluarga = DB::table('keluarga')->leftJoin('status_keluarga', 'status_keluarga.ID_STATUS_KELUARGA', '=', 'keluarga.ID_STATUS_KELUARGA')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
         $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
         $jabatan = DB::table('jabatan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
         $pendidikan = DB::table('pendidikan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
         $diklat = DB::table('diklat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
         $kenaikan_gaji = DB::table('kenaikan_gaji')->leftJoin('pangkat', 'pangkat.ID_PANGKAT', '=', 'kenaikan_gaji.ID_PANGKAT')->where('kenaikan_gaji.NIK_PEGAWAI',$NIK_PEGAWAI)->get();

         // $spt[0]->NOMOR_SPT
         $data = array(
             'pegawai' => $pegawai,
             'keluarga' => $keluarga,
             'pangkat' => $pangkat,
             'jabatan' => $jabatan,
             'pendidikan' => $pendidikan,
             'diklat' => $diklat,
             'kenaikan_gaji' => $kenaikan_gaji,
         );
 
         $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Template_pegawai.docx'));
 
         $templateProcessor->setValue('NIK_PEGAWAI', $pegawai[0]->NIK_PEGAWAI);
         $templateProcessor->setValue('NAMA_PEGAWAI', $pegawai[0]->NAMA_PEGAWAI);
         $templateProcessor->setValue('ALAMAT_PEGAWAI', $pegawai[0]->ALAMAT_PEGAWAI);
         $templateProcessor->setValue('TTL_PEGAWAI', $pegawai[0]->TTL_PEGAWAI);
         $templateProcessor->setValue('NIP_PEGAWAI', $pegawai[0]->NIP_PEGAWAI);
         $templateProcessor->setValue('NO_KARTU_PEGAWAI', $pegawai[0]->NO_KARTU_PEGAWAI);         
         $templateProcessor->setValue('NO_KARTU_SUAMI_ISTRI', $pegawai[0]->NO_KARTU_SUAMI_ISTRI);
         $templateProcessor->setValue('NO_TASPEN', $pegawai[0]->NO_TASPEN);
         $templateProcessor->setValue('NO_HP', $pegawai[0]->NO_HP);       
         $templateProcessor->setValue('UNIT_KERJA_PEGAWAI', $pegawai[0]->UNIT_KERJA_PEGAWAI);

        //  $templateProcessor->setValue('ID_RIWAYAT', $pegawai[0]->ID_RIWAYAT);         

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


 
        //  $n =0;
        //  $rows = [];
        //  foreach($dasar as $value){
        //      // echo "$value->uraian_dasar <br>";
        //      $n = $n+1;
        //      $row=(array) $value;
        //      $row['n']=$n;
        //      $row['dasar']='';
        //      // var_dump($row);
        //      array_push($rows, $row);
        //  }
        //  $rows[0]['dasar']='Dasar    :';
 
         $i =0;
         $rows1 = [];
       
         foreach($keluarga as $value1){
             
             $i = $i+1;
             $row1=(array) $value1;
             $row1['i']=$i;
            //  $row1['kepada']='';



            //  var_dump($row1);
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
        

         $j =0;
         $rows2 = [];
       
         foreach($pangkat as $value2){
             
             $j = $j+1;
             $row2=(array) $value2;
             $row2['j']=$j;
        array_push($rows2, $row2);
         }
        //  var_dump($rows2);
        //  return;

         $k =0;
         $rows3 = [];
         foreach($jabatan as $value3){
             
            $k = $k+1;
            $row3=(array) $value3;
            $row3['k']=$k;
       array_push($rows3, $row3);
        }
      
        $l =0;
         $rows4 = [];
         foreach($pendidikan as $value4){
             
            $l = $l+1;
            $row4=(array) $value4;
            $row4['l']=$l;
       array_push($rows4, $row4);
        }

        $m =0;
         $rows5 = [];
         foreach($diklat as $value5){
             
            $m = $m+1;
            $row5=(array) $value5;
            $row5['m']=$m;
       array_push($rows5, $row5);
        }
       
        $n =0;
         $rows6 = [];
         foreach($kenaikan_gaji as $value6){
             
            $n = $n+1;
            $row6=(array) $value6;
            $row6['n']=$n;
       array_push($rows6, $row6);
        }
         
        //  $rows1[0]['kepada']='Kepada :';



         // $das = array(
         //     array('dasar' => 'Dasar', 'n' => $n, 'isiDasar' => $value->uraian_dasar),
             // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Pemerintah Republik Indonesia Nomor 12 Tahun 2017'),
             // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2020 tentang'),
             // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Program Kerja Pengawasan Tahunan (PKPT) Inspektorat Daerah'), 
         // );
         // dd($das);
         
 

        //  $templateProcessor->cloneRowAndSetValues('dasar', $rows);
         $templateProcessor->cloneRowAndSetValues('NAMA_KELUARGA', $rows1);
         $templateProcessor->cloneRowAndSetValues('j', $rows2);
         $templateProcessor->cloneRowAndSetValues('k', $rows3);
         $templateProcessor->cloneRowAndSetValues('l', $rows4);
         $templateProcessor->cloneRowAndSetValues('m', $rows5);
         $templateProcessor->cloneRowAndSetValues('n', $rows6);




 
        //  setlocale(LC_ALL, 'id_ID');
 
         // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));
 
         $templateProcessor->saveAs(storage_path('Pegawai.docx'));
 
         return response()->download(storage_path('Pegawai.docx'));
     }
}
