@extends("layout.mainlayout")

@section("page_title","Cetak")

@section("title","Cetak")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Cetak</li> 
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
		<h3 class="card-title"></h3>

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
				<!-- <button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data Temuan</button> -->
				</a>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
				Judul Pemerikasaan<br>
				Jenis Pengawasan<br>
				Tanggal LHP<br>
				Tanggal Temuan<br>
				<br>
				<table id="example1" class="table table-bordered table-striped">
				  <thead>
				  
					<tr>		
						<th colspan="2" scope="colgroup" style="text-align:center">Temuan</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Rekomendasi</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Tindak Lanjut</th>
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