@extends("layout.mainlayout")
 @section("page_title","Inspektorat || Tambah Data Temuan")
 <!-- @section("title","Data Temuan") -->

 @section("breadcrumb")
 <li class="breadcrumb-item"><a href="#">Home</a></li>
 <li class="breadcrumb-item active">Blank Page</li> 
 @endsection

@section('custom_css')  
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
 <!-- Default box -->
 <div class="card">    
    <div class="card-header">
        <h3 class="card-title">Tambah Data Temuan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
      
 <form action="/temuan/tambah_temuan" method="post">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        Kode Temuan : <input type="text" class="form-control" name="KODE_TEMUAN"><br>
        Nomor LHP : 
                <select class="form-control" name="NOMOR_LHP">
                    @foreach ($id2 as $LHP)
                    @if ($LHP->NOMOR_LHP === $temuan[0]->NOMOR_LHP)
                    <option value="{{ $LHP->NOMOR_LHP}}" selected>{{ $LHP->NOMOR_LHP}}</option>
                    @else
                    <option value="{{ $LHP->NOMOR_LHP}}">{{ $LHP->NOMOR_LHP}}</option>
                    @endif
                    @endforeach
                </select> <br>
        Uraian Temuan : <input type="text" class="form-control" name="URAIAN_TEMUAN"><br>
        Kode Rekomendasi : <input type="text" class="form-control" name="KODE_REKOMENDASI"><br>
        Uraian Rekomendasi : <input type="text" class="form-control" name="URAIAN_REKOMENDASI"><br>
        Uraian Tindak Lanjut : <input type="text" class="form-control" name="URAIAN_TINDAK_LANJUT"><br>
        Status  : <br>
                <label><input type="radio" name="status" value="0" checked="checked" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="status" value="1" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="status" value="2" /> Sesuai rekomendasi </label><br><br>        
        <!-- @if ($temuan[0]->KODE_STATUS == 1) 
                <label><input type="radio" name="KODE_STATUS" value="1" checked="checked"/> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="KODE_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="KODE_STATUS" value="3" /> Sesuai Rekomendasi </label><br>
                @elseif ($temuan[0]->KODE_STATUS == 2)
                <label><input type="radio" name="KODE_STATUS" value="1" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="KODE_STATUS" value="2" checked="checked"/> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="KODE_STATUS" value="3" /> Sesuai Rekomendasi </label><br>
                @elseif ($temuan[0]->KODE_STATUS == 3)
                <label><input type="radio" name="KODE_STATUS" value="1" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="KODE_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="KODE_STATUS" value="3" checked="checked"/> Sesuai Rekomendasi </label><br>
                @endif -->
                <br>
        Jenis Pengawasan : <input type="text" class="form-control" name="JENIS_PENGAWASAN"><br>
        Nama OPD: 
        <select class="form-control" name="KODE_OPD">
                @foreach ($id as $OPD)
                @if ($OPD->KODE_OPD === $temuan[0]->KODE_OPD)
                <option value="{{ $OPD->KODE_OPD}}" selected>{{ $OPD->NAMA_OPD}}</option>
                @else
                <option value="{{ $OPD->KODE_OPD}}">{{ $OPD->NAMA_OPD}}</option>
                @endif
                @endforeach
        </select> <br>
        Nama Pejabat :<input type="text" class="form-control" name="NAMA_PEJABAT"><br>
        Tanggal Temuan : <input type="date" class="form-control" name="TANGGAL_TEMUAN"><br>
        Tanggal Tindak Lanjut : <input type="date" class="form-control" name="TANGGAL_TINDAK_LANJUT"><br>
        Kerugian: <input type="text" class="form-control" name="KERUGIAN"><br>
        Jenis Temuan : 
                <select class="form-control" name="kode_jenis_temuan">
                <option value="1">internal</option>
                <option value="2">eksternal</option>
        <!-- <select class="form-control" name="KODE_JENIS_TEMUAN">
                @foreach ($id3 as $JENIS_TEMUAN)
                @if ($JENIS_TEMUAN->KODE_JENIS_TEMUAN === $temuan[0]->KODE_JENIS_TEMUAN)
                <option value="{{ $JENIS_TEMUAN->KODE_JENIS_TEMUAN}}" selected>{{ $JENIS_TEMUAN->NAMA_JENIS_TEMUAN}}</option>
                @else 
                <option value="{{ $JENIS_TEMUAN->KODE_JENIS_TEMUAN}}">{{ $JENIS_TEMUAN->NAMA_JENIS_TEMUAN}}</option>
                @endif
                @endforeach
        </select> <br> -->
        Hasil Telaah : <input type="text" class="form-control" name="HASIL_TELAAH"><br>	

<!--         
 Kode Temuan : <input type="text" class="form-control" name="kode_temuan"><br>
 Uraian Temuan : <input type="text" class="form-control" name="uraian_temuan"><br>
 Rekomendasi : <input type="text" class="form-control" name="rekomendasi"><br>
 Nama OPD : <input type="text" class="form-control" name="nama_opd"><br>
 Nama Pejabat : <input type="text" class="form-control" name="nama_pejabat"><br>
 Tanggal Temuan : <input type="date" class="form-control" name="tanggal_temuan"><br>
 Tanggal Tindak Lanjut : <input type="date" class="form-control" name="tanggal_tindak_lanjut"><br>
 Nomor LHP : <input type="text" class="form-control" name="nomor_lhp"><br>
 Kerugian : <input type="text" class="form-control" name="kerugian"><br>
 Status :<br> 
            <label><input type="radio" name="status" value="0" checked="checked" /> Belum Ditindak Lanjut </label><br>
            <label><input type="radio" name="status" value="1" /> Belum Sesuai Rekomendasi </label><br>
            <label><input type="radio" name="status" value="2" /> Sesuai rekomendasi </label><br><br>
  Hasil Telaah Tindak Lanjut: <input type="text" class="form-control" name="hasil_telaah"><br>
  Jenis Temuan : 
            <select class="form-control" name="kode_jenis_temuan">
            <option value="1">internal</option>
            <option value="2">eksternal</option>
            </select><br> -->
 <button type="submit" class="btn btn-primary">Simpan</button>
 </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
</div>
      <!-- /.card -->
@endsection

@section('custom_script')
<!-- DataTables -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

@endsection