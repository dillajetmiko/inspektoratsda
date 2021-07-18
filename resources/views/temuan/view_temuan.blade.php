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
			<a href="/temuan/insert_temuan">
			<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data Temuan</button>
			</a>
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
            <th rowspan="2" scope="rowgroup" style="text-align:center">Jenis Pengawasan</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Nama OPD</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Nama Pejabat</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Tanggal Temuan</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Tanggal Tindak Lanjut</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Kerugian</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Jenis Temuan</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Hasil Telaah</th>
            <th rowspan="2" scope="rowgroup" style="text-align:center">Action</th>
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
        @foreach($temuan as $data)
				<tr>
					<td>{{ $data->KODE_TEMUAN }}</td>
					<td>{{ $data->NOMOR_LHP }}</td>
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
					<td>{{ $data->JENIS_PENGAWASAN }}</td>
					@foreach($id as $OPD)
					@if ($OPD->KODE_OPD === $data->KODE_OPD)
					<td>{{$OPD->NAMA_OPD}}</td>
					@endif
					@endforeach 
					<td>{{ $data->NAMA_PEJABAT }}</td>
					<td>{{ $data->TANGGAL_TEMUAN }}</td>
					<td>{{ $data->TANGGAL_TINDAK_LANJUT }}</td>
					<td>{{ $data->KERUGIAN }}</td>
					@if ($data->KODE_JENIS_TEMUAN == 1)
					<td> Internal</td> 
					@elseif ($data->KODE_JENIS_TEMUAN == 2)
					<td> Eksternal</td>
					@endif
					<td>{{ $data->HASIL_TELAAH }}</td>
					<td><a href='/temuan/edit_temuan/{{ $data->KODE_TEMUAN }}'>
					<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
					</a>
					<a href='/temuan/hapus/{{ $data->KODE_TEMUAN }}'>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</a>
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
@endsection


@section('custom_script')
<!-- DataTables -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});
  });
</script>
@endsection