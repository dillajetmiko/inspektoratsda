@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Temuan')

@section('title', 'Data Temuan')

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
		<h3 class="card-title">Edit Data Temuan</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/temuan/update_temuan" method="post">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			id : <input type="text" class="form-control" name="id" value="{{ $temuan[0]->id }}" readonly><br>
			Kode Temuan : <input type="text" class="form-control" name="ID_KATEGORI" value="{{ $temuan[0]->ID_KATEGORI }}"><br>

            Nomor LHP : 
                <select class="form-control select2" name="NOMOR_LHP">
                @foreach ($id2 as $LHP)
                @if ($LHP->NOMOR_LHP === $temuan[0]->NOMOR_LHP)
                <option value="{{ $LHP->NOMOR_LHP}}" selected>{{ $LHP->NOMOR_LHP}}</option>
                @else
                <option value="{{ $LHP->NOMOR_LHP}}">{{ $LHP->NOMOR_LHP}}</option>
                @endif
                @endforeach
                </select>
                <br>

            Uraian Temuan : <input type="text" class="form-control" name="URAIAN_TEMUAN" value="{{ $temuan[0]->URAIAN_TEMUAN }}"><br>
        	Kerugian: <input type="text" class="form-control" name="KERUGIAN" value="{{ $temuan[0]->KERUGIAN}}"><br>

            Jenis Temuan : 
                <select class="form-control" name="KODE_JENIS_TEMUAN">
                    @foreach ($id3 as $JENIS_TEMUAN)
                    @if ($JENIS_TEMUAN->KODE_JENIS_TEMUAN === $temuan[0]->KODE_JENIS_TEMUAN)
                    <option value="{{ $JENIS_TEMUAN->KODE_JENIS_TEMUAN}}" selected>{{ $JENIS_TEMUAN->NAMA_JENIS_TEMUAN}}</option>
                    @else 
                    <option value="{{ $JENIS_TEMUAN->KODE_JENIS_TEMUAN}}">{{ $JENIS_TEMUAN->NAMA_JENIS_TEMUAN}}</option>
                    @endif
                    @endforeach
                </select> <br>	
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