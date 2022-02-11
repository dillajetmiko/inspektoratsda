@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Pegawai')

@section('title', 'Data Pegawai')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
<li class="breadcrumb-item active">Update Pegawai</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Pegawai</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/pegawai/update_pegawai" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			</select><br>
			NIK : <input type="text" class="form-control" name="NIK_PEGAWAI" value="{{$pegawai[0]->NIK_PEGAWAI}}" readonly><br>
			Nama : <input type="text" class="form-control" name="NAMA_PEGAWAI" value="{{$pegawai[0]->NAMA_PEGAWAI}}"><br>
			Alamat : <input type="text" class="form-control" name="ALAMAT_PEGAWAI" value="{{$pegawai[0]->ALAMAT_PEGAWAI}}"><br>
			Tempat Tanggal Lahir : <input type="text" class="form-control" name="TTL_PEGAWAI" value="{{$pegawai[0]->TTL_PEGAWAI}}"><br>
			NIP : <input type="text" class="form-control" name="NIP_PEGAWAI" value="{{$pegawai[0]->NIP_PEGAWAI}}"><br>
			No. Kartu Pegawai : <input type="text" class="form-control" name="NO_KARTU_PEGAWAI" value="{{$pegawai[0]->NO_KARTU_PEGAWAI}}"><br>
			No. Kartu Suami/istri : <input type="text" class="form-control" name="NO_KARTU_SUAMI_ISTRI" value="{{$pegawai[0]->NO_KARTU_SUAMI_ISTRI}}"><br>
            No. Taspen : <input type="text" class="form-control" name="NO_TASPEN" value="{{$pegawai[0]->NO_TASPEN}}"><br>
            No. Telepon : <input type="text" class="form-control" name="NO_HP" value="{{$pegawai[0]->NO_HP}}"><br>	
            Unit Kerja : <input type="text" class="form-control" name="UNIT_KERJA_PEGAWAI" value="{{$pegawai[0]->UNIT_KERJA_PEGAWAI}}"><br>

            
        <br><br>
        <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection