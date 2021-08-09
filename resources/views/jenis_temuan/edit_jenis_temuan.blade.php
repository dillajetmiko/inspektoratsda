@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit OPD')

@section('title', 'Data OPD')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/opd">OPD</a></li>
<li class="breadcrumb-item active">Update OPD</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit OPD</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/opd/update_opd" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			Kode OPD : <input type="text" class="form-control" name="KODE_OPD" value="{{$opd[0]->KODE_OPD}}" readonly><br>
			Nama OPD : <input type="text" class="form-control" name="NAMA_OPD" value="{{$opd[0]->NAMA_OPD}}"><br>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection