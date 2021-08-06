@extends("layout.mainlayout")
@section("page_title","Inspektorat || Tambah LHP")
@section("title","Data LHP")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/lhp">LHP</a></li>
<li class="breadcrumb-item active">Tambah LHP</li> 
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
        <h3 class="card-title">Tambah LHP</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
      <form action="/lhp/tambah_lhp" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        Nomor LHP : <input type="text" class="form-control" name="NOMOR_LHP"><br>
        NOMOR SPT : 
            <select class="form-control select2" name="ID_SPT">
            @foreach ($id as $spt)
            <option value="{{ $spt->id}}">{{ $spt->NOMOR_SPT}}</option>
            @endforeach
            </select>
            <br>
        Tanggal LHP : <input type="date" class="form-control" name="TANGGAL_LHP"><br>
        Judul Pemeriksaan : <input type="text" class="form-control" name="JUDUL_PEMERIKSAAN"><br>
        Anggaran : <input type="text" class="form-control" name="ANGGARAN"><br>

        Upload file : 
        <!-- <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="file">
              <label class="custom-file-label" for="file">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text" id="submit">Upload</span>
            </div>
          </div>
        </div> -->

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span></label>
          <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->

            <input type='file' name='file' class="form-control">

            <!-- @if ($errors->has('file'))
              <span class="errormsg text-danger">{{ $errors->first('file') }}</span>
            @endif -->
          <!-- </div> -->
        </div>
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