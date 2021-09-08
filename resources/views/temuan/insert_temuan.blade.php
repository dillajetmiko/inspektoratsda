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
        Kode Temuan : 
            <select class="form-control select2" name="ID_KATEGORI">
						@foreach ($id4 as $kategori)
						<option value="{{ $kategori->KODE_KATEGORI}}">{{ $kategori->KODE_KATEGORI}}</option>
						@endforeach
						</select>
						</select><br>      
        No LHP : 
            <select class="form-control select2" name="ID_LHP">
            @foreach ($id2 as $lhp)
            <option value="{{ $lhp->id}}">{{ $lhp->NOMOR_LHP}}</option>
            @endforeach
            </select>
            <br>

        Uraian Temuan : <textarea type="text" class="form-control" name="URAIAN_TEMUAN"></textarea><br>
        Kerugian : <input type="text" class="form-control" name="KERUGIAN"><br>
        Jenis Temuan : 
            <select class="form-control" name="KODE_JENIS_TEMUAN">
            <option value="1">Internal</option>
            <option value="2">Eksternal</option>
            </select><br>
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