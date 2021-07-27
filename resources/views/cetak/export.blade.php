<?php
//import koneksi ke database
?>
<html>
<head>
  <title>Evaluasi dan Pelaporan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Evaluasi dan Pelaporan</h2>
			<!-- <h4>(Inventory)</h4> -->
				<div class="data-tables datatable-dark">
					
                <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>		
						<th rowspan="2" scope="rowgroup" style="text-align:center">Nomer LHP</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Temuan</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Rekomendasi</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Tindak Lanjut</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Tanggal Tindak Lanjut</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Kerugian</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Nama OPD</th>
					</tr>
					<tr>
						<th style="text-align:center">Kode</th>
						<th style="text-align:center">Uraian</th>
						<th style="text-align:center">Kode</th>
						<th style="text-align:center">Uraian</th>
						<th style="text-align:center">Uraian</th>
						<th style="text-align:center">Status</th>
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
						@foreach($id as $OPD)
						@if ($OPD->KODE_OPD === $data->KODE_OPD)
						<td>{{$OPD->NAMA_OPD}}</td>
						@endif
						@endforeach 
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
</div>
	
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>