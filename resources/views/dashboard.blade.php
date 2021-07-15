@extends('layout.mainlayout')

@section('page_title', 'Inspektorat | Home')

@section('custom_css')
<style>
.center {
  text-align: center;
  border: 3px solid green;
}
.container {
  display: flex;
  justify-content: center;
}
</style>
@endsection

@section('title', 'Inspektorat Sidoarjo')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->

<div class="container">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>Form LHP</h3>

			</div>
			<div class="icon">
				<i class="ion ion-document-text"></i>
			</div>
			<a href="/lhp/insert_lhp" class="small-box-footer">Input <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>Form Temuan</sup></h3>

			</div>
			<div class="icon">
				<i class="ion ion-search"></i>
			</div>
			<a href="/temuan/insert_temuan" class="small-box-footer">Input <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>

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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style="text-align:center">Judul Pemerikasaan</th>
                  <th style="text-align:center">Jenis Pengawasan </th>
                  <th style="text-align:center">Kode Temuan </th>
                  <th style="text-align:center">Uraian Temuan </th>
                  <th style="text-align:center">Kode Rekomendasi</th>
                  <th style="text-align:center">Uraian Rekomendasi </th>
                  <th style="text-align:center">Kerugian </th>
                  <th style="text-align:center">Nama OPD </th>
                  <th style="text-align:center">Uraian Tindak Lanjut </th>
                  <th style="text-align:center">Tanggal Tindak Lanjut </th>
				  <th style="text-align:center">Tanggal LHP </th>
				  
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