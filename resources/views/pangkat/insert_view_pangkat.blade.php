@extends("layout.mainlayout")

@section("page_title","Pangkat")

@section("title","Data Pangkat")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
<li class="breadcrumb-item active">Pangkat</li> 
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
  @can('edit-hapus-pegawai')
	  <h3 class="card-title"> Tambah Pangkat</h3>
	  @endcan
	  <div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	  </div>
  </div>
  <div class="card-body">
		<div class="card">
		@can('edit-hapus-pegawai')
			<div class="card-header">
				<div class="form-group">
					<form action="/pangkat/insert_view_pangkat" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					NIK Pegawai : <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$pegawai[0]->NIK_PEGAWAI}}" readonly><br>
                    Nama Pegawai : <input type="text" class="form-control" name="NAMA_PEGAWAI" value="{{$pegawai[0]->NAMA_PEGAWAI}}" readonly><br>
                    TMT : <input type="date" class="form-control" name="TMT_PANGKAT"><br>
                    Pangkat/Golongan Ruang : <input type="text" class="form-control" name="NAMA_PANGKAT"><br>
					
                    <button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/diklat/insert_view_diklat/{{$pegawai[0]->NIK_PEGAWAI}}'>
					<button type="button" class="btn btn-info">Selesai</button>
					</a>
					</form>
				</div>
			</div>
			@endcan

			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">TMT</th>
						<th style="text-align:center">Pangkat/Golongan Ruang</th>
						@can('edit-hapus-pegawai')
						<th style="text-align:center" width="15%">Aksi</th>
						@endcan
					</tr>
					</thead>
					<tbody>
					@foreach($pangkat as $data)
					<tr>
						<td>{{ $data->TMT_PANGKAT }}</td>
						<td>{{ $data->NAMA_PANGKAT }}</td>
						@can('edit-hapus-pegawai')
						<td>
						<a href='/pangkat/hapus/{{ $data->ID_PANGKAT }}&{{ $data->NIK_PEGAWAI }}'>
						<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						</a>
						</td>    
						@endcan         
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