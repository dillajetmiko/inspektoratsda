@extends("layout.mainlayout")

@section("page_title","CETAK")

@section("title","CETAK")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Cetak</li> 
@endsection

@section('custom_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
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
	  <!-- <h3 class="card-title"> DATA CETAK</h3> -->
	  <div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	  </div>
  </div>
  <div class="card-body">
		<div class="card">
			<!-- <div class="card-header">
			<h3 class="card-title">Tambah Data Anggota</h3>
			</div> -->
			<!-- /.card-header -->
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<form action="/cetak/cari" method="GET">
							<!-- <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
							<input type="submit" value="CARI"> -->
							<div class="input-group">
								<div style="width: 50%">
									<select class="form-control select2" name="cari">
									<option>-Pilih Judul-</option>
									@foreach ($lhp as $no)
									<option value="{{ $no->NOMOR_LHP}}">{{ $no->JUDUL_PEMERIKSAAN	}}</option>
									@endforeach
									</select>
									<br>
								</div>
								<div class="input-group-append">
									<span><input type="submit" class="btn btn-default" value="CARI"></span>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
				<table>
				@foreach ($lhp2 as $datalhp)
				<tr>
					<th>Judul Pemeriksaan</th>
					<td>: {{ $datalhp->JUDUL_PEMERIKSAAN	}}</td>
				</tr>
				<tr>
					<th>Tanggal LHP</th>
					<td>: {{ $datalhp->TANGGAL_LHP	}}</td>
				</tr>
				@endforeach
				</table>
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>		
						<th rowspan="2" scope="rowgroup" style="text-align:center">Nomer LHP</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Temuan</th>
						<th colspan="1" scope="colgroup" style="text-align:center">Rekomendasi</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Kerugian</th>
					</tr>
					<tr>
						<th style="text-align:center">Kode</th>
						<th style="text-align:center">Uraian</th>
						<th style="text-align:center">Kode/Uraian</th>
					</tr>
					</thead>
					<tbody>		
					@foreach($cetak as $data)
					<tr>
						<td>{{ $data->NOMOR_LHP }}</td>
						<td>{{ $data->ID_KATEGORI }}</td>
						<td>{{ $data->URAIAN_TEMUAN }}</td>
						<td>
							<table>
								@foreach($rekomendasi as $rekom)
								@if ($rekom->ID_TEMUAN === $data->id)
								<tr>
									<td>{{$rekom->KODE_REKOMENDASI}}<br></td>
									<td>{{$rekom->URAIAN_REKOMENDASI}}</td>
								</tr>
								@endif
								@endforeach
							</table>
						</td>
						<td>{{ $data->KERUGIAN }}</td>
					</tr>
					@endforeach
					</tbody>
					<tfoot>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

		@foreach ($lhp2 as $export)
		<a href="/cetak/export/{{ $export->NOMOR_LHP }}">
				<button type="button" class="btn btn-info float-left" style="float: left;"><i class="fas fa-file-export"></i> Export </button>
				</a>
		@endforeach	

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
	<!-- <a href="/LHP/insert_lhp"><b>Tambah Data LHP</b></a> -->
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection


@section('custom_script')
<!-- DataTables -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset ('asset/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});

	//Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endsection