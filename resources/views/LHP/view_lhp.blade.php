@extends("layout.mainlayout")

@section("page_title","LHP")

@section("title","LHP")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">LHP</li> 
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
	  <h3 class="card-title"> DATA LHP</h3>
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
				@can('tambah-lhp')
				<a href="/lhp/insert_lhp">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data LHP</button>
				</a>
				@endcan
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">No Laporan</th>
						<th style="text-align:center">Nomor SPT</th> 
						<th style="text-align:center">PKPT</th> 
						<th style="text-align:center">Tanggal Laporan</th>
						<th style="text-align:center">Judul Pemeriksaan</th>
						<th style="text-align:center">Anggaran</th>
						<th style="text-align:center">Upload File</th>
						@can('edit-hapus-lhp')
						<th style="text-align:center" width="15%">Aksi</th>
						@endcan
					</tr>
					</thead>
					<tbody>
					@foreach($lhp as $data)
					<tr>
						<td>{{ $data->NOMOR_LHP }}</td>
						
						@foreach($id as $SPT)
						@if ($SPT->id === $data->ID_SPT)
						<td>{{$SPT->NOMOR_SPT}}</td>
						<td>{{$SPT->PKPT}}</td>
						@endif
						@endforeach 
						
						<td>{{ $data->TANGGAL_LHP }}</td>
						<td>{{ $data->JUDUL_PEMERIKSAAN }}</td>
						<td>{{ $data->ANGGARAN }}</td>
						<td>
						@if ($data->UPLOAD_FILE == null)
						Tidak ada file
						@else
						<a href="/filedownload/{{ $data->id }}" class='btn btn-ghost-info'>
							<i class="fa fa-download"></i> Download
						</a>
						@endif
						</td>
						@can('edit-hapus-lhp')
						<td>
						<a href='/lhp/edit_lhp/{{ $data->id }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<!-- <a href='/lhp/hapus/{{ $data->id }}'>
						<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						</a> -->
						<button onclick="confirmDelete('{{ $data->id }}')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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

<div class="modal fade" id="deleteLHP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
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

<!-- <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
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
</div> -->

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
		link.href="/lhp/hapus/" + id
		$('#deleteLHP').modal('show')
	}

</script>
@endsection