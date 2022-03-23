@extends("layout.mainlayout")

@section("page_title","Kategori Temuan")

@section("title","Kategori Temuan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Kategori Temuan</li> 
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
	  <h3 class="card-title"> DATA KATEGORI TEMUAN</h3>
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
<div class="alert alert-info" role="alert">
{{ session()->get('failed') }}
</div>
@endif 

  <div class="card-body">
		<div class="card">
			<div class="card-header">
				<!-- <h3 class="card-title">Tambah Data Anggota</h3> -->
				@can('tambah-user')
				<a href="/kategori_temuan/insert_kategori_temuan">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data Kategori</button>
				</a>
				@endcan
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">Kode Kategori</th>
						<th style="text-align:center">Uraian Kategori</th>
						@can('edit-hapus-user')
						<th style="text-align:center" width="15%">Aksi</th>
						@endcan 
					</tr>
					</thead>
					<tbody>
					@foreach($kategori_temuan as $data)
					<tr>
						<td>{{ $data->KODE_KATEGORI }}</td>
						<td>{{ $data->URAIAN_KATEGORI }}</td>

						@can('edit-hapus-user')
						<td>
						<a href='/kategori_temuan/edit_kategori_temuan/{{ $data->KODE_KATEGORI }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<button onclick="confirmDelete('{{ $data->KODE_KATEGORI }}')" class="btn btn-danger">
						<i class="fas fa-trash"></i> Hapus</button>
						</td> 
						@endcan  
						</td>             
					</tr>
					@endforeach
					</tbody>
					<tfoot>
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

<div class="modal fade" id="deleteKategoriTemuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
		link.href="/kategori_temuan/hapus/" + id
		$('#deleteKategoriTemuan').modal('show')
	}


</script>
@endsection