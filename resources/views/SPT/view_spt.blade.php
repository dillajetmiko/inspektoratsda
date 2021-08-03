@extends("layout.mainlayout")

@section("page_title","SPT")

@section("title","SPT")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">SPT</li> 
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
	  <h3 class="card-title"> DATA SPT</h3>
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
				@can('tambah-spt')
				<a href="/spt/insert_spt">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data SPT</button>
				</a>
				@endcan
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">ID SPT</th>
						<th style="text-align:center">Nomor</th>
						<th style="text-align:center">Tanggal</th>
						<!-- <th style="text-align:center">Dasar</th> -->
						<th style="text-align:center">Jenis Pengawasan</th>
						<th style="text-align:center">Isi</th>
						<th style="text-align:center">Penugasan</th>
                        <th style="text-align:center">Upload File</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($spt as $data)
					<tr>
						<td>{{ $data->id }}</td>
						<td>{{ $data->NOMOR_SPT }}</td>
						<td>{{ $data->TANGGAL_SPT }}</td>
						<!-- <td>{{ $data->DASAR_SPT }}</td> -->
						<td>
						@foreach($jenis_pengawasan as $jenis)
						@if ($jenis->ID_PENGAWASAN === $data->ID_PENGAWASAN)
							{{$jenis->NAMA_PENGAWASAN}}<br>
						@endif
						@endforeach
						</td>
						<td>{{ $data->ISI_SPT }}</td>
						<td>
						@foreach($penugasan as $tugas)
						@if ($tugas->id_spt === $data->id)
							@foreach($pegawai as $peg)
							@if ($peg->NIP_PEGAWAI === $tugas->NIP_PEGAWAI)
							{{$peg->NAMA_PEGAWAI}}<br>
							@endif
							@endforeach
						@endif
						@endforeach
						<a href='/penugasan/insert_view_penugasan/{{ $data->id }}'>
                        lihat penugasan
                        </a>
						</td>
                        <td>
						@if ($data->FILE_SPT == null)
						Tidak ada file
						@else
						<a href="spt/download/{{ $data->id }}" class='btn btn-ghost-info'>
							<i class="fa fa-download"></i> Download
						</a>
						@endif
						<td>
						@can('edit-hapus-spt')
						<a href='/spt/edit_spt/{{ $data->id }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<!-- <a href='/spt/hapus/{{ $data->id }}'>
						<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						</a> -->
						<button onclick="confirmDelete({{ $data->id }})" class="btn btn-danger btn-sm"> Hapus</button>
						@endcan
						</a>
						<a href='/spt/generate-docx/{{ $data->id }}'>
						<button type="button" class="btn btn-secondary"><i class="fas fa-print"></i> Cetak</button>
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

			<!-- <a href="/spt/cetak_spt">
				<button type="button" class="btn btn-info float-left" style="float: left;"><i class="fas fa-file-export"></i> Cetak </button>
			</a> -->
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
<div class="modal fade" id="deleteSPT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
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

@section('scripts')
<script>
	function confirmDelete(id)
	{
		var link = document.getElementById('deleteLink')
		link.href="/spt/hapus/" + id
		$('#deleteSPT').modal('show')}

</script>
@endsection