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
@can('show-menu')

<div class="container">
	@can('tambah-pegawai')
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h2>Form Kepegawaian</h2>

			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="/pegawai/insert_pegawai" class="small-box-footer">Input <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	@endcan

	@can('tambah-spt')
	<div class="col-lg-3 col-5">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h2>Form SPT</h2>

			</div>
			<div class="icon">
				<i class="ion ion-email"></i>
			</div>
			<a href="/lhp/insert_lhp" class="small-box-footer">Input <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	@endcan

	@can('tambah-lhp')
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h2>Form LHP</h2>

			</div>
			<div class="icon">
				<i class="ion ion-document-text"></i>
			</div>
			<a href="/SPT/insert_spt" class="small-box-footer">Input <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h2>Form Temuan</sup></h2>

			</div>
			<div class="icon">
				<i class="ion ion-search"></i>
			</div>
			<a href="/temuan/insert_temuan" class="small-box-footer">Input <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	@endcan

</div>

@else
anda belum punya role
@endcan


@endsection