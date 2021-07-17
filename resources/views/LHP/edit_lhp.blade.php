@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit LHP')

@section('title', 'Data LHP')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/lhp">LHP</a></li>
<li class="breadcrumb-item active">Update Data</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Title</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/buku/updateBuku" method="post">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			</select><br>
			Nomor LHP : <input type="text" class="form-control" name="NOMOR_LHP" value="{{ $LHP[0]->NOMOR_LHP }}"><br>
            Tanggal : <input type="date" class="form-control" name="TANGGAL_LHP" value="{{ $LHP[0]->TANGGAL_LHP }}"><br>
            Judul Pemeriksaan : <input type="text" class="form-control" name="JUDUL_PEMERIKSAAN" value="{{ $LHP[0]->JUDUL_PEMERIKSAAN }}"><br>
			Anggaran: <input type="text" class="form-control" name="ANGGARAN" value="{{ $LHP[0]->ANGGARAN}}"><br>
			Upload file :<br>

			<input type="submit" value="Update">
		</form>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		Footer
	</div>
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection