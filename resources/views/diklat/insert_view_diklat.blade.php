@extends("layout.mainlayout")

@section("page_title","Diklat")

@section("title","Diklat")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">SPT</a></li>
<li class="breadcrumb-item active">Diklat</li> 
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
	  <h3 class="card-title"> DATA DIKLAT</h3>
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
					<form action="/diklat/insert_view_diklat" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					NIK Pegawai : <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$pegawai[0]->NIK_PEGAWAI}}" readonly><br>
                    Nama Pegawai : <input type="text" class="form-control" name="NAMA_PEGAWAI" value="{{$pegawai[0]->NAMA_PEGAWAI}}" readonly><br>
                    Tanggal Diklat : <input type="date" class="form-control" name="TANGGAL_DIKLAT"><br>
                    Nama Diklat : <input type="text" class="form-control" name="NAMA_DIKLAT"><br>
					Penyelenggara Diklat : <input type="text" class="form-control" name="PENYELENGGARA_DIKLAT"><br>
                    Upload Sertifikat : 
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> File <span class="required">*</span></label>
                    <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->

                        <input type='file' name='file' class="form-control">

                        <!-- @if ($errors->has('file'))
                        <span class="errormsg text-danger">{{ $errors->first('file') }}</span>
                        @endif -->
                    <!-- </div> -->
                    </div>
					
                    <button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/kenaikan_gaji/insert_view_kenaikan_gaji/{{$pegawai[0]->NIK_PEGAWAI}}'>
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
						<th style="text-align:center">Tanggal Diklat</th>
						<th style="text-align:center">Nama Diklat</th>
						<th style="text-align:center">Penyelenggara Diklat</th>
						<th style="text-align:center">Upload Sertifikat</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($diklat as $data)
					<tr>
						<td>{{ $data->TANGGAL_DIKLAT }}</td>
						<td>{{ $data->NAMA_DIKLAT }}</td>
						<td>{{ $data->PENYELENGGARA_DIKLAT }}</td>
                        <td>
						@if ($data->UPLOAD_SERTIFIKAT_DIKLAT == null)
						Tidak ada file
						@else
						<a href="/diklat/download/{{ $data->ID_DIKLAT }}" class='btn btn-ghost-info'>
							<i class="fa fa-download"></i> Download
						</a>
						@endif
						</td>
						<td>
						<a href='/diklat/hapus/{{ $data->NIK_PEGAWAI }}'>
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