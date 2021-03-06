@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Tugas SPT')

@section('title', 'Data Tugas SPT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/tugas">Tugas SPT</a></li>
<li class="breadcrumb-item active">Update Tugas SPT</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Tugas SPT</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/tugas/update_tugas" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			ID Tugas : <input type="text" class="form-control" name="ID_TUGAS" value="{{$tugas[0]->ID_TUGAS}}" readonly><br>
			Nama Tugas : <input type="text" class="form-control" name="NAMA_TUGAS" value="{{$tugas[0]->NAMA_TUGAS}}"><br>
			Urutan : <input type="text" class="form-control" name="urutan" value="{{$tugas[0]->urutan}}"><br>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection