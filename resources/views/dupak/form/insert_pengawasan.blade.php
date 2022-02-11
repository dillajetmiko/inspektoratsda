@extends("layout.mainlayout")
@section("page_title","Inspektorat || Pengawasan")
@section("title","Pengawasan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">SPT</a></li>
<li class="breadcrumb-item active">Pengawasan</li> 
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
        <h3 class="card-title">Tambah Pengawasan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
      <form action="/dupak/tambah_pengawasan" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <input type="text" class="form-control" name="id_spt" value="{{$penugasan[0]->id_spt}}" hidden>
        <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$penugasan[0]->NIK_PEGAWAI}}" hidden>
        <input type="text" class="form-control" name="ID_TUGAS" value="{{$penugasan[0]->NAMA_TUGAS}}" hidden>
        Satuan AK: <input type="text" class="form-control" name="satuan_ak"><br>
        Jumlah Jam : <input type="text" class="form-control" name="jumlah_jam"><br>
        Efektif : <input type="text" class="form-control" name="efektif"><br>
        Lembur : <input type="text" class="form-control" name="lembur"><br>
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