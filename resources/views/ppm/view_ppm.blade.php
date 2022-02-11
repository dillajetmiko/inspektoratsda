@extends("layout.mainlayout")

@section("page_title","PPM")

@section("title","PPM")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">PPM</li> 
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
	  <h3 class="card-title"> DATA PPM</h3>
	  <div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	  </div>
  </div>

  
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 

@if(session()->has('failed'))
<div class="alert alert-danger" role="alert">
{{ session()->get('failed') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 

  <div class="card-body">
		<div class="card">
			<div class="card-header">
				<!-- @can('tambah-pegawai') -->
				<a href="/ppm/insert_ppm">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data PPM</button>
				</a>
				<!-- @endcan -->
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">Kegiatan</th>
						<th style="text-align:center">Tanggal Mulai</th>
						<th style="text-align:center">Jenis PPM</th>
						<th style="text-align:center">Peserta</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($ppm as $data)
					<tr>
						<td>{{ $data->kegiatan }}</td>
						<td>{{ $data->tgl_mulai }}</td>
						<!-- <td>{{ $data->jenis_ppm }}</td> -->
						<td>
						@foreach($jenis as $jn)
						@if ($jn->id === $data->id_angka_kredit)
							{{$jn->nama_jenis}}<br>
						@endif
						@endforeach
						</td>

						<td>
						@foreach($peserta as $tugas)
							@foreach($pegawai as $peg)
							@if ($peg->NIK_PEGAWAI === $tugas->pegawai_id)
							{{$peg->NAMA_PEGAWAI}}<br>
							@endif
							@endforeach
						@endforeach
						<a href='/ppm_detail/insert_view_peserta/{{ $data->id }}'>
                        Lihat Detail
                        </a>
						</td>
                        
						<td>
						<!-- @can('edit-hapus-pegawai') -->
						<a href='/ppm/edit_ppm/{{ $data->id }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<button onclick="confirmDelete('{{ $data->id }}')" class="btn btn-danger">
						<i class="fas fa-trash"></i> Hapus</button>
						<!-- <a href='/dupak/pengembangan/{{ $data->id }}'>
						<button type="button" class="btn btn-warning">Dupak Pengembangan</button>
						</a> -->
						<!-- @endcan -->
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

<div class="modal fade" id="deletePPM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
		link.href="/ppm/hapus/" + id
		$('#deletePPM').modal('show')
	}


</script>
@endsection