@extends('layout.mainlayout')

@section('page_title', 'Inspektorat || Edit USER')

@section('title', 'Data USER')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/user">USER</a></li>
<li class="breadcrumb-item active">Update Data</li>
@endsection

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data User</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action="/user/update_user" method="post">  
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">

			</select><br>
			NIP : <input type="text" class="form-control" name="NIP" value="{{$user[0]->NIP}}" readonly><br>
            Nama : <input type="text" class="form-control" name="NAMA" value="{{$user[0]->name}}"><br>
			Email : <input type="text" class="form-control" name="EMAIL" value="{{$user[0]->email}}"><br>
            Password : <input type="password" class="form-control" name="PASSWORD" placeholder="isi jika merubah password"><br>
			Role :<br>
				<select class="form-control select2" name="id_role">
                @foreach ($role as $ro)
                @if ($ro->id_role === $user[0]->id_role)
                <option value="{{ $ro->id_role}}" selected>{{ $ro->nama_role}}</option>
                @else
                <option value="{{ $ro->id_role}}">{{ $ro->nama_role}}</option>
                @endif
                @endforeach
                </select>
                <br>
			Jabatan: <input type="text" class="form-control" name="JABATAN" value="{{$user[0]->jabatan}}"><br>
            Pangkat: <input type="text" class="form-control" name="PANGKAT" value="{{$user[0]->pangkat}}"><br>
            
        <br><br>
        <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection