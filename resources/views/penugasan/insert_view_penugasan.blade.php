@extends("layout.mainlayout")

@section("page_title","Penugasan")

@section("title","Penugasan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">SPT</a></li>
<li class="breadcrumb-item active">Penugasan</li> 
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
	  <h3 class="card-title"> DATA PENUGASAN</h3>
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
					<form action="/penugasan/insert_view_penugasan" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					ID SPT : <input type="text" class="form-control" name="ID_SPT" value="{{$spt[0]->ID_SPT}}" readonly><br>
					Nama Pegawai : 
						<select class="form-control select2" name="NIP_PEGAWAI">
						@foreach ($pegawai as $peg)
						<option value="{{ $peg->NIP_PEGAWAI}}">{{ $peg->NAMA_PEGAWAI}}</option>
						@endforeach
						</select>
						<br>
					Penugasan : 
						<select class="form-control select2" name="ID_TUGAS">
						@foreach ($tugas as $tug)
						<option value="{{ $tug->ID_TUGAS}}">{{ $tug->NAMA_TUGAS}}</option>
						@endforeach
						</select>
						</select><br>
		
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/spt'>
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
						<th style="text-align:center">ID SPT</th>
						<th style="text-align:center">Nama Pegawai</th>
						<th style="text-align:center">Penugasan</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($penugasan as $data)
					<tr>
						<td>{{ $data->ID_SPT }}</td>
						<td>
						@foreach($pegawai as $datapeg)
						@if ($datapeg->NIP_PEGAWAI === $data->NIP_PEGAWAI)
						{{$datapeg->NAMA_PEGAWAI}}
						@endif
						@endforeach
						</td> 
						<td>
						@foreach($tugas as $datatug)
						@if ($datatug->ID_TUGAS === $data->ID_TUGAS)
						{{$datatug->NAMA_TUGAS}}
						@endif
						@endforeach 
						</td>
						<td>
						<!-- <a href='/penugasan/edit_penugasan/{{ $data->ID_SPT }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a> -->
						<a href='/penugasan/hapus/{{ $data->ID_SPT }}&{{ $data->NIP_PEGAWAI}}'>
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