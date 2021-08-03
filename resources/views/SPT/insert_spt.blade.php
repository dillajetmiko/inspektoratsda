@extends("layout.mainlayout")
@section("page_title","Inspektorat || Tambah Data SPT")
@section("title","Data SPT")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/temuan">Temuan</a></li>
<li class="breadcrumb-item active">Tambah Temuan</li> 
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
        <h3 class="card-title">Tambah Data SPT</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->


        <form action="/spt/tambah_spt" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <!-- ID SPT : <input type="text" class="form-control" name="ID_SPT"><br> -->
        Nomor SPT : <input type="text" class="form-control" name="NOMOR_SPT"><br>
        Tanggal SPT : <input type="date" class="form-control" name="TANGGAL_SPT"><br>
        <!-- Dasar SPT : <input type="text" class="form-control" name="DASAR_SPT"><br> -->
        Jenis Pengawasan : 
            <select class="form-control select2" name="ID_PENGAWASAN">
            @foreach ($jenis_pengawasan as $jenis)
            <option value="{{ $jenis->ID_PENGAWASAN}}">{{ $jenis->NAMA_PENGAWASAN}}</option>
            @endforeach
            </select>
            <br>
        ISI SPT: <textarea type="text" class="form-control" name="ISI_SPT"></textarea><br>

        <textarea type="text" class="form-control" name="kepada">{{$kepada[0]->isi_kepada}}</textarea><br>
        FILE SPT:
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span></label>
            <input type='file' name='file' class="form-control">
       </div>
        <br> 

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