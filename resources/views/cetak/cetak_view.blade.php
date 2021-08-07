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
</style>
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
						<th colspan="2" scope="colgroup" style="text-align:center">Temuan</th>
					<th colspan="2" scope="colgroup" style="text-align:center">Rekomendasi</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Kerugian</th>
					</tr>
					<tr>
						<th style="text-align:center">Kode</th>
						<th style="text-align:center; width: 25px">Uraian</th>
						<th style="text-align:center">Kode</th>
						<th style="text-align:center; width: 25px">Uraian</th>
					</tr>
					</thead>
					<tbody>		
					@foreach($cetak as $data)
					<tr>
						<td>{{ $data->ID_KATEGORI }}</td>
						<td>{{ $data->URAIAN_TEMUAN }}</td>
						<td>
							@foreach($rekomendasi as $rekom)
							@if ($rekom->ID_TEMUAN === $data->id)
									{{$rekom->KODE_REKOMENDASI}}<br>
							@endif
							@endforeach
						</td>
						<td>
							@foreach($rekomendasi as $rekom)
							@if ($rekom->ID_TEMUAN === $data->id)
									{{$rekom->URAIAN_REKOMENDASI}}<br>
							@endif
							@endforeach
						</td>	
						<td>{{ $data->KERUGIAN }}</td>
					</tr>
					@endforeach
					</tbody>
					<tfoot>
					</tfoot>
				</table>