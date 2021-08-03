@extends("layout.mainlayout")

@section("page_title","TEMUAN")

@section("title","TEMUAN")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Temuan</li> 
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
	  <h3 class="card-title"> DATA TEMUAN</h3>
	  <div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	  </div>
  </div>
  <div class="card-body">
		<div class="card">
			<div class="card-header">
			<!-- <h3 class="card-title">Tambah Data Anggota</h3> -->
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<form action="/temuan/cari" method="GET">
							<!-- <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
							<input type="submit" value="CARI"> -->
							<div class="input-group">
								<div style="width: 20%">
									<select class="form-control" name="cari">
										<option value="0">-Pilih Jenis-</option>
										<option value="1">Internal</option>
										<option value="2">Eksternal</option>
									</select>
								</div>
								<div style="width: 42%">
									<select class="form-control select2" name="KODE_OPD">
										<option value="0">-Pilih OPD-</option>
										@foreach ($id as $opd)
										<option value="{{ $opd->KODE_OPD}}">{{ $opd->NAMA_OPD}}</option>
										@endforeach
									</select>
								</div>
								<div style="width: 20%">
									<select class="form-control select2" name="year">
										<option value="0">-Pilih Tahun-</option>
										@foreach ($years as $year)
										<option value="{{ $year }}">{{ $year }}</option>
										@endforeach
									</select>
								</div>
								<div class="input-group-append">
									<span><input type="submit" class="btn btn-default" value="CARI"></span>
								</div>
							</div>
							</form>
						</div>
					</div>
					<div class="col-md-3">
						@can('tambah-temuan')
						<a href="/temuan/insert_temuan">
						<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data Temuan</button>
						</a>
						@endcan
					</div>
				</div>
				
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>		
					<th rowspan="2" scope="rowgroup" style="text-align:center">Nomer LHP</th>
					<th colspan="2" scope="colgroup" style="text-align:center">Temuan</th>
					<th colspan="2" scope="colgroup" style="text-align:center">Rekomendasi</th>
					<th colspan="2" scope="colgroup" style="text-align:center">Tindak Lanjut</th>
					<th colspan="3" scope="colgroup" style="text-align:center">Pejabat OPD</th>
					<!-- <th rowspan="2" scope="rowgroup" style="text-align:center">Jenis Pengawasan</th> -->
					<th rowspan="2" scope="rowgroup" style="text-align:center">Nama OPD</th>
					<th rowspan="2" scope="rowgroup" style="text-align:center">Tanggal Temuan</th>
					<th rowspan="2" scope="rowgroup" style="text-align:center">Tanggal Tindak Lanjut</th>
					<th rowspan="2" scope="rowgroup" style="text-align:center">Kerugian</th>
					<th rowspan="2" scope="rowgroup" style="text-align:center">Jenis Temuan</th>
					<th rowspan="2" scope="rowgroup" style="text-align:center">Hasil Telaah</th>
					@can('edit-hapus-temuan')
					<th rowspan="2" scope="rowgroup" style="text-align:center">Aksi</th>
					@endcan
				</tr>
				<tr>
					<th style="text-align:center">Kode</th>
					<th style="text-align:center">Uraian</th>
					<th style="text-align:center">Kode</th>
					<th style="text-align:center">Uraian</th>
					<th style="text-align:center">Uraian</th>
					<th style="text-align:center">Status</th>
					<th style="text-align:center">Nama</th>
					<th style="text-align:center">Jabatan</th>
					<th style="text-align:center">NIP</th>
				</tr>
				</thead>
				<tbody>		
				@foreach($temuan as $data)
				<tr>
					<td>{{ $data->NOMOR_LHP }}</td>
					<td>{{ $data->KODE_TEMUAN }}</td>
					<td>{{ $data->URAIAN_TEMUAN }}</td>
					<td>{{ $data->KODE_REKOMENDASI }}</td>
					<td>{{ $data->URAIAN_REKOMENDASI }}</td>
					<td>{{ $data->URAIAN_TINDAK_LANJUT }}</td>
					@if ($data->KODE_STATUS == 1)
					<td> Belum Ditindak Lanjut</td>
					@elseif ($data->KODE_STATUS == 2)
					<td> Belum Sesuai Rekomendasi</td>
					@elseif ($data->KODE_STATUS == 3)
					<td> Sesuai Rekomendasi</td>
					@endif
					<td>{{ $data->NAMA_PEJABAT }}</td>
					<td>{{ $data->JABATAN_PEJABAT }}</td>
					<td>{{ $data->NIP_PEJABAT }}</td>	

					<td>
						@foreach($punya_opd as $OPD)
						@if ($OPD->KODE_TEMUAN === $data->KODE_TEMUAN)
								@foreach($id as $opd)
								@if ($opd->KODE_OPD === $OPD->KODE_OPD)
								{{$opd->NAMA_OPD}}<br>
								@endif
								@endforeach
						@endif
						@endforeach
						<a href='/punya_opd/insert_view_punya_opd/{{ $data->KODE_TEMUAN }}'>
                        lihat OPD
                        </a>
					</td>

					<td>{{ $data->TANGGAL_TEMUAN }}</td>
					<td>{{ $data->TANGGAL_TINDAK_LANJUT }}</td>
					<td>{{ $data->KERUGIAN }}</td>
					@if ($data->KODE_JENIS_TEMUAN == 1)
					<td> Internal</td> 
					@elseif ($data->KODE_JENIS_TEMUAN == 2)
					<td> Eksternal</td>
					@endif
					<td>{{ $data->HASIL_TELAAH }}</td>
					@can('edit-hapus-temuan')
					<td><a href='/temuan/edit_temuan/{{ $data->KODE_TEMUAN }}'>
					<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
					</a>
					<a href='/temuan/hapus/{{ $data->KODE_TEMUAN }}'>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</a>
					<!-- <button onclick="confirmDelete({{ $data->KODE_TEMUAN }})" class="btn btn-danger btn-sm"> Hapus</button> -->
					</td> 
					@endcan
                     
				</tr>
				@endforeach
				</tbody>
				<tfoot>
				<!-- <tr>
				<th>NIS_NIP</th>
				<th>nama_anggota</th>
				<th>tahun_masuk</th>
				<th>kelas</th>
				<th>username_anggota</th>
				<th>password_anggota</th>
				</tr> -->
				</tfoot>
			</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
	<!-- <a href="/LHP/insert_lhp"><b>Tambah Data LHP</b></a> -->
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

<div class="modal fade" id="deleteTemuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin mengahpus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		<a id="deleteLink">
		<button type="button" class="btn btn-danger">Hapus</button>
		</a>
	</div>
    </div>
  </div>
</div>

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

@section('scripts')
<script>
	function confirmDelete(id)
	{
		var link = document.getElementById('deleteLink')
		link.href="/temuan/hapus/" + id
		$('#deleteTemuan').modal('show')
	}


</script>
@endsection