@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Rekomendasi')

@section('title', 'Data Rekomendasi')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/temuan">Temuan</a></li>
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
		<h3 class="card-title">Edit Data Rekomendasi</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/rekomendasi/update_rekomendasi" method="post">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

            id Temuan : <input type="text" class="form-control" name="ID_TEMUAN" value="{{$rekomendasi[0]->ID_TEMUAN}}" readonly><br>
            id Rekomendasi : <input type="text" class="form-control" name="id" value="{{$rekomendasi[0]->id}}" readonly><br>
            Kode Rekomedasi : <input type="text" class="form-control" name="KODE_REKOMENDASI" value="{{ $rekomendasi[0]->KODE_REKOMENDASI }}"><br>
            Uraian Rekomendasi : <input type="text" class="form-control" name="URAIAN_REKOMENDASI" value="{{ $rekomendasi[0]->URAIAN_REKOMENDASI }}"><br>
            Uraian Tindak Lanjut : <input type="text" class="form-control" name="URAIAN_TINDAK_LANJUT" value="{{ $rekomendasi[0]->URAIAN_TINDAK_LANJUT }}"><br>
            Status Tindak Lanjut :<br>
                @if ($rekomendasi[0]->ID_STATUS == 1) 
                <label><input type="radio" name="ID_STATUS" value="1" checked="checked"/> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="ID_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="ID_STATUS" value="3" /> Sesuai Rekomendasi </label><br>
                @elseif ($rekomendasi[0]->ID_STATUS == 2)
                <label><input type="radio" name="ID_STATUS" value="1" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="ID_STATUS" value="2" checked="checked"/> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="ID_STATUS" value="3" /> Sesuai Rekomendasi </label><br>
                @elseif ($rekomendasi[0]->ID_STATUS == 3)
                <label><input type="radio" name="ID_STATUS" value="1" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="ID_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="ID_STATUS" value="3" checked="checked"/> Sesuai Rekomendasi </label><br>
                @endif
                <br>

            Tanggal Tindak Lanjut : <input type="date" class="form-control" name="TANGGAL_TINDAK_LANJUT" value="{{ $rekomendasi[0]->TANGGAL_TINDAK_LANJUT }}"><br>
            Hasil Telaah Tindak Lanjut: <input type="text" class="form-control" name="HASIL_TELAAH_TINDAK_LANJUT" value="{{ $rekomendasi[0]->HASIL_TELAAH_TINDAK_LANJUT }}"><br>

            <button type="submit" class="btn btn-primary">Update</button>
			</form>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	
	</div>
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