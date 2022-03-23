@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Kategori Temuan')

@section('title', 'Data Kategori Temuan')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/kategori_temuan">Kategori Temuan</a></li>
<li class="breadcrumb-item active">Update Kategori Temuan</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Kategori Temuan</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/kategori_temuan/update_kategori_temuan" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			ID Jenis Pengawasan : <input type="text" class="form-control" name="KODE_KATEGORI" value="{{$kategori_temuan[0]->KODE_KATEGORI}}" readonly><br>
			Nama Jenis Pengawasan : <input type="text" class="form-control" name="URAIAN_KATEGORI" value="{{$kategori_temuan[0]->URAIAN_KATEGORI}}"><br>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection