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
				@endforeach
				</table>

<table id="example1" class="table table-bordered table-striped">
				<thead style="background-color: lightgrey; color: blue;">
				<tr>		
                    <th rowspan="2" scope="rowgroup" style="font-weight: bold; text-align:center; width: 12px">Nomer LHP</th>
                    <th colspan="2" scope="colgroup" style="font-weight: bold; text-align:center">Temuan</th>
                    <th colspan="2" scope="colgroup" style="font-weight: bold; text-align:center">Rekomendasi</th>
                    <th colspan="2" scope="colgroup" style="font-weight: bold; text-align:center">Tindak Lanjut</th>
                    <th rowspan="2" scope="rowgroup" style="font-weight: bold; text-align:center; width: 20px">Tanggal Tindak Lanjut</th>
                    <th rowspan="2" scope="rowgroup" style="font-weight: bold; text-align:center; width: 15px">Kerugian</th>
                    <th rowspan="2" scope="rowgroup" style="font-weight: bold; text-align:center; width: 25px">Nama OPD</th>
                </tr>
                <tr>
                    <th style="font-weight: bold; text-align:center">Kode</th>
                    <th style="font-weight: bold; text-align:center; width: 25px">Uraian</th>
                    <th style="font-weight: bold; text-align:center">Kode</th>
                    <th style="font-weight: bold; text-align:center; width: 25px">Uraian</th>
                    <th style="font-weight: bold; text-align:center; width: 25px">Uraian</th>
                    <th style="font-weight: bold; text-align:center; width: 15px">Status</th>
                </tr>
				</thead>
				<tbody>		
				@foreach($cetak as $data)
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
						<td>{{ $data->TANGGAL_TINDAK_LANJUT }}</td>
						<td>{{ $data->KERUGIAN }}</td>
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
					</td>
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