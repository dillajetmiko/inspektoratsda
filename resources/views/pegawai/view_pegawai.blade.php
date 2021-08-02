@extends("layout.mainlayout")

@section("page_title","Pegawai")

@section("title","Pegawai")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">PEGAWAI</li> 
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
	  <h3 class="card-title"> DATA PEGAWAI</h3>
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
				@can('tambah-pegawai')
				<a href="/pegawai/insert_pegawai">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data Pegawai</button>
				</a>
				@endcan
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">NIP</th>
						<th style="text-align:center">Nama</th>
						<th style="text-align:center">Tempat Tanggal Lahir</th>
						<th style="text-align:center">Alamat</th>
						<th style="text-align:center">No. HP</th>
						<th style="text-align:center">Jabatan</th>
                        <th style="text-align:center">Pangkat</th>
                        <th style="text-align:center">Unit Kerja</th>
						@can('edit-hapus-pegawai')
						<th style="text-align:center" width="15%">Aksi</th>
						@endcan
					</tr>
					</thead>
					<tbody>
					@foreach($pegawai as $data)
					<tr>
						<td>{{ $data->NIP_PEGAWAI }}</td>
						<td>{{ $data->NAMA_PEGAWAI }}</td>
						<td>{{ $data->TTL_PEGAWAI }}</td>
						<td>{{ $data->ALAMAT_PEGAWAI }}</td>
						<td>{{ $data->NO_HP }}</td>
                        <td>{{ $data->JABATAN_PEGAWAI }}</td>
                        <td>{{ $data->PANGKAT_PEGAWAI }}</td>
                        <td>{{ $data->UNIT_KERJA_PEGAWAI }}</td>
						@can('edit-hapus-pegawai')
						<td><a href='/pegawai/edit_pegawai/{{ $data->NIP_PEGAWAI }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<button onclick="confirmDelete({{ $data->NIP_PEGAWAI }})" class="btn btn-danger btn-sm"> Hapus</button>
						</td>  
						@endcan           
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

<div class="modal fade" id="deletePegawai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin mengahpus data ini?
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

<script>
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});
  });
</script>
@endsection

@section('scripts')
<script>
	function confirmDelete(id)
	{
		var link = document.getElementById('deleteLink')
		link.href="/pegawai/hapus/" + id
		$('#deletePegawai').modal('show')}


</script>
@endsection