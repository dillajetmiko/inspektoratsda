@extends("layout.mainlayout")

@section("page_title","Dupak")

@section("title","Dupak")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Dupak</li> 
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
<div class="card card-solid">
	<div class="m-4">
		<form action="/dupak/cari" method="GET">
			<div class="form-row mb-2">
					<div class="col-md-7">
						<select class="form-control select2" name="NIK_PEGAWAI" placeholder="Nama Auditor">
						@foreach ($pegawai as $peg)
						@if ($peg->NIK_PEGAWAI === $pegselect[0]->NIK_PEGAWAI)
						<option value="{{ $peg->NIK_PEGAWAI}}" selected>{{ $peg->NAMA_PEGAWAI}}</option>
						@else
						<option value="{{ $peg->NIK_PEGAWAI}}">{{ $peg->NAMA_PEGAWAI}}</option>
						@endif
						@endforeach
						</select>
					</div>
			</div>
			<div class="form-row">
				<div class="col-md-5">
					<select class="form-control selectize" id="semester" name="semester">
						<option value="" selected disabled>Periode Semester</option>
						@if ($semester == 1)
						<option value="1" selected>Januari s.d Juni</option>
						<option value="2">Juli s.d Desember</option>
						@elseif ($semester == 2)
						<option value="1">Januari s.d Juni</option>
						<option value="2" selected>Juli s.d Desember</option>
						@else
						<option value="1">Januari s.d Juni</option>
						<option value="2">Juli s.d Desember</option>
						@endif
					</select>
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control" name="tahun" id="tahun" autocomplete="off" placeholder="{{ __('Tahun')}}" value="{{ isset($tahun) ? $tahun : date('Y') }}">
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Cari</button>
				</div>
			</div>
		</form>
	</div>
	<div class="m-4">
		<a href="/dupak/cetak-ak">
			<button type="button" class="btn btn-info float-right" style="float: right;">Print AK</button>
		</a>
	</div>

	<div class="card-body">
		<div class="row mt-4">
			<nav class="w-100">
				<div class="nav nav-tabs" id="product-tab" role="tablist">
					<a class="nav-item nav-link active" id="dupak-pengawasan-tab" data-toggle="tab" href="#dupak-pengawasan" role="tab" aria-controls="dupak-pengawasan" aria-selected="true">Pengawasan</a>
					<a class="nav-item nav-link" id="dupak-pendidikan-tab" data-toggle="tab" href="#dupak-pendidikan" role="tab" aria-controls="dupak-pendidikan" aria-selected="false">Pendidikan</a>
					<a class="nav-item nav-link" id="dupak-penunjang-tab" data-toggle="tab" href="#dupak-penunjang" role="tab" aria-controls="dupak-penunjang" aria-selected="false">Penunjang</a>
					<a class="nav-item nav-link" id="dupak-pengembangan-tab" data-toggle="tab" href="#dupak-pengembangan" role="tab" aria-controls="dupak-pengembangan" aria-selected="false">Pengembangan</a>
					<a class="nav-item nav-link" id="dupak-diklat-tab" data-toggle="tab" href="#dupak-diklat" role="tab" aria-controls="dupak-diklat" aria-selected="false">Diklat</a>
					<a class="nav-item nav-link" id="dupak-lak-tab" data-toggle="tab" href="#dupak-lak" role="tab" aria-controls="dupak-lak" aria-selected="false">LAK</a>
					<a class="nav-item nav-link" id="dupak-dupak-tab" data-toggle="tab" href="#dupak-dupak" role="tab" aria-controls="dupak-dupak" aria-selected="false">DUPAK</a>
					<a class="nav-item nav-link" id="dupak-pak-tab" data-toggle="tab" href="#dupak-pak" role="tab" aria-controls="dupak-pak" aria-selected="false">PAK</a>
				</div>
			</nav>

			<div class="w-100">
				<div class="tab-content p-3" id="nav-tabContent">

					<div class="tab-pane fade show active" id="dupak-pengawasan" role="tabpanel" aria-labelledby="dupak-pengawasan-tab"> 
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="dupak-pengawasan-table">
							<tr style="background: #ccc; text-align: center">
								<th rowspan="2">No.</th>
								<th colspan="2" >Uraian Kegiatan</th>
								<th rowspan="2" colspan="2">Tgl Jml Hari Efektif</th>
								<th rowspan="2">Satuan AK</th>
								<th rowspan="2">Jumlah Jam</th>
								<th rowspan="2">Jumlah AK</th>
								<th rowspan="2">Keterangan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
								<th>Kode</th>
								<th>Kegiatan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th colspan="2">4</th>
								<th>5</th>
								<th>6</th>
								<th>7</th>
								<th>8</th>
							</tr>
							@foreach($pengawasan as $key=>$data)
							<tr>
								<td rowspan="2">{{ $no = $no + 1 }}</td>
								<td rowspan="2"></td>
								<td rowspan="2">{{ $data->ISI_SPT }}</td>
								<td colspan="2" style="text-align: center;">{{ $data->tgl_mulai }} s.d {{ $data->tgl_selesai }}</td>
								<td rowspan="2" style="text-align: center">{{ $data->angka_kredit }}</td>
								<td rowspan="2" style="text-align: center">{{ $data->lama_jam }}</td>
								<td rowspan="2" style="text-align: center">{{ $data->angka_kredit * $data->lama_jam }}</td>
								<td rowspan="2"><a href="'+file+'" target="'+target+'" >SPT No.700/{{ $data->NOMOR_SPT }}/438.4/{{ $data->PKPT }}</a><br/><br/></td>
							</tr>
							<tr>
								<td>{{ $lamapengawasan[$key] }}</td>
								<td>{{ $data->NAMA_TUGAS }}</td>
							</tr>
							@endforeach
							<tr style="text-align:center; font-weight: bold;">
								<td></td>
								<td></td>
								<td>JUMLAH</td>
								<td colspan="2">{{ $jmlharipengawasan }}</td>
								<td></td>
								<td>{{ $jmljampengawasan }}</td>
								<td>{{ $jmlpengawasan }}</td>
								<td></td>
							</tr>
							
						</table>
					</div>

					<div class="tab-pane fade" id="dupak-pendidikan" role="tabpanel" aria-labelledby="dupak-pendidikan-tab">
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="dupak-pendidikan-table">
							<tr style="background: #ccc; text-align: center">
								<th>No.</th>
								<th>Uraian Sub Unsur</th>
								<th>Angka Kredit</th>
								<th>Keterangan</th>
							</tr>
							@foreach($pendidikan as $data)
							<tr>
								<td>{{ $no1 = $no1 + 1 }}</td>
								<td>{{ $data->INSTANSI_PENDIDIKAN }}</td>
								<td style="text-align: center">{{ $data->angka_kredit }}</td>
								<td>{{ $data->STRATA_PENDIDIKAN }}</td>
							</tr>
							@endforeach
							<tr class="col-print-data">
								<td colspan="2" style="text-align: center; font-weight:bold;">JUMLAH</td>
								<td colspan="2">{{ $jmlpendidikan }}</td>
							</tr>
						</table>
					</div>

					<div class="tab-pane fade" id="dupak-penunjang" role="tabpanel" aria-labelledby="dupak-penunjang-tab">
						<a href='/dupak/penunjang'>
							<button type="button" class="btn btn-warning">Dupak Penunjang</button>
						</a>
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="dupak-penunjang-table">
							<tr style="background: #ccc; text-align: center">
								<th rowspan="2">No.</th>
								<th colspan="2">Uraian Kegiatan</th>
								<th rowspan="2">Tanggal</th>
								<th rowspan="2">Satuan AK</th>
								<th rowspan="2">Jumlah Jam</th>
								<th rowspan="2">Jumlah AK</th>
								<th rowspan="2">Keterangan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
								<th>Kode</th>
								<th>Kegiatan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
								<th>5</th>
								<th>6</th>
								<th>7</th>
								<th>8</th>
							</tr>
							@foreach($penunjang as $data)
							<tr>
								<td>{{ $no2 = $no2 + 1 }}</td>
								<td></td>
								<td>{{ $data->kegiatan }}</td>
								<td style="text-align: center;">{{ $data->tanggal }}</td>
								<td style="text-align: center">{{ $data->satuan_ak }}</td>
								<td style="text-align: center">{{ $data->lama_jam }}</td>
								<td style="text-align: center">{{ $data->satuan_ak * $data->lama_jam }}</td>
								<td style="text-align: center">{{ $data->keterangan }}</td>
							</tr>
							@endforeach
							<tr style="text-align:center; font-weight: bold;">
								<td ></td>
								<td></td>
								<td>JUMLAH</td>
								<td>{{ $jmlharipenunjang }}</td>
								<td></td>
								<td>{{ $jmljampenunjang }}</td>
								<td>{{ $jmlpenunjang }}</td>
								<td></td>
							</tr>
						</table>
					</div>

					<div class="tab-pane fade" id="dupak-pengembangan" role="tabpanel" aria-labelledby="dupak-pengembangan-tab">
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="dupak-pengembangan-table">
							<tr style="background: #ccc; text-align: center">
								<th rowspan="2">No.</th>
								<th colspan="2">Uraian Kegiatan</th>
								<th rowspan="2">Tanggal</th>
								<th rowspan="2">Satuan AK</th>
								<th rowspan="2">Jumlah Jam</th>
								<th rowspan="2">Jumlah AK</th>
								<th rowspan="2">Keterangan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
									<th>Kode</th>
									<th>Kegiatan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
									<th>1</th>
									<th>2</th>
									<th>3</th>
									<th>4</th>
									<th>5</th>
									<th>6</th>
									<th>7</th>
									<th>8</th>
							</tr>
							@foreach($pengembangan as $data)
							<tr>
								<td>{{ $no3 = $no3 + 1 }}</td>
								<td></td>
								<td>{{ $data->kegiatan }}</td>
								<td style="text-align: center;">{{ $data->tgl_mulai }}</td>
								<td style="text-align: center">{{ $data->angka_kredit }}</td>
								<td style="text-align: center">{{ $data->lama_jam }}</td>
								<td style="text-align: center">{{ $data->angka_kredit * $data->lama_jam }}</td>
								<td>{{ $data->peran }}</td>
							</tr>
							@endforeach	
							<tr style="text-align:center; font-weight: bold;">
								<td ></td>
								<td></td>
								<td>JUMLAH</td>
								<td>{{ $jmlharipengembangan }}</td>
								<td></td>
								<td>{{ $jmljampengembangan }}</td>
								<td>{{ $jmlpengembangan }}</td>
								<td></td>
							</tr>						
						</table>
					</div>

					<div class="tab-pane fade" id="dupak-diklat" role="tabpanel" aria-labelledby="dupak-diklat-tab">
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="dupak-diklat-table">
							<tr style="background: #ccc; text-align: center">
								<th rowspan="2">No.</th>
								<th colspan="2">Uraian Kegiatan</th>
								<th rowspan="2">Tanggal</th>
								<th rowspan="2">Satuan AK</th>
								<th rowspan="2">Jumlah Jam</th>
								<th rowspan="2">Jumlah AK</th>
								<th rowspan="2">Keterangan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
									<th>Kode</th>
									<th>Kegiatan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
									<th>1</th>
									<th>2</th>
									<th>3</th>
									<th>4</th>
									<th>5</th>
									<th>6</th>
									<th>7</th>
									<th>8</th>
							</tr>
							@foreach($diklat as $data)
							<tr>
								<td>{{ $no4 = $no4 + 1 }}</td>
								<td></td>
								<td>{{ $data->NAMA_DIKLAT }}</td>
								<td style="text-align: center;">{{ $data->TANGGAL_DIKLAT }}</td>
								<td style="text-align: center">{{ $data->angka_kredit }}</td>
								<td style="text-align: center">{{ $data->lama_jam }}</td>
								<td style="text-align: center">{{ $data->angka_kredit * $data->lama_jam }}</td>
								<td style="text-align: center">{{ $data->PENYELENGGARA_DIKLAT }}</td>
							</tr>
							@endforeach
							<tr style="text-align:center; font-weight: bold;">
								<td ></td>
								<td></td>
								<td>JUMLAH</td>
								<td>{{ $jmlharidiklat }}</td>
								<td></td>
								<td>{{ $jmljamdiklat }}</td>
								<td>{{ $jmldiklat }}</td>
								<td></td>
							</tr>
						</table>
					</div>

					<div class="tab-pane fade" id="dupak-lak" role="tabpanel" aria-labelledby="dupak-lak-tab">
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border col-md-12" id="dupak-lak-table">
							<tr style="background: #ccc; text-align: center">
								<th rowspan="2" >No.</th>
								<th rowspan="2" >Uraian Sub Unsur</th>
								<th colspan="2" >Jumlah Angka Kredit</th>
								<th colspan="2" >Jumlah Hari</th>
								<th rowspan="2" >Perbedaan</th>
								<th rowspan="2" >Ket Perbedaan</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
									<th>Diusulkan</th>
									<th>Disetujui</th>
									<th>Diusulkan</th>
									<th>Disetujui</th>
							</tr>
							<tr style="background: #ccc; text-align: center">
									<th>1</th>
									<th>2</th>
									<th>3</th>
									<th>4</th>
									<th>5</th>
									<th>6</th>
									<th>7</th>
									<th>8</th>
							</tr>
							<tr>
								<td style="text-align: center;"><strong>I</strong></td>
								<td><strong>Pendidikan Sekolah</strong></td>
								<td style="text-align: center">{{ $jmlpendidikan }}</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td style="text-align: center;"><strong>II</strong></td>
								<td><strong>Angka Kredit Penjenjangan</strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td style="text-align: right;"><strong>A</strong></td>
								<td><strong>Unsur Utama</strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td><strong>1. Pendidikan dan Pelatihan</strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@foreach($diklat as $data)
							<tr>
								<td></td>
								<td style="padding-left:50px;">{{ $data->NAMA_DIKLAT }}</td>
								<td style="text-align: center">{{ $data->angka_kredit * $data->lama_jam }}</td>
								<td></td>
								<td style="text-align: center">1</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforeach
							<tr style="background: #ccc; text-align: center">
								<td></td>
								<td><strong>Jumlah Pendidikan dan Pelatihan</strong></td>
								<td>{{ $jmldiklat }}</td>
								<td></td>
								<td>{{ $jmlharidiklat }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td><strong>2. Pengawasan</strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@foreach($pengawasan as $key=>$data)
							<tr>
								<td></td>
								<td style="padding-left:50px;">{{ $data->ISI_SPT }}</td>
								<td style="text-align: center">{{ $data->angka_kredit * $data->lama_jam }}</td>
								<td></td>
								<td style="text-align: center">{{ $lamapengawasan[$key] }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforeach
							<tr style="background: #ccc; text-align: center">
								<td></td>
								<td><strong>Jumlah Pengawasan</strong></td>
								<td>{{ $jmlpengawasan }}</td>
								<td></td>
								<td>{{ $jmlharipengawasan }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td><strong>3. Pengembangan profesi</strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@foreach($pengembangan as $data)
							<tr>
								<td></td>
								<td style="padding-left:50px;">{{ $data->kegiatan }}</td>
								<td style="text-align: center">{{ $data->angka_kredit * $data->lama_jam }}</td>
								<td></td>
								<td style="text-align: center">1</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforeach
							<tr style="background: #ccc; text-align: center">
								<td></td>
								<td><strong>Jumlah Pengembangan Profesi</strong></td>
								<td>{{ $jmlpengembangan }}</td>
								<td></td>
								<td>{{ $jmlharipengembangan }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="background: #ccc; text-align: center">
								<td></td>
								<td><strong>Jumlah Unsur Utama</strong></td>
								<td>{{ $jmlpengawasan + $jmlpengembangan + $jmldiklat}}</td>
								<td></td>
								<td>{{ $jmlharipengawasan + $jmlharipengembangan + $jmlharidiklat}}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td style="text-align: right;"><strong>B</strong></td>
								<td><strong>Unsur Penunjang</strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@foreach($penunjang as $data)
							<tr>
								<td></td>
								<td style="padding-left:50px;">{{ $data->kegiatan }}</td>
								<td style="text-align: center">{{ $data->satuan_ak * $data->lama_jam }}</td>
								<td></td>
								<td style="text-align: center">1</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforeach
							<tr style="background: #ccc; text-align: center">
								<td></td>
								<td><strong>Jumlah Unsur Penunjang</strong></td>
								<td>{{ $jmlpenunjang }}</td>
								<td></td>
								<td>{{ $jmlharipenunjang }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="background: #ccc; text-align: center">
								<td></td>
								<td><strong>Jumlah AK Penjenjangan</strong></td>
								<td>{{ $jmlpengawasan + $jmlpengembangan + $jmldiklat + $jmlpenunjang }}</td>
								<td></td>
								<td>{{ $jmlharipengawasan + $jmlharipengembangan + $jmlharidiklat + $jmlharipenunjang }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
						<!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
						<a href='/dupak/cetak-lak'>
						<button type="button" class="btn btn-secondary"><i class="fas fa-print"></i> Cetak</button>
						</a>
					</div>

					<div class="tab-pane fade" id="dupak-dupak" role="tabpanel" aria-labelledby="dupak-dupak-tab">
						<div class="col-print-12 col-md-12 print-center text-center"><h3>DAFTAR USULAN PENETAPAN ANGKA KREDIT</h3></div>
						<div class="row">
							<div class="col-print-2 col-md-2"></div>
							<div class="col-print-4 col-md-4">NOMOR</div>
							<div class="col-print-4 col-md-4">: </div>
							<div class="col-print-2 col-md-2"></div>
						</div>
						<div class="row">
							<div class="col-print-2 col-md-2"></div>
							<div class="col-print-4 col-md-4">MASA PENILAIAN TANGGAL</div>
							<div class="col-print-4 col-md-4">: 
								@if ($semester == 1)
								1 Januari - 30 Juni
								@elseif ($semester == 2)
								1 Juli - 31 Desember
								@else
								
								@endif
							</div>
							<div class="col-print-2 col-md-2"></div>
						</div>

						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="user-dupak-table">
							<tr style="text-align: center; font-weight:bold;">
								<td>I.</td>
								<td colspan="3">KETERANGAN PERORANGAN</td>
							</tr>
							<tr>
								<td>1.</td>
								<td colspan="2">Nama</td>
								<td><strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
							</tr>
							<tr>
								<td>2.</td>
								<td colspan="2">NIP / Nomor Seri Karpeg</td>
								<td><strong>{{$pegawaidupak[0]->NIP_PEGAWAI}}</strong></td>
							</tr>
							<tr>
								<td>3.</td>
								<td colspan="2">Tempat dan tanggal lahir</td>
								<td>{{$pegawaidupak[0]->TTL_PEGAWAI}}</td>
							</tr>
							<tr>
								<td>4.</td>
								<td colspan="2">Jenis Kelamin</td>
								<td>{{$pegawaidupak[0]->JENIS_KELAMIN}}</td>
							</tr>
							<tr>
								<td>5.</td>
								<td colspan="2">Pendidikan yang telah<br/>diperhitungkan angka kreditnya</td>
								<td>{{$pendidikanpeg[0]->STRATA_PENDIDIKAN}}</td>
							</tr>
							<tr>
								<td>6.</td>
								<td colspan="2">Pangkat/Gol. Ruang/TMT</td>
								<td>{{$pangkat[0]->NAMA_PANGKAT}}</td>
							</tr>
							<tr>
								<td>7.</td>
								<td colspan="2">Jabatan Auditor</td>
								<td>{{$jabatan[0]->NAMA_JABATAN}}</td>
							</tr>
							<tr>
								<td rowspan="2">8.</td>
								<td rowspan="2">Masa Kerja Golongan</td>                
							</tr>
							<tr><td>Lama</td><td></td></tr>
							<tr><td></td><td></td><td>Baru</td><td></td></tr>
							<tr>
								<td>9.</td>
								<td colspan="2">Unit Kerja</td>
								<td>{{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
							</tr>
						</table>

						<form action="/dupak/tambah_dupak" method="post" enctype="multipart/form-data">
							<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
							<input type="text" class="form-control" name="tahun" id="tahun" autocomplete="off" placeholder="{{ __('Tahun')}}" value="{{ isset($tahun) ? $tahun : date('Y') }}" hidden>
							<input type="text" class="form-control" name="semester" id="semester" autocomplete="off" placeholder="{{ __('Semester')}}" value="{{ isset($semester) ? $semester : '' }}" hidden>
							<input type="text" class="form-control" name="NIK_PEGAWAI" id="NIK_PEGAWAI" autocomplete="off" placeholder="{{ __('NIK_PEGAWAI')}}" value="{{ isset($nik) ? $nik : '' }}" hidden>
						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="ak-dupak-table">
							<tr style="text-align: center; font-weight:bold;">
								<th style="width:45px;">II.</th>
								<th colspan="7">UNSUR YANG DINILAI</th>
							</tr>
							<tr style="text-align: center; font-weight:bold;">
								<th rowspan="3">No.</th>
								<th rowspan="3">UNSUR & SUB UNSUR</th>
								<th colspan="6">ANGKA KREDIT MENURUT</th>
							</tr>
							<tr style="text-align: center; font-weight:bold;">
								<th colspan="3">INSTANSI PENGUSUL</th>
								<th colspan="3">TIM PENILAI</th>
							</tr>
							<tr style="font-weight: bold;text-align:center;">
								<th style="width:125px;">LAMA</th>
								<th style="width:125px;">BARU</th>
								<th style="width:125px;">JUMLAH</th>
								<th style="width:125px;">LAMA</th>
								<th style="width:125px;">BARU</th>
								<th style="width:125px;">JUMLAH</th>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: center">I</td>
								<td>PENDIDIKAN SEKOLAH</td>
								<td><input type="text" class="form-control" name="lama_pendidikan" value="{{ isset($dupak->lama_pendidikan) ? $dupak->lama_pendidikan : $duppendidikanlalu }}"></td>
								<td><input type="text" class="form-control" name="baru_pendidikan" value="{{ $jmlpendidikan }}" readonly></td>
								<td>{{$totalpendidikan}}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: center">II</td>
								<td>ANGKA KREDIT</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: right">A.</td>
								<td>UNSUR UTAMA</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td style="padding-left:20px;">a. Pendidikan</td>
								<td><input type="text" class="form-control" name="lama_diklat" value="{{ isset($dupak->lama_diklat) ? $dupak->lama_diklat : $dupdiklatlalu }}"></td>
								<td><input type="text" class="form-control" name="baru_diklat" value="{{ $jmldiklat }}" readonly></td>
								<td>{{$totaldiklat}}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td style="padding-left:20px;">b. Pengawasan</td>
								<td><input type="text" class="form-control" name="lama_pengawasan" value="{{ isset($dupak->lama_pengawasan) ? $dupak->lama_pengawasan : $duppengawasanlalu }}"></td>
								<td><input type="text" class="form-control" name="baru_pengawasan" value="{{ $jmlpengawasan }}" readonly></td>
								<td>{{$totalpengawasan}}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td style="padding-left:20px;">c. Pengembangan Profesi</td>
								<td><input type="text" class="form-control" name="lama_pengembangan" value="{{ isset($dupak->lama_pengembangan) ? $dupak->lama_pengembangan : $duppengembanganlalu }}"></td>
								<td><input type="text" class="form-control" name="baru_pengembangan" value="{{ $jmlpengembangan }}" readonly></td>
								<td>{{$totalpengembangan}}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td></td>
								<td style="text-align:right">JUMLAH</td>
								<td>{{ $jmlunsurutama }}</td>
								<td>{{ $jmldiklat + $jmlpengawasan + $jmlpengembangan }}</td>
								<td>{{ $totaldiklat + $totalpengawasan + $totalpengembangan }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: right">B.</td>
								<td>UNSUR PENUNJANG</td>
								<td><input type="text" class="form-control" name="lama_penunjang" value="{{ isset($dupak->lama_penunjang) ? $dupak->lama_penunjang : $duppenunjanglalu }}"></td>
								<td><input type="text" class="form-control" name="baru_penunjang" value="{{ $jmlpenunjang }}" readonly></td>
								<td>{{$totalpenunjang}}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td></td>
								<td style="text-align:right">JUMLAH AK. PENJENJANGAN</td>
								<td>{{ $jmlak }}</td>
								<td>{{ $jmldiklat + $jmlpengawasan + $jmlpengembangan + $jmlpenunjang }}</td>
								<td>{{ $totaldiklat + $totalpengawasan + $totalpengembangan + $totalpenunjang }}</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td></td>
								<td style="text-align:right">JUMLAH (I + II)</td>
								<td>{{ $jmltotal }}</td>
								<td>{{ $jmlpendidikan + $jmldiklat + $jmlpengawasan + $jmlpengembangan + $jmlpenunjang }}</td>
								<td>{{ $totalpendidikan + $totaldiklat + $totalpengawasan + $totalpengembangan + $totalpenunjang }} </td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
						<button type="submit" class="btn btn-primary">Simpan</button>
						</form>


					</div>

					<div class="tab-pane fade" id="dupak-pak" role="tabpanel" aria-labelledby="dupak-pak-tab">
						<div class="col-print-12 col-md-12"><h3 class="print-center text-center">PENETAPAN ANGKA KREDIT JABATAN FUNGSIONAL AUDITOR</h3></div>
						<div class="row">
							<div class="col-print-2 col-md-2"></div>
							<div class="col-print-4 col-md-4">NOMOR</div>
							<div class="col-print-4 col-md-4">: </div>
							<div class="col-print-2 col-md-2"></div>
						</div>
						<div class="row">
							<div class="col-print-2 col-md-2"></div>
							<div class="col-print-4 col-md-4">MASA PENILAIAN TANGGAL</div>
							<div class="col-print-4 col-md-4">: 
								@if ($semester == 1)
								1 Januari - 30 Juni
								@elseif ($semester == 2)
								1 Juli - 31 Desember
								@else
								
								@endif
							</div>
							<div class="col-print-2 col-md-2"></div>
						</div>

						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="user-pak-table">
							<tr style="text-align: center">
								<td colspan="3">KETERANGAN PERORANGAN</td>
							</tr>
							<tr>
								<td>1.</td>
								<td>Nama</td>
								<td><strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
							</tr>
							<tr>
								<td>2.</td>
								<td>NIP / Nomor Seri Karpeg</td>
								<td><strong>{{$pegawaidupak[0]->NIP_PEGAWAI}}</strong></td>
							</tr>
							<tr>
								<td>3.</td>
								<td>Tempat dan tanggal lahir</td>
								<td>{{$pegawaidupak[0]->TTL_PEGAWAI}}</td>
							</tr>
							<tr>
								<td>4.</td>
								<td>Jenis Kelamin</td>
								<td>{{$pegawaidupak[0]->JENIS_KELAMIN}}</td>
							</tr>
							<tr>
								<td>5.</td>
								<td>Pendidikan tertinggi</td>
								<td>{{$pendidikanpeg[0]->STRATA_PENDIDIKAN}}</td>
							</tr>
							<tr>
								<td>6.</td>
								<td>Pangkat/Gol. Ruang/TMT</td>
								<td>{{$pangkat[0]->NAMA_PANGKAT}}</td>
							</tr>
							<tr>
								<td>7.</td>
								<td>Jabatan Auditor</td>
								<td>{{$jabatan[0]->NAMA_JABATAN}}</td>
							</tr>
							<tr>
								<td>8.</td>
								<td>Unit Kerja</td>
								<td>{{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
							</tr>
						</table>

						<table class="table table-sm table-bordered ajax-table col-print-12 table-print-border" id="ak-pak-table">
							<tr style="text-align: center">
								<td colspan="6">PENETAPAN ANGKA KREDIT</td>
							</tr>
							<tr style="text-align: center">
								<td></td>
								<td></td>
								<td>LAMA</td>
								<td>BARU</td>
								<td>JUMLAH</td>
								<td>ANGKA KREDIT UNTUK KENAIKAN PANGKAT</td>
							</tr>
							<tr style="font-weight: bold;text-align:center;">
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
								<td>6</td>
							</tr>
							<tr style="font-weight: bold;text-align: center">
								<td>I</td>
								<td>PENDIDIKAN SEKOLAH</td>
								<td>{{ isset($dupak->lama_pendidikan) ? $dupak->lama_pendidikan : '' }}</td>
								<td>{{ isset($dupak->baru_pendidikan) ? $dupak->baru_pendidikan : '' }}</td>
								<td>{{$totalpendidikan}}</td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: center">II</td>
								<td>ANGKA KREDIT</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: right">A.</td>
								<td>UNSUR UTAMA</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td style="padding-left:20px;">a. Pendidikan</td>
								<td>{{ isset($dupak->lama_diklat) ? $dupak->lama_diklat : '' }}</td>
								<td>{{ isset($dupak->baru_diklat) ? $dupak->baru_diklat : '' }}</td>
								<td>{{$totaldiklat}}</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td style="padding-left:20px;">b. Pengawasan</td>
								<td>{{ isset($dupak->lama_pengawasan) ? $dupak->lama_pengawasan : '' }}</td>
								<td>{{ isset($dupak->baru_pengawasan) ? $dupak->baru_pengawasan : '' }}</td>
								<td>{{$totalpengawasan}}</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td style="padding-left:20px;">c. Pengembangan Profesi</td>
								<td>{{ isset($dupak->lama_pengembangan) ? $dupak->lama_pengembangan : '' }}</td>
								<td>{{ isset($dupak->baru_pengembangan) ? $dupak->baru_pengembangan : '' }}</td>
								<td>{{$totalpengembangan}}</td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td></td>
								<td style="text-align:right;">JUMLAH</td>
								<td>{{ isset($dupak) ? $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan : '' }}</td>
								<td>{{ isset($dupak) ? $dupak->baru_diklat + $dupak->baru_pengawasan + $dupak->baru_pengembangan : '' }}</td>
								<td>{{ $totaldiklat + $totalpengawasan + $totalpengembangan }}</td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: right">B.</td>
								<td>UNSUR PENUNJANG</td>
								<td>{{ isset($dupak->lama_penunjang) ? $dupak->lama_penunjang : '' }}</td>
								<td>{{ isset($dupak->baru_penunjang) ? $dupak->baru_penunjang : '' }}</td>
								<td>{{$totalpenunjang}}</td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td style="text-align: right"></td>
								<td>JUMLAH AK PENJENJANGAN</td>
								<td>{{ isset($dupak) ? $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang : '' }}</td>
								<td>{{ isset($dupak) ? $dupak->baru_diklat + $dupak->baru_pengawasan + $dupak->baru_pengembangan + $dupak->baru_penunjang : '' }}</td>
								<td>{{ $totaldiklat + $totalpengawasan + $totalpengembangan + $totalpenunjang }}</td>
								<td></td>
							</tr>
							<tr style="font-weight: bold;">
								<td colspan="2">JUMLAH (I+II)</td>
								<td>{{ isset($dupak) ? $dupak->lama_pendidikan + $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang : '' }}</td>
								<td>{{ isset($dupak) ? $dupak->baru_pendidikan + $dupak->baru_diklat + $dupak->baru_pengawasan + $dupak->baru_pengembangan + $dupak->baru_penunjang : '' }}</td>
								<td>{{ $totalpendidikan + $totaldiklat + $totalpengawasan + $totalpengembangan + $totalpenunjang }}</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="6">
									Dapat/Tidak dapat dipertimbangkan untuk dinaikkan dalam :<br/>
									Jabatan : ....................TMT : ............ dengan mempertimbangkan sertifikasi dan persyaratan <br/>
									Pangkat/Gol. : .................. TMT : ...........
								</td>
							</tr>
						</table>
					</div>
									

				</div>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
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