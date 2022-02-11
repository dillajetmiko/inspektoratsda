@extends("layout.mainlayout")
@section("page_title","Inspektorat || Pendidikan")
@section("title","Pendidikan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/dupak">Dupak</a></li>
<li class="breadcrumb-item active">Pendidikan</li> 
@endsection

@section('custom_css')  
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset ('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset ('asset/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
 <!-- Default box -->
 <div class="card">    
    <div class="card-header">
        <h3 class="card-title">Tambah Pendidikan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
      <form action="/dupak/tambah_pendidikan" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        Pegawai :
        <select class="form-control select2" name="NIK_PEGAWAI">
        @foreach ($pegawai as $peg)
        <option value="{{ $peg->NIK_PEGAWAI}}">{{ $peg->NAMA_PEGAWAI}}</option>
        @endforeach
        </select>
        <br>
        uraian_sub_unsur: <input type="text" class="form-control" name="uraian_sub_unsur"><br>
        butir_kegiatan: <input type="text" class="form-control" name="butir_kegiatan"><br>
        angka_kredit: <input type="text" class="form-control" name="angka_kredit"><br>
        keterangan : <input type="text" class="form-control" name="keterangan"><br>
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
<!-- Select2 -->
<script src="{{asset ('asset/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    //Initialize Select2 Elements
    $('.select2').select2()

  });
</script>

@endsection