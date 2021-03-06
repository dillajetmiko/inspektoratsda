<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<table>
				@foreach ($lhp2 as $datalhp)
				<tr>
					<th colspan="2" scope="colgroup" style="font-weight: bold">Judul Pemeriksaan</th>
					<td>: {{ $datalhp->JUDUL_PEMERIKSAAN	}}</td>
				</tr>
				<tr>
					<th colspan="2" scope="colgroup" style="font-weight: bold">Tanggal LHP</th>
					<td>: {{ $datalhp->TANGGAL_LHP	}}</td>
				</tr>
				<tr>
					<th colspan="2" scope="colgroup" style="font-weight: bold">Nomor LHP</th>
					<td>: {{ $datalhp->NOMOR_LHP }}</td>
				</tr>
				@endforeach
				</table>

				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>		
						<th colspan="2" scope="colgroup" style="text-align:center; border: 1px solid black">Temuan</th>
						<th colspan="2" scope="colgroup" style="text-align:center; border: 1px solid black">Rekomendasi</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center; border: 1px solid black">Kerugian</th>
					</tr>
					<tr>
						<th style="text-align:center; border: 1px solid black">Kode</th>
						<th style="text-align:center; border: 1px solid black; width: 25px">Uraian</th>
						<th style="text-align:center; border: 1px solid black">Kode</th>
						<th style="text-align:center; border: 1px solid black; width: 25px">Uraian</th>
					</tr>
					</thead>
					<tbody>		
					@foreach($cetak as $data)
					<tr>
						<td style="border: 1px solid black;">{{ $data->ID_KATEGORI }}</td>
						<td style="border: 1px solid black;">{{ $data->URAIAN_TEMUAN }}</td>
						<td style="border: 1px solid black;">
							@foreach($rekomendasi as $rekom)
							@if ($rekom->ID_TEMUAN === $data->id)
									{{$rekom->KODE_REKOMENDASI}}<br>
							@endif
							@endforeach
						</td>
						<td style="border: 1px solid black;">
							@foreach($rekomendasi as $rekom)
							@if ($rekom->ID_TEMUAN === $data->id)
									{{$rekom->URAIAN_REKOMENDASI}}<br>
							@endif
							@endforeach
						</td>	
						<td style="border: 1px solid black;">{{ $data->KERUGIAN }}</td>
					</tr>
					@endforeach
					</tbody>
					<tfoot>
					</tfoot>
				</table>
</body>