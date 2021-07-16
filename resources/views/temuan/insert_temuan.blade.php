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
 <form action="/anggota/insertData" method="post">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
 Kode Temuan : <input type="text" class="form-control" name="kode_temuan"><br>
 Uraian Temuan : <input type="text" class="form-control" name="uraian_temuan"><br>
 Rekomendasi : <input type="text" class="form-control" name="rekomendasi"><br>
 Nama OPD : <input type="text" class="form-control" name="nama_opd"><br>
 Nama Pejabat : <input type="text" class="form-control" name="nama_pejabat"><br>
 Tanggal Temuan : <input type="date" class="form-control" name="tanggal_temuan"><br>
 Tanggal Tindak Lanjut : <input type="date" class="form-control" name="tanggal_tindak_lanjut"><br>
 Nomor LHP : <input type="text" class="form-control" name="nomor_lhp"><br>
 Kerugian : <input type="text" class="form-control" name="kerugian"><br>
 <!-- Status Anggota : <input type="tinyint" class="form-control" name="status_anggota"><br> -->
 Status :<br> 
            <label><input type="radio" name="status" value="0" checked="checked" /> Belum Ditindak Lanjut </label><br>
            <label><input type="radio" name="status" value="1" /> Belum Sesuai Rekomendasi </label><br>
            <label><input type="radio" name="status" value="2" /> Sesuai rekomendasi </label><br><br>
  Hasil Telaah Tindak Lanjut: <input type="text" class="form-control" name="hasil_telaah"><br>
  Jenis Temuan : 
            <select class="form-control" name="id_bahasa">
            <option value="1">internal</option>
            <option value="2">eksternal</option>
            </select><br>
 <button type="button" class="btn btn-primary">Simpan</button>
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