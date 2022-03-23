<!DOCTYPE html>
<html>
<head>
	<title>LAK</title>
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

	</style>
</head>
<body>

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
		<tr>
			<td style="width: 30%; border: 0px">Nama</td>
			<td style="width: 70%; border: 0px">: {{$pegawaidupak[0]->NAMA_PEGAWAI}}</td>
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


</body>
</html>