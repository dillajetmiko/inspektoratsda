@extends("layout.mainlayout")

@section("page_title","SPT")

@section("title","SPT")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">SPT</li> 
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
	  <h3 class="card-title"> DATA SPT</h3>
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
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<form action="/spt/cari" method="GET">
							<!-- <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
							<input type="submit" value="CARI"> -->
							<div class="input-group">
								<div style="width: 30%">
									<select class="form-control select2" name="jenis">
										<option value="0">-Jenis Pengawasan-</option>
										@foreach ($jenis_pengawasan as $jenis)
										<option value="{{ $jenis->ID_PENGAWASAN}}">{{ $jenis->NAMA_PENGAWASAN}}</option>
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
								<div style="width: 20%">
									<select class="form-control select2" name="bulan">
										<option value="0">-Pilih Bulan-</option>
										<option value="1">Januari</option>
										<option value="2">Februari</option>
										<option value="3">Maret</option>
										<option value="4">April</option>
										<option value="5">Mei</option>
										<option value="6">Juni</option>
										<option value="7">Juli</option>
										<option value="8">Agustus</option>
										<option value="9">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
								</div>
								<!-- <div style="width: 30%">
									<input type="date" class="form-control" name="tanggal"><br>
								</div> -->
								<div class="input-group-append">
									<span><input type="submit" class="btn btn-default" value="CARI"></span>
								</div>
							</div>
							</form>
						</div>
					</div>
					<div class="col-md-3">
						@can('tambah-spt')
						<a href="/spt/insert_spt">
						<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data SPT</button>
						</a>
						@endcan
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<form action="/spt/export" method="GET">
							<!-- <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
							<input type="submit" value="CARI"> -->
								<div class="input-group">
									<div style="width: 30%">
										<select class="form-control select2" name="jenis">
											<option value="0">-Jenis Pengawasan-</option>
											@foreach ($jenis_pengawasan as $jenis)
											<option value="{{ $jenis->ID_PENGAWASAN}}">{{ $jenis->NAMA_PENGAWASAN}}</option>
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
									<div style="width: 20%">
										<select class="form-control select2" name="bulan">
											<option value="0">-Pilih Bulan-</option>
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</div>
									<!-- <div style="width: 30%">
										<input type="date" class="form-control" name="tanggal"><br>
									</div> -->
									<div class="input-group-append">
										<span><input type="submit" class="btn btn-default" value="EXPORT"></span>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">ID SPT</th>
						<th style="text-align:center">Nomor</th>
						<th style="text-align:center">Tanggal SPT</th>
						<th style="text-align:center">Tanggal Mulai</th>
						<th style="text-align:center">Tanggal Selesai</th>
						<th style="text-align:center">Dasar</th>
						<th style="text-align:center">Jenis Pengawasan</th>
						<th style="text-align:center">Uraian Penugasan</th>
						<th style="text-align:center">Tim Pelaksana</th>
                        <th style="text-align:center">Upload File</th>
                        <th style="text-align:center">Keterangan</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($spt as $data)
					<tr>
						<td>{{ $data->id }}</td>
						<td>{{ $data->NOMOR_SPT }}</td>
						<td>{{ $data->TANGGAL_SPT }}</td>
						<td>{{ $data->tgl_mulai }}</td>
						<td>{{ $data->tgl_selesai }}</td>
						<td>
						@foreach($dasar as $das)
						@if ($das->id_spt === $data->id)
							{{$das->uraian_dasar}}<br>
						@endif
						@endforeach
						<a href='/dasar/insert_view_dasar/{{ $data->id }}'>
                        Lihat Detail
                        </a>
						</td>
						<td>
						@foreach($jenis_pengawasan as $jenis)
						@if ($jenis->ID_PENGAWASAN === $data->ID_PENGAWASAN)
							{{$jenis->NAMA_PENGAWASAN}}<br>
						@endif
						@endforeach
						</td>
						<td>
							{{ $data->ISI_SPT }}<br>
							{{ $data->isi_jangka_waktu }}
						</td>
						<td>
						@foreach($penugasan as $tugas)
						@if ($tugas->id_spt === $data->id)
							@foreach($pegawai as $peg)
							@if ($peg->NIK_PEGAWAI === $tugas->NIK_PEGAWAI)
							{{$peg->NAMA_PEGAWAI}}<br>
							@endif
							@endforeach
						@endif
						@endforeach
						<a href='/penugasan/insert_view_penugasan/{{ $data->id }}'>
                        Lihat Detail
                        </a>
						</td>
                        <td>
						@if ($data->FILE_SPT == null)
						Tidak ada file
						@else
						<a href="spt/download/{{ $data->id }}" class='btn btn-ghost-info'>
							<i class="fa fa-download"></i> Download
						</a>
						@endif
						</td>
						<td>{{ $data->keterangan }}</td>
						<td>
						@can('edit-hapus-spt')
						<a href='/spt/edit_spt/{{ $data->id }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<!-- <a href='/spt/hapus/{{ $data->id }}'>
						<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						</a> -->
						<button onclick="confirmDelete('{{ $data->id }}')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						@endcan
						</a>
						<a href='/spt/generate-docx/{{ $data->id }}'>
						<button type="button" class="btn btn-secondary"><i class="fas fa-print"></i> Cetak</button>
						</a>
						</td>             
					</tr>
					@endforeach
					</tbody>
					<tfoot>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->

			<!-- <a href="/spt/cetak_spt">
				<button type="button" class="btn btn-info float-left" style="float: left;"><i class="fas fa-file-export"></i> Cetak </button>
			</a> -->
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

<!-- Modal Hapus-->
<div class="modal fade" id="deleteSPT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
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
		link.href="/spt/hapus/" + id
		$('#deleteSPT').modal('show')}

</script>
@endsection