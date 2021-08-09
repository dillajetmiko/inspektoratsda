@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Jenis Pengawasan')

@section('title', 'Data Jenis Pengawasan')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/jenis_pengawasan">Jenis Pengawasan</a></li>
<li class="breadcrumb-item active">Update Jenis Pengawasan</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Jenis Pengawasan</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/jenis_pengawasan/update_jenis_pengawasan" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			ID Jenis Pengawasan : <input type="text" class="form-control" name="ID_PENGAWASAN" value="{{$jenis_pengawasan[0]->ID_PENGAWASAN}}" readonly><br>
			Nama Jenis Pengawasan : <input type="text" class="form-control" name="NAMA_PENGAWASAN" value="{{$jenis_pengawasan[0]->NAMA_PENGAWASAN}}"><br>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection