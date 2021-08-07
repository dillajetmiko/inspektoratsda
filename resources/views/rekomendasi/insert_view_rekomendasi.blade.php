@extends("layout.mainlayout")

@section("page_title","Rekomendasi")

@section("title","Rekomendasi")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/spt">SPT</a></li>
<li class="breadcrumb-item active">Rekomendasi</li> 
@endsection

@section('custom_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset ('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset ('asset/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
<!-- Default box -->
<div class="card">    
  <div class="card-header">
	  <h3 class="card-title"> DATA REKOMENDASI</h3>
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
				<div class="form-group">
					<form action="/rekomendasi/insert_view_rekomendasi" method="post" enctype="multipart/form-data">
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
					id Temuan : <input type="text" class="form-control" name="ID_TEMUAN" value="{{$temuan[0]->id}}" readonly><br>
					Kode Rekomendasi : <input type="text" class="form-control" name="KODE_REKOMENDASI"><br>
					Uraian Rekomendasi : <input type="text" class="form-control" name="URAIAN_REKOMENDASI"><br>
					Uraian Tindak Lanjut : <input type="text" class="form-control" name="URAIAN_TINDAK_LANJUT"><br>
					Status Tindak Lanjut :<br> 
						<label><input type="radio" name="ID_STATUS" value="1" checked="checked" /> Belum Ditindak Lanjut </label><br>
						<label><input type="radio" name="ID_STATUS" value="2" /> Belum Sesuai Rekomendasi </label><br>
						<label><input type="radio" name="ID_STATUS" value="3" /> Sesuai rekomendasi </label><br><br>
					Tanggal Tindak Lanjut : <input type="date" class="form-control" name="TANGGAL_TINDAK_LANJUT"><br>
					Hasil Telaah Tindak Lanjut: <input type="text" class="form-control" name="HASIL_TELAAH_TINDAK_LANJUT"><br>

		
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href='/temuan'>
					<button type="button" class="btn btn-info">Selesai</button>
					</a>
					</form>
				</div>
			</div>
			

			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">id</th>
						<th style="text-align:center">Kode Rekomendasi</th>
						<th style="text-align:center">Uraian Rekomendasi</th>
						<th style="text-align:center">Uraian Tindak Lanjut</th>
						<th style="text-align:center">Status Tindak Lanjut</th>
						<th style="text-align:center">Tanggal Tindak Lanjut</th>
						<th style="text-align:center">Hasil Telaah Tindak Lanjut</th>
						<th style="text-align:center">OPD</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($rekomendasi as $data)
					<tr>
						<td>{{ $data->id }}</td>
						<td>{{ $data->KODE_REKOMENDASI }}</td>
						<td>{{ $data->URAIAN_REKOMENDASI }}</td>
						<td>{{ $data->URAIAN_TINDAK_LANJUT }}</td>
						@if ($data->ID_STATUS == 1)
						<td> Belum Ditindak Lanjut</td>
						@elseif ($data->ID_STATUS == 2)
						<td> Belum Sesuai Rekomendasi</td>
						@elseif ($data->ID_STATUS == 3)
						<td> Sesuai Rekomendasi</td>
						@endif
						<td>{{ $data->TANGGAL_TINDAK_LANJUT }}</td>
						<td>{{ $data->HASIL_TELAAH_TINDAK_LANJUT }}</td>
						<td>
						@foreach($punya_opd as $po)
						@if ($po->ID_REKOMENDASI === $data->id)
								@foreach($opd as $o)
								@if ($o->KODE_OPD === $po->KODE_OPD)
								{{$o->NAMA_OPD}}<br>
								@endif
								@endforeach
						@endif
						@endforeach
						<a href='/punya_opd/insert_view_punya_opd/{{ $data->id }}'>
                        lihat opd
                        </a>
						</td> 
						<td>
						<a href='/rekomendasi/edit_rekomendasi/{{ $data->id }}'>
						<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>
						<a href='/rekomendasi/hapus/{{ $data->id }}&{{ $data->ID_TEMUAN}}'>
						<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
						</a>
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

<!-- <div class="modal fade" id="deletePenugasan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
</div> -->
@endsection


@section('custom_script')
<!-- DataTables -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset ('asset/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    //Initialize Select2 Elements
    $('.select2').select2()

  });
</script>

@endsection