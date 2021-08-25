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

/* Edit video */
#video {
  /* position: absolute; */
  top: 0;
  z-index: -1;
  overflow: hidden;
  width: 100%;
  height: 80vh;
  /* background: black no-repeat center center/cover; */
}
 
video {
  min-width: 100%;
  min-height: 80vh;
  z-index: 1;
}
 
.overlay {
  width: 100%;
  height: 100vh;
  position: absolute;
  top: 0;
  left: 0;
  /* background-color: rgba(8, 27, 11, 0.3); */
  z-index: 2;
}
</style>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Our CSS -->
<!-- <link rel="stylesheet" href="style.css"> -->
@endsection

@section('content')
<!-- Create video -->
<section id="video">
	<div class="overlay"></div>
		<!-- Ubah link dalam "src" sesuai video yang diinginkan -->
	<video width="420" height="315" src="{{asset ('asset/dist/video-header-1.mp4')}}" loop muted autoplay></video>     
</section><br>

<!-- Small boxes (Stat box) -->
@can('show-menu')

<!-- <div class="container">
	@can('tambah-pegawai')
	<div class="col-lg-4 col-6">
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

	<div class="col-lg-3 col-6">
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
	@endcan

</div> -->

@else
anda belum punya role
@endcan


@endsection

@section('custom_script')
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection