@extends("layout.mainlayout")

@section("page_title","Keluarga")

@section("title","Keluarga")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pegawai">PEGAWAI</a></li>
<li class="breadcrumb-item active">Keluarga</li> 
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
	  <h3 class="card-title"> DATA KELUARGA</h3>
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
					<form action="/keluarga/insert_view_keluarga" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					NIK Pegawai : <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$pegawai[0]->NIK_PEGAWAI}}" readonly><br>
					Nama Pegawai : <input type="text" class="form-control" name="NAMA_PEGAWAI" value="{{$pegawai[0]->NAMA_PEGAWAI}}" readonly><br>
					Nama Anggota Keluarga : <input type="text" class="form-control" name="NAMA_KELUARGA"><br>
                    Status Keluarga    : 
						<select class="form-control select2" name="ID_STATUS_KELUARGA">
						@foreach ($status as $sta)
						<option value="{{ $sta->ID_STATUS_KELUARGA}}">{{ $sta->NAMA_STATUS_KELUARGA}}</option>
						@endforeach
						</select>
						</select><br>
		
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/pendidikan/insert_view_pendidikan/{{$pegawai[0]->NIK_PEGAWAI}}'>
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
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">Nama Anggota Keluarga</th>
						<th style="text-align:center">Status Keluarga</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($keluarga as $data)
					<tr>
					<td>{{ $data->NAMA_KELUARGA }}</td>

						<td>
						@foreach($status as $datasta)
						@if ($datasta->ID_STATUS_KELUARGA === $data->ID_STATUS_KELUARGA)
						{{$datasta->NAMA_STATUS_KELUARGA}}
						@endif
						@endforeach
						</td> 
						<td>
						<a href='/keluarga/hapus/{{ $data->ID_KELUARGA }}&&{{ $data->NIK_PEGAWAI }}'>
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