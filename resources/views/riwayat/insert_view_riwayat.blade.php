@extends("layout.mainlayout")

@section("page_title","Riwayat")

@section("title","Riwayat")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">SPT</a></li>
<li class="breadcrumb-item active">Riwayat</li> 
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
	  <h3 class="card-title"> DATA RIWAYAT</h3>
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
				<div class="form-group">
					<form action="/riwayat/insert_view_riwayat" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					NIP Pegawai: <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$pegawai[0]->NIK_PEGAWAI}}" readonly><br>
					Pangkat : <input type="text" class="form-control" name="riwayat_pangkat"><br>
					Jabatan : <input type="text" class="form-control" name="riwayat_jabatan"><br>
					Pendidikan : <input type="text" class="form-control" name="riwayat_pendidikan"><br>
					Diklat : <input type="text" class="form-control" name="riwayat_diklat"><br>
							
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/pegawai'>
					<button type="button" class="btn btn-info">Selesai</button>
					</a>
					</form>
				</div>
			</div>
			

			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">NIK Pegawai</th>
						<th style="text-align:center">Pangkat</th>
						<th style="text-align:center">Jabatan</th>
						<th style="text-align:center">Pendidikan</th>
						<th style="text-align:center">Diklat</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($riwayat as $data)
					<tr>
						<td>{{ $data->NIK_PEGAWAI }}</td>
						<td>{{ $data->riwayat_pangkat }}</td>
						<td>{{ $data->riwayat_jabatan }}</td>
						<td>{{ $data->riwayat_pendidikan }}</td>
						<td>{{ $data->riwayat_diklat }}</td>
						<td>
						<a href='/riwayat/hapus/{{ $data->id }}&{{ $data->NIK_PEGAWAI}}'>
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