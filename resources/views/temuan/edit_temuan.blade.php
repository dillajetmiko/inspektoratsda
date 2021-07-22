@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit Temuan')

@section('title', 'Data Temuan')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/temuan">Temuan</a></li>
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

		<form action="/temuan/update_temuan" method="post">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
			</select><br>
			Kode Temuan : <input type="text" class="form-control" name="KODE_TEMUAN" value="{{ $temuan[0]->KODE_TEMUAN }}" readonly><br>

            Nomor LHP : 
                <select class="form-control" name="NOMOR_LHP">
                    @foreach ($id2 as $LHP)
                    @if ($LHP->NOMOR_LHP === $temuan[0]->NOMOR_LHP)
                    <option value="{{ $LHP->NOMOR_LHP}}" selected>{{ $LHP->NOMOR_LHP}}</option>
                    @else
                    <option value="{{ $LHP->NOMOR_LHP}}">{{ $LHP->NOMOR_LHP}}</option>
                    @endif
                    @endforeach
                </select> <br>

            Uraian Temuan : <input type="text" class="form-control" name="URAIAN_TEMUAN" value="{{ $temuan[0]->URAIAN_TEMUAN }}"><br>
            Kode Rekomendasi : <input type="text" class="form-control" name="KODE_REKOMENDASI" value="{{ $temuan[0]->KODE_REKOMENDASI }}"><br>
            Uraian Rekomendasi : <input type="text" class="form-control" name="URAIAN_REKOMENDASI" value="{{ $temuan[0]->URAIAN_REKOMENDASI }}"><br>
            Uraian Tindak Lanjut : <input type="text" class="form-control" name="URAIAN_TINDAK_LANJUT" value="{{ $temuan[0]->URAIAN_TINDAK_LANJUT }}"><br>
            
            Status  : <br>
                @if ($temuan[0]->KODE_STATUS == 1) 
                <label><input type="radio" name="KODE_STATUS" value="1" checked="checked"/> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="KODE_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="KODE_STATUS" value="3" /> Sesuai Rekomendasi </label><br>
                @elseif ($temuan[0]->KODE_STATUS == 2)
                <label><input type="radio" name="KODE_STATUS" value="1" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="KODE_STATUS" value="2" checked="checked"/> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="KODE_STATUS" value="3" /> Sesuai Rekomendasi </label><br>
                @elseif ($temuan[0]->KODE_STATUS == 3)
                <label><input type="radio" name="KODE_STATUS" value="1" /> Belum Ditindak Lanjut </label><br>
                <label><input type="radio" name="KODE_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
                <label><input type="radio" name="KODE_STATUS" value="3" checked="checked"/> Sesuai Rekomendasi </label><br>
                @endif
                <br>
            
            Jenis Pengawasan : <input type="text" class="form-control" name="JENIS_PENGAWASAN" value="{{ $temuan[0]->JENIS_PENGAWASAN }}"><br>      
            
			Nama OPD: 
                <select class="form-control" name="KODE_OPD">
                    @foreach ($id as $OPD)
                    @if ($OPD->KODE_OPD === $temuan[0]->KODE_OPD)
                    <option value="{{ $OPD->KODE_OPD}}" selected>{{ $OPD->NAMA_OPD}}</option>
                    @else
                    <option value="{{ $OPD->KODE_OPD}}">{{ $OPD->NAMA_OPD}}</option>
                    @endif
                    @endforeach
                </select> <br>
            
			Nama Pejabat :<input type="text" class="form-control" name="NAMA_PEJABAT" value="{{ $temuan[0]->NAMA_PEJABAT}}"><br> 
            Tanggal Temuan : <input type="date" class="form-control" name="TANGGAL_TEMUAN" value="{{ $temuan[0]->TANGGAL_TEMUAN }}"><br>
            Tanggal Tindak Lanjut : <input type="date" class="form-control" name="TANGGAL_TINDAK_LANJUT" value="{{ $temuan[0]->TANGGAL_TINDAK_LANJUT }}"><br>
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

            Hasil Telaah : <input type="text" class="form-control" name="HASIL_TELAAH" value="{{ $temuan[0]->HASIL_TELAAH}}"><br>	
            <button type="submit" class="btn btn-primary">Update</button>
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