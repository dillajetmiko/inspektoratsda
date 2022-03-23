@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit PPM')

@section('title', 'Data PPM')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/ppm">PPM</a></li>
<li class="breadcrumb-item active">Update PPM</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit PPM</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/ppm/update_ppm" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
			
			ID : <input type="text" class="form-control" name="id" value="{{$ppm[0]->id}}" readonly><br>
			Kegiatan : <input type="text" class="form-control" name="kegiatan" value="{{$ppm[0]->kegiatan}}"><br>
			Tanggal Mulai : <input type="date" class="form-control" name="tgl_mulai" value="{{$ppm[0]->tgl_mulai}}"><br>
			<!-- Jenis PPM : <input type="text" class="form-control" name="jenis_ppm"><br> -->
			Jenis PPM : 
				<select class="form-control select2" name="jenis_ppm">
				@foreach ($jenis as $jn)
				@if ($jn->id === $ppm[0]->id_angka_kredit)
				<option value="{{ $jn->id }}" selected>{{ $jn->nama_jenis }}</option>
				@else
                <option value="{{ $jn->id }}">{{ $jn->nama_jenis }}</option>
                @endif
				@endforeach
				</select>
				<br>
			Jumlah Jam : <input type="text" class="form-control" name="lama_jam" value="{{$ppm[0]->lama_jam}}"><br>

            
        <br><br>
        <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection