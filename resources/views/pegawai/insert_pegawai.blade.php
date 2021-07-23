@extends("layout.mainlayout")
@section("page_title","Inspektorat || Tambah Pegawai")
@section("title","Data Pegawai")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/lhp">Pegawai</a></li>
<li class="breadcrumb-item active">Tambah Pegawai</li> 
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
        <h3 class="card-title">Tambah Pegawai</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
      <form action="/pegawai/tambah_pegawai" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        NIP : <input type="text" class="form-control" name="NIP_PEGAWAI"><br>
        Nama : <input type="text" class="form-control" name="NAMA_PEGAWAI"><br>
        Tempat Tanggal Lahir : <input type="text" class="form-control" name="TTL_PEGAWAI"><br>
        Alamat : <input type="text" class="form-control" name="ALAMAT_PEGAWAI"><br>
        No. HP : <input type="text" class="form-control" name="N0_HP"><br>
        Jabatan : <input type="text" class="form-control" name="JABATAN_PEGAWAI"><br>
        Pangkat : <input type="text" class="form-control" name="PANGKAT_PEGAWAI"><br>
        Unit Kerja : <input type="text" class="form-control" name="UNIT_KERJA_PEGAWAI"><br>

        <br> 
        <button type="submit" class="btn btn-primary">Simpan</button>

      </form>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  <!-- </div> -->
  <!-- </div> -->
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