@extends("layout.mainlayout")
 @section("page_title","Inspektorat || Tambah Data User")
 @section("title","Data User")

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
        <h3 class="card-title">Tambah Data User</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data User</h1> -->
 <form action="/user/tambah_user" method="post">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
 NIP : <input type="text" class="form-control" name="NIP"><br>
 Nama : <input type="text" class="form-control" name="name"><br>
 Email : <input type="text" class="form-control" name="email"><br>
 Password : <input type="password" class="form-control" name="password"><br>
 <!-- Jabatan : <input type="text" class="form-control" name="jabatan"><br>
 Pangkat : <input type="text" class="form-control" name="pangkat"><br>  -->
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