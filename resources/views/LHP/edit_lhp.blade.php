@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit LHP')

@section('title', 'Data LHP')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/lhp">LHP</a></li>
<li class="breadcrumb-item active">Update Data</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Title</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/buku/updateBuku" method="post">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
			No ISBN  : <input type="text" class="form-control" name="noISBN" value ="{{ $buku[0]->noISBN }}" readonly><br>
			Bahasa : 
			<select class="form-control" name="id_bahasa">
			@foreach ($id as $bahasa)
			@if ($bahasa->id_bahasa === $buku[0]->id_bahasa)
			<option value="{{ $bahasa->id_bahasa}}" selected>{{ $bahasa->nama_bahasa}}</option>
			@else
			<option value="{{ $bahasa->id_bahasa}}">{{ $bahasa->nama_bahasa}}</option>
			@endif
			@endforeach
			</select><br>
			Penerbit : 
			<select class="form-control" name="id_penerbit">
			@foreach ($id2 as $penerbit)
			@if ($penerbit->id_penerbit === $buku[0]->id_penerbit)
			<option value="{{ $penerbit->id_penerbit}}" selected>{{ $penerbit->nama_penerbit}}</option>
			@else
			<option value="{{ $penerbit->id_penerbit}}">{{ $penerbit->nama_penerbit}}</option>
			@endif
			@endforeach
			</select><br>
			Jenis Buku : 
			<select class="form-control" name="id_jenis">
			@foreach ($id3 as $jenisbuku)
			@if ($jenisbuku->id_jenis === $buku[0]->id_jenis)
			<option value="{{ $jenisbuku->id_jenis}}" selected>{{ $jenisbuku->nama_jenisbuku}}</option>
			@else
			<option value="{{ $jenisbuku->id_jenis}}">{{ $jenisbuku->nama_jenisbuku}}</option>
			@endif
			@endforeach
			</select><br>
			Judul Buku : <input type="text" class="form-control" name="judul_buku" value="{{ $buku[0]->judul_buku }}"><br>
			Tahun Terbit : <input type="text" class="form-control" name="tahun_terbit" value="{{ $buku[0]->tahun_terbit }}"><br>
			Penulis : <input type="text" class="form-control" name="penulis" value="{{ $buku[0]->penulis }}"><br>
			Cetakanke : <input type="text" class="form-control" name="cetakan_ke" value="{{ $buku[0]->cetakan_ke }}"><br>
			Harga : <input type="text" class="form-control" name="harga" value="{{ $buku[0]->harga }}"><br>
			Jumlah Eksemplar : <input type="text" class="form-control" name="jumlah_eksemplar" value="{{ $buku[0]->jumlah_eksemplar }}"><br>
			Kategori Buku : <br>
				@if ($buku[0]->kategori_buku == 1)
				<label><input type="radio" name="kategori_buku" value="1" checked="checked"/> Non Fiksi </label>
				<label><input type="radio" name="kategori_buku" value="0" /> Fiksi </label><br>
				@else
				<label><input type="radio" name="kategori_buku" value="1" /> Non Fiksi </label>
				<label><input type="radio" name="kategori_buku" value="0" checked="checked"/>Fiksi </label><br>
				@endif
				<br>
			<input type="submit" value="Update">
		</form>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		Footer
	</div>
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection