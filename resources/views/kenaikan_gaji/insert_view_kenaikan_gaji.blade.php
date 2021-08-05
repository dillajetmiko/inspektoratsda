@extends("layout.mainlayout")

@section("page_title","Kenaikan Gaji")

@section("title","Kenaikan Gaji")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pegawai">PEGAWAI</a></li>
<li class="breadcrumb-item active">Kenaikan Gaji</li> 
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
	  <h3 class="card-title"> DATA KENAIKAN GAJI</h3>
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
					<form action="/kenaikan_gaji/insert_view_kenaikan_gaji" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					NIK Pegawai : <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$pegawai[0]->NIK_PEGAWAI}}" readonly><br>
					Nama Pegawai : <input type="text" class="form-control" name="NAMA_PEGAWAI" value="{{$pegawai[0]->NAMA_PEGAWAI}}" readonly><br>
					TMT : <input type="date" class="form-control" name="TMT_KENAIKAN_GAJI"><br>
					Nominal Gaji : <input type="text" class="form-control" name="NOMINAL_GAJI"><br>
                    Pangkat : 
						<select class="form-control select2" name="ID_PANGKAT">
						@foreach ($pangkat as $kat)
						<option value="{{ $kat->ID_PANGKAT}}">{{ $kat->NAMA_PANGKAT}}</option>
						@endforeach
						</select>
						</select><br>
					Golongan : <input type="text" class="form-control" name="NAMA_GOLONGAN"><br>
					Masa Kerja : <input type="text" class="form-control" name="MASA_KERJA"><br>

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
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">TMT</th>
						<th style="text-align:center">Nominal Gaji</th>
						<th style="text-align:center">Pangkat</th>
						<th style="text-align:center">Golongan</th>
						<th style="text-align:center">Masa Kerja</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($kenaikan_gaji as $data)
					<tr>
					<td>{{ $data->TMT_KENAIKAN_GAJI }}</td>
					<td>{{ $data->NOMINAL_GAJI }}</td>
					<td>
						@foreach($pangkat as $pang)
						@if ($pang->ID_PANGKAT === $data->ID_PANGKAT)
						{{$pang->NAMA_PANGKAT}}
						@endif
						@endforeach
						</td> 
					<td>{{ $data->NAMA_GOLONGAN }}</td>
					<td>{{ $data->MASA_KERJA }}</td>
										
					<td>
					<a href='/kenaikan_gaji/hapus/{{ $data->ID_KENAIKAN_GAJI }}&&{{ $data->NIK_PEGAWAI }}'>
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