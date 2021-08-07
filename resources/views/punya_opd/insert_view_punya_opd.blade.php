@extends("layout.mainlayout")

@section("page_title","OPD")

@section("title","OPD")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/temuan">Temuan</a></li>
<li class="breadcrumb-item active">OPD</li> 
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
	  <h3 class="card-title"> DATA OPD</h3>
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
					<form action="/punya_opd/insert_view_punya_opd" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					id Rekomendasi : <input type="text" class="form-control" name="ID_REKOMENDASI" value="{{$rekomendasi[0]->id}}" readonly><br>
					Nama OPD : 
						<select class="form-control select2" name="KODE_OPD">
						@foreach ($opd as $o)
						<option value="{{ $o->KODE_OPD}}">{{ $o->NAMA_OPD}}</option>
						@endforeach
						</select>
						<br>
					Nama Pejabat : <input type="text" class="form-control" name="NAMA_PEJABAT"><br>
					Jabatan : <input type="text" class="form-control" name="JABATAN_PEJABAT"><br>
					NIP : <input type="text" class="form-control" name="NIP_PEJABAT"><br>
					
		
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/temuan'>
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
						<th style="text-align:center">id Rekomendasi</th>
						<th style="text-align:center">Nama OPD</th>
						<th style="text-align:center">Nama Pejabat</th>
						<th style="text-align:center">Nama Jabatan</th>
						<th style="text-align:center">NIP</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($punya_opd as $data)
					<tr>
						<td>{{ $data->ID_REKOMENDASI }}</td>
						<td>
							@foreach($opd as $op)
							@if ($op->KODE_OPD === $data->KODE_OPD)
							{{$op->NAMA_OPD}}
							@endif
							@endforeach
						</td> 
						
						<td>{{ $data->NAMA_PEJABAT }}</td>
						<td>{{ $data->JABATAN_PEJABAT }}</td>
						<td>{{ $data->NIP_PEJABAT }}</td>
						<td>
						<!-- <a href='/punya_opd/edit_punya_opd/{{ $data->ID_REKOMENDASI }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a> -->
						<a href='/punya_opd/hapus/{{ $data->ID_REKOMENDASI }}&{{ $data->KODE_OPD}}'>
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