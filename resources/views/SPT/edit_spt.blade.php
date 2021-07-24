@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit SPT')

@section('title', 'Data SPT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">Kepegawaian</a></li>
<li class="breadcrumb-item active">Update Data</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data SPT</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/spt/update_spt" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			</select><br>
			ID SPT : <input type="text" class="form-control" name="ID_SPT" value="{{$spt[0]->ID_SPT}}" readonly><br>
            Nomor SPT : <input type="text" class="form-control" name="NOMOR_SPT" value="{{$spt[0]->NOMOR_SPT}}"><br>
            Tanggal SPT : <input type="date" class="form-control" name="TANGGAL_SPT" value="{{$spt[0]->TANGGAL_SPT}}"><br>
			Dasar SPT : <input type="text" class="form-control" name="DASAR_SPT" value="{{$spt[0]->DASAR_SPT}}"><br>
            Isi SPT : <input type="text" class="form-control" name="ISI_SPT" value="{{$spt[0]->ISI_SPT}}"><br>
			File SPT : <input type="text" class="form-control" name="FILE_SPT" value="{{$spt[0]->FILE_SPT}}"><br>
            
        <br><br>
        <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection