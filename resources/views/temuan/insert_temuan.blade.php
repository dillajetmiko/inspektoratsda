@extends("layout.mainlayout")
@section("page_title","Inspektorat || Tambah Data Temuan")
@section("title","Data Temuan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/temuan">Temuan</a></li>
<li class="breadcrumb-item active">Tambah Temuan</li> 
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
        
        No LHP : 
            <select class="form-control" name="NOMOR_LHP">
            @foreach ($id2 as $lhp)
            <option value="{{ $lhp->NOMOR_LHP}}">{{ $lhp->NOMOR_LHP}}</option>
            @endforeach
            </select><br>

        Uraian Temuan : <input type="text" class="form-control" name="URAIAN_TEMUAN"><br>
        Kode Rekomendasi : <input type="text" class="form-control" name="KODE_REKOMENDASI"><br>
        Uraian Rekomendasi : <input type="text" class="form-control" name="URAIAN_REKOMENDASI"><br>
        Uraian Tindak Lanjut : <input type="text" class="form-control" name="URAIAN_TINDAK_LANJUT"><br>
        Status Tindak Lanjut :<br> 
            <label><input type="radio" name="KODE_STATUS" value="1" checked="checked" /> Belum Ditindak Lanjut </label><br>
            <label><input type="radio" name="KODE_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
            <label><input type="radio" name="KODE_STATUS" value="3" /> Sesuai rekomendasi </label><br><br>
        Jenis Pengawasan : <input type="text" class="form-control" name="JENIS_PENGAWASAN"><br>

        Nama OPD : 
            <select class="form-control" name="KODE_OPD">
            @foreach ($id as $opd)
            <option value="{{ $opd->KODE_OPD}}">{{ $opd->NAMA_OPD}}</option>
            @endforeach
            </select><br>

        Nama Pejabat : <input type="text" class="form-control" name="NAMA_PEJABAT"><br>
        Tanggal Temuan : <input type="date" class="form-control" name="TANGGAL_TEMUAN"><br>
        Tanggal Tindak Lanjut : <input type="date" class="form-control" name="TANGGAL_TINDAK_LANJUT"><br>
        Kerugian : <input type="text" class="form-control" name="KERUGIAN"><br>
        Jenis Temuan : 
            <select class="form-control" name="KODE_JENIS_TEMUAN">
            <option value="1">Internal</option>
            <option value="2">Eksternal</option>
            </select><br>
        Hasil Telaah Tindak Lanjut: <input type="text" class="form-control" name="HASIL_TELAAH"><br>
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