<!DOCTYPE html>
<html>
<head>
	<title>AK</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
	table, td, th {
		border: 1px solid;
	}

	table {
		width: 100%;
		border-collapse: collapse;
	}

	#tabel {
		width: 100%;
	}
	.page-break {
		page-break-after: always;
	}
	.center {
		margin-left: auto;
		margin-right: auto;
	}

	</style>
</head>
<body>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">SURAT PERNYATAAN<br>MELAKUKAN KEGIATAN PENGAWASAN</h3>
	</div>
	
	<br>

	<table style="border: 0px">
		<!-- <tr>
			<td colspan="2" style="border: 0px">Menyatakan bahwa :</td>
		</tr> -->
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: <strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">NIP</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NIP_PEGAWAI}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Pangkat / golongan ruang</td>
			<td style="width: 70%; border: 0px">: {{$pangkat[0]->NAMA_PANGKAT}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Jabatan</td>
			<td style="width: 70%; border: 0px">: {{$jabatan[0]->NAMA_JABATAN}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Unit kerja</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<br>

	<table>
		<tr style="text-align: center">
			<th rowspan="2">No.</th>
			<th colspan="2" >Uraian Kegiatan</th>
			<th rowspan="2" colspan="2">Tgl Jml Hari Efektif</th>
			<th rowspan="2">Satuan AK</th>
			<th rowspan="2">Jumlah Jam</th>
			<th rowspan="2">Jumlah AK</th>
			<th rowspan="2">Keterangan</th>
		</tr>
		<tr style="text-align: center">
			<th>Kode</th>
			<th>Kegiatan</th>
		</tr>
		<tr style="text-align: center">
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
			<td rowspan="2">SPT No.700/{{ $data->NOMOR_SPT }}/438.4/{{ $data->PKPT }}<br/><br/></td>
		</tr>
		<tr>
			<td style="width: 55px;">{{ $lamapengawasan[$key] }} hari</td>
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

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">SURAT PERNYATAAN<br>MELAKUKAN KEGIATAN PENDIDIKAN</h3>
	</div>
	
	<br>

	<table style="border: 0px">
		<!-- <tr>
			<td colspan="2" style="border: 0px">Menyatakan bahwa :</td>
		</tr> -->
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: <strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">NIP</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NIP_PEGAWAI}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Pangkat / golongan ruang</td>
			<td style="width: 70%; border: 0px">: {{$pangkat[0]->NAMA_PANGKAT}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Jabatan</td>
			<td style="width: 70%; border: 0px">: {{$jabatan[0]->NAMA_JABATAN}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Unit kerja</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<br>

	<table>
		<tr style="text-align: center">
			<th>No.</th>
			<th>Uraian Sub Unsur</th>
			<th>Angka Kredit</th>
			<th>Keterangan</th>
		</tr>
		@foreach($pendidikan as $data)
		<tr>
			<td>{{ $no1 = $no1 + 1 }}</td>
			<td>{{ $data->INSTANSI_PENDIDIKAN }}</td>
			<td>{{ $data->angka_kredit }}</td>
			<td>{{ $data->STRATA_PENDIDIKAN }}</td>
		</tr>
		@endforeach
		<tr class="col-print-data">
			<td colspan="2" style="text-align: center; font-weight:bold;">JUMLAH</td>
			<td colspan="2">{{ $jmlpendidikan }}</td>
		</tr>
	</table>

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">SURAT PERNYATAAN<br>MELAKUKAN KEGIATAN PENUNJANG PENGAWASAN</h3>
	</div>
	
	<br>

	<table style="border: 0px">
		<!-- <tr>
			<td colspan="2" style="border: 0px">Menyatakan bahwa :</td>
		</tr> -->
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: <strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">NIP</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NIP_PEGAWAI}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Pangkat / golongan ruang</td>
			<td style="width: 70%; border: 0px">: {{$pangkat[0]->NAMA_PANGKAT}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Jabatan</td>
			<td style="width: 70%; border: 0px">: {{$jabatan[0]->NAMA_JABATAN}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Unit kerja</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<br>

	<table>
		<tr style="text-align: center">
			<th rowspan="2">No.</th>
			<th colspan="2">Uraian Kegiatan</th>
			<th rowspan="2">Tanggal</th>
			<th rowspan="2">Satuan AK</th>
			<th rowspan="2">Jumlah Jam</th>
			<th rowspan="2">Jumlah AK</th>
			<th rowspan="2">Keterangan</th>
		</tr>
		<tr style="text-align: center">
			<th>Kode</th>
			<th>Kegiatan</th>
		</tr>
		<tr style="text-align: center">
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

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">SURAT PERNYATAAN<br>MELAKUKAN KEGIATAN PENGEMBANGAN PROFESI</h3>
	</div>
	
	<br>

	<table style="border: 0px">
		<!-- <tr>
			<td colspan="2" style="border: 0px">Menyatakan bahwa :</td>
		</tr> -->
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: <strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">NIP</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NIP_PEGAWAI}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Pangkat / golongan ruang</td>
			<td style="width: 70%; border: 0px">: {{$pangkat[0]->NAMA_PANGKAT}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Jabatan</td>
			<td style="width: 70%; border: 0px">: {{$jabatan[0]->NAMA_JABATAN}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Unit kerja</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<br>

	<table>
		<tr style="text-align: center">
			<th rowspan="2">No.</th>
			<th colspan="2">Uraian Kegiatan</th>
			<th rowspan="2">Tanggal</th>
			<th rowspan="2">Satuan AK</th>
			<th rowspan="2">Jumlah Jam</th>
			<th rowspan="2">Jumlah AK</th>
			<th rowspan="2">Keterangan</th>
		</tr>
		<tr style="text-align: center">
				<th>Kode</th>
				<th>Kegiatan</th>
		</tr>
		<tr style="text-align: center">
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

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">SURAT PERNYATAAN<br>MELAKUKAN KEGIATAN PENDIDIKAN DAN PELATIHAN</h3>
	</div>
	
	<br>

	<table style="border: 0px">
		<!-- <tr>
			<td colspan="2" style="border: 0px">Menyatakan bahwa :</td>
		</tr> -->
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: <strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">NIP</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NIP_PEGAWAI}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Pangkat / golongan ruang</td>
			<td style="width: 70%; border: 0px">: {{$pangkat[0]->NAMA_PANGKAT}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Jabatan</td>
			<td style="width: 70%; border: 0px">: {{$jabatan[0]->NAMA_JABATAN}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Unit kerja</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<br>

	<table>
		<tr style="text-align: center">
			<th rowspan="2">No.</th>
			<th colspan="2">Uraian Kegiatan</th>
			<th rowspan="2">Tanggal</th>
			<th rowspan="2">Satuan AK</th>
			<th rowspan="2">Jumlah Jam</th>
			<th rowspan="2">Jumlah AK</th>
			<th rowspan="2">Keterangan</th>
		</tr>
		<tr style="text-align: center">
				<th>Kode</th>
				<th>Kegiatan</th>
		</tr>
		<tr style="text-align: center">
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

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">LAPORAN ANGKA KREDIT</h3>
		<h5 style="margin-top:0px; text-align: center;">Masa Penilaian 
		@if ($semester == 1)
		1 Januari - 30 Juni
		@elseif ($semester == 2)
		1 Juli - 31 Desember
		@endif
		{{$tahun}}
		</h5>
	</div>


	<table style="border: 0px">
		<!-- <tr>
			<td colspan="2" style="border: 0px">Menyatakan bahwa :</td>
		</tr> -->
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: <strong>{{$pegawaidupak[0]->NAMA_PEGAWAI}}</strong></td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">NIP</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NIP_PEGAWAI}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Pangkat / golongan ruang</td>
			<td style="width: 70%; border: 0px">: {{$pangkat[0]->NAMA_PANGKAT}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Jabatan</td>
			<td style="width: 70%; border: 0px">: {{$jabatan[0]->NAMA_JABATAN}}</td>
		</tr>
		<tr>
			<td style="width: 30%; border: 0px">Unit kerja</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<br>

	<table>
		<tr style="text-align: center">
			<th rowspan="2" >No.</th>
			<th rowspan="2" >Uraian Sub Unsur</th>
			<th colspan="2" >Jumlah Angka Kredit</th>
			<th colspan="2" >Jumlah Hari</th>
			<th rowspan="2" >Perbedaan</th>
			<th rowspan="2" >Ket Perbedaan</th>
		</tr>
		<tr style="text-align: center">
				<th>Diusulkan</th>
				<th>Disetujui</th>
				<th>Diusulkan</th>
				<th>Disetujui</th>
		</tr>
		<tr style="text-align: center">
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
		<tr style="text-align: center">
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
		<tr style="text-align: center">
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
		<tr style="text-align: center">
			<td></td>
			<td><strong>Jumlah Pengembangan Profesi</strong></td>
			<td>{{ $jmlpengembangan }}</td>
			<td></td>
			<td>{{ $jmlharipengembangan }}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="text-align: center">
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
		<tr style="text-align: center">
			<td></td>
			<td><strong>Jumlah Unsur Penunjang</strong></td>
			<td>{{ $jmlpenunjang }}</td>
			<td></td>
			<td>{{ $jmlharipenunjang }}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="text-align: center">
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

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">DAFTAR USULAN PENETAPAN ANGKA KREDIT</h3>
	</div>

	<br>

	<table class="center" style="border: 0px; width: 65%;">
		<tr>
			<td style="width: 50%; border: 0px">NOMOR</td>
			<td style="width: 50%; border: 0px">: </td>
		</tr>
		<tr>
			<td style="width: 50%; border: 0px">MASA PENILAIAN TANGGAL</td>
			<td style="width: 50%; border: 0px">: 
			@if ($semester == 1)
			1 Januari - 30 Juni
			@elseif ($semester == 2)
			1 Juli - 31 Desember
			@endif
			{{$tahun}}</td>
		</tr>
	</table>

	<table>
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
			<td>8.</td>
			<td>Masa Kerja Golongan</td>
			<td>Lama</td>
			<td></td>            
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Baru</td>
			<td></td>
		</tr>
		<tr>
			<td>9.</td>
			<td colspan="2">Unit Kerja</td>
			<td>{{$pegawaidupak[0]->UNIT_KERJA_PEGAWAI}}</td>
		</tr>
	</table>

	<table>
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
			<th>LAMA</th>
			<th>BARU</th>
			<th>JUMLAH</th>
			<th>LAMA</th>
			<th>BARU</th>
			<th>JUMLAH</th>
		</tr>
		<tr style="font-weight: bold;">
			<td style="text-align: center">I</td>
			<td>PENDIDIKAN SEKOLAH</td>
			<td>{{ isset($dupak->lama_pendidikan) ? $dupak->lama_pendidikan : '' }}</td>
			<td>{{ isset($dupak->baru_pendidikan) ? $dupak->baru_pendidikan : '' }}</td>
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
			<td>{{ isset($dupak->lama_diklat) ? $dupak->lama_diklat : '' }}</td>
			<td>{{ isset($dupak->baru_diklat) ? $dupak->baru_diklat : '' }}</td>
			<td>{{$totaldiklat}}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td style="padding-left:20px;">b. Pengawasan</td>
			<td>{{ isset($dupak->lama_pengawasan) ? $dupak->lama_pengawasan : '' }}</td>
			<td>{{ isset($dupak->baru_pengawasan) ? $dupak->baru_pengawasan : '' }}</td>
			<td>{{$totalpengawasan}}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td style="padding-left:20px;">c. Pengembangan Profesi</td>
			<td>{{ isset($dupak->lama_pengembangan) ? $dupak->lama_pengembangan : '' }}</td>
			<td>{{ isset($dupak->baru_pengembangan) ? $dupak->baru_pengembangan : '' }}</td>
			<td>{{$totalpengembangan}}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="font-weight: bold;">
			<td></td>
			<td style="text-align:right">JUMLAH</td>
			<td>{{ isset($dupak) ? $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan : '' }}</td>
			<td>{{ isset($dupak) ? $dupak->baru_diklat + $dupak->baru_pengawasan + $dupak->baru_pengembangan : '' }}</td>
			<td>{{ $totaldiklat + $totalpengawasan + $totalpengembangan }}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="font-weight: bold;">
			<td style="text-align: right">B.</td>
			<td>UNSUR PENUNJANG</td>
			<td>{{ isset($dupak->lama_penunjang) ? $dupak->lama_penunjang : '' }}</td>
			<td>{{ isset($dupak->baru_penunjang) ? $dupak->baru_penunjang : '' }}</td>
			<td>{{$totalpenunjang}}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="font-weight: bold;">
			<td></td>
			<td style="text-align:right">JUMLAH AK. PENJENJANGAN</td>
			<td>{{ isset($dupak) ? $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang : '' }}</td>
			<td>{{ isset($dupak) ? $dupak->baru_diklat + $dupak->baru_pengawasan + $dupak->baru_pengembangan + $dupak->baru_penunjang : '' }}</td>
			<td>{{ $totaldiklat + $totalpengawasan + $totalpengembangan + $totalpenunjang }}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="font-weight: bold;">
			<td></td>
			<td style="text-align:right">JUMLAH (I + II)</td>
			<td>{{ isset($dupak) ? $dupak->lama_pendidikan + $dupak->lama_diklat + $dupak->lama_pengawasan + $dupak->lama_pengembangan + $dupak->lama_penunjang : '' }}</td>
			<td>{{ isset($dupak) ? $dupak->baru_pendidikan + $dupak->baru_diklat + $dupak->baru_pengawasan + $dupak->baru_pengembangan + $dupak->baru_penunjang : '' }}</td>
			<td>{{ $totalpendidikan + $totaldiklat + $totalpengawasan + $totalpengembangan + $totalpenunjang }}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>

	<div class="page-break"></div>

	<div class="col-print-12 col-md-12">
		<h3 style="margin-bottom:0px; text-align: center;">PENETAPAN ANGKA KREDIT JABATAN FUNGSIONAL AUDITOR</h3>
	</div>

	<br>

	<table class="center" style="border: 0px; width: 65%;">
		<tr>
			<td style="width: 50%; border: 0px">NOMOR</td>
			<td style="width: 50%; border: 0px">: </td>
		</tr>
		<tr>
			<td style="width: 50%; border: 0px">MASA PENILAIAN TANGGAL</td>
			<td style="width: 50%; border: 0px">: 
			@if ($semester == 1)
			1 Januari - 30 Juni
			@elseif ($semester == 2)
			1 Juli - 31 Desember
			@endif
			{{$tahun}}</td>
		</tr>
	</table>

	<table>
		<tr style="text-align: center">
			<td colspan="3">KETERANGAN PERORANGAN</td>
		</tr>
		<tr>
			<td style="width: 10%;">1.</td>
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

	<table>
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


</body>
</html>