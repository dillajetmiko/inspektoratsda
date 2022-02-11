@extends("layout.mainlayout")

@section("page_title","Penugasan")

@section("title","PENUGASAN")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">SPT</a></li>
<li class="breadcrumb-item active">Penugasan</li> 
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
		@can('edit-hapus-spt')
			<div class="card-header">
				<div class="form-group">
					<form action="/penugasan/insert_view_penugasan" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					ID SPT : <input type="text" class="form-control" name="ID_SPT" value="{{$spt[0]->id}}" readonly><br>
					Nama Pegawai : 
						<select class="form-control select2" name="NIK_PEGAWAI">
						@foreach ($pegawai as $peg)
						<option value="{{ $peg->NIK_PEGAWAI}}">{{ $peg->NAMA_PEGAWAI}}</option>
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
			@endcan

			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">Nama Pegawai</th>
						<th style="text-align:center">Penugasan</th>
						@can('edit-hapus-spt')
						<th style="text-align:center" width="15%">Aksi</th>
						@endcan
					</tr>
					</thead>
					<tbody>
					@foreach($penugasan as $data)
					<tr>
						<!-- <td>{{ $data->id }}</td> -->
						<td>
						@foreach($pegawai as $datapeg)
						@if ($datapeg->NIK_PEGAWAI === $data->NIK_PEGAWAI)
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
						@can('edit-hapus-spt')
						<td>
						<!-- <a href='/penugasan/edit_penugasan/{{ $data->id }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a> -->
						<!-- <button onclick="confirmDelete({{ $data->id }}&{{ $data->id_spt}})" class="btn btn-danger btn-sm"> Hapus</button> -->
						<a href='/penugasan/hapus/{{ $data->id }}&{{ $data->id_spt}}'>
						<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						</a>
						<!-- <a href='/dupak/pengawasan/{{ $data->id }}'>
						<button type="button" class="btn btn-warning">Pengawasan</button>
						</a> -->
						<!-- Button trigger modal -->
						<!-- <button type="button" onclick="pengawasan('{{ $data->id }}')" class="btn btn-warning" data-toggle="modal" data-target="#dupakpengawasan">
							Pengawasan
						</button> -->
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

<!-- Modal Pengawasan-->
<div class="modal fade bd-example-modal-lg" id="dupakpengawasan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form id="pengawasan" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
						Satuan AK: <input type="text" class="form-control" name="NIP_PEGAWAI"><br>
						Jumlah Jam : <input type="text" class="form-control" name="NO_KARTU_PEGAWAI"><br>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
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