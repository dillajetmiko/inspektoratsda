@extends("layout.mainlayout")
@section("page_title","Inspektorat || Tambah ppm")
@section("title","Data ppm")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/ppm">ppm</a></li>
<li class="breadcrumb-item active">Tambah ppm</li> 
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
        <h3 class="card-title">Tambah ppm</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
      <form action="/ppm/tambah_ppm" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        Kegiatan : <input type="text" class="form-control" name="kegiatan"><br>
        Tanggal Mulai : <input type="date" class="form-control" name="tgl_mulai"><br>
        <!-- Jenis PPM : <input type="text" class="form-control" name="jenis_ppm"><br> -->
        Jenis PPM : 
            <select class="form-control select2" name="jenis_ppm">
            @foreach ($jenis as $jn)
            <option value="{{ $jn->id}}">{{ $jn->nama_jenis}}</option>
            @endforeach
            </select>
            <br>
        Jumlah Jam : <input type="text" class="form-control" name="jumlah_jam"><br>
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