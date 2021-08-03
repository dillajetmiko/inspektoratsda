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
		<h3 class="card-title">Edit Data LHP</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/lhp/update_lhp" method="post" enctype="multipart/form-data">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			</select><br>
			Nomor LHP : <input type="text" class="form-control" name="NOMOR_LHP" value="{{$lhp[0]->NOMOR_LHP}}" readonly><br>
			Nomor SPT: 
                <select class="form-control select2" name="ID_SPT">
                @foreach ($id as $SPT)
                @if ($SPT->id === $lhp[0]->ID_SPT)
                <option value="{{ $SPT->id}}" selected>{{ $SPT->NOMOR_SPT}}</option>
                @else
                <option value="{{ $SPT->id}}">{{ $SPT->NOMOR_SPT}}</option>
                @endif
                @endforeach
                </select>
                <br>
            Tanggal : <input type="date" class="form-control" name="TANGGAL_LHP" value="{{$lhp[0]->TANGGAL_LHP}}"><br>
            Judul Pemeriksaan : <input type="text" class="form-control" name="JUDUL_PEMERIKSAAN" value="{{$lhp[0]->JUDUL_PEMERIKSAAN}}"><br>
			Anggaran: <input type="text" class="form-control" name="ANGGARAN" value="{{$lhp[0]->ANGGARAN}}"><br>
			Upload file :
			<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span></label>
			<!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->

				<input type='file' name='file' class="form-control">

				<!-- @if ($errors->has('file'))
				<span class="errormsg text-danger">{{ $errors->first('file') }}</span>
				@endif -->
			<!-- </div> -->
			</div>
			<br>
            
        <br><br>
        <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection