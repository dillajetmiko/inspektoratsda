@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit SPT')

@section('title', 'Data SPT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">Kepegawaian</a></li>
<li class="breadcrumb-item active">Update Data</li>
@endsection

@section('custom_css')  
<!-- Select2 -->
<link rel="stylesheet" href="{{asset ('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset ('asset/dist/css/adminlte.min.css')}}">
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

		<form action="/spt/update_spt" method="post" enctype="multipart/form-data">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			</select><br>
			ID SPT : <input type="text" class="form-control" name="ID_SPT" value="{{$spt[0]->id}}" readonly><br>
            Nomor SPT : <input type="text" class="form-control" name="NOMOR_SPT" value="{{$spt[0]->NOMOR_SPT}}"><br>
            Tanggal SPT : <input type="date" class="form-control" name="TANGGAL_SPT" value="{{$spt[0]->TANGGAL_SPT}}"><br>
			Jenis Pengawasan: 
                <select class="form-control select2" name="KODE_OPD">
                @foreach ($jenis_pengawasan as $jenis)
                @if ($jenis->ID_PENGAWASAN === $spt[0]->ID_PENGAWASAN)
                <option value="{{ $jenis->ID_PENGAWASAN}}" selected>{{ $jenis->NAMA_PENGAWASAN}}</option>
                @else
                <option value="{{ $jenis->ID_PENGAWASAN}}">{{ $jenis->NAMA_PENGAWASAN}}</option>
                @endif
                @endforeach
                </select>
                <br>
			<!-- Dasar SPT : <input type="text" class="form-control" name="DASAR_SPT" value="{{$spt[0]->DASAR_SPT}}"><br> -->
			<!-- ISI SPT : <input type="text" class="form-control" name="ISI_SPT" value="{{$spt[0]->ISI_SPT}}"><br> -->
			Tanggal Mulai : <input type="date" class="form-control" name="tgl_mulai" value="{{$spt[0]->tgl_mulai}}"><br>
			Tanggal Selesai : <input type="date" class="form-control" name="tgl_selesai" value="{{$spt[0]->tgl_selesai}}"><br>
            Isi SPT : 
			<textarea type="text" class="form-control" name="ISI_SPT">{{$spt[0]->ISI_SPT}}</textarea><br>
            <textarea type="text" class="form-control" name="isi_jangka_waktu">{{$spt[0]->isi_jangka_waktu}}</textarea><br>

			<textarea type="text" class="form-control" name="kepada">{{$spt[0]->isi_kepada}}</textarea><br>
			File SPT :
            <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span></label>
					<input type='file' name='file' class="form-control">
			</div>
			<br> 
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section('custom_script')
<!-- Select2 -->
<script src="{{asset ('asset/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

  });
</script>

@endsection