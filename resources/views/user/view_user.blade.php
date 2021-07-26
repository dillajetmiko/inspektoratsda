@extends("layout.mainlayout")

@section("page_title","USER")

@section("title","USER")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">User</li> 
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
	  <h3 class="card-title"> DATA USER</h3>
	  <div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	  </div>
  </div>
  <div class="card-body">
		<div class="card">
			<div class="card-header">
			<!-- <h3 class="card-title">Tambah Data Anggota</h3> -->
			<!-- <a href="/user/insert_user">
			<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data User</button>
			</a> -->
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th style="text-align:center">NIP</th>
				<th style="text-align:center">Nama</th>
				<th style="text-align:center">Jabatan</th>
				<th style="text-align:center">Pangkat</th>
				<th style="text-align:center" width="15%">Aksi</th>
				</tr>
				</thead>
				<tbody>
				@foreach($user as $data)
				<tr>
					<td>{{ $data->NIP }}</td>
					<td>{{ $data->name }}</td>
					<td>{{ $data->jabatan }}</td>
					<td>{{ $data->pangkat }}</td>
					<td><a href='/user/edit_user/{{ $data->NIP }}'>
					<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
					</a>
					<a href='/user/hapus/{{ $data->NIP }}'>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</a>
					</td>             
				</tr>
				@endforeach
				</tbody>
				<tfoot>
				</tfoot>
			</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
	<!-- <a href="/LHP/insert_lhp"><b>Tambah Data LHP</b></a> -->
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