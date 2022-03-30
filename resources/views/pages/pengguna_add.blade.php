@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Tambah Pengguna</h4>
	<a href="{{ route('pengguna')}}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('pengguna.store')}}" method="POST" class="mt-5">
	@csrf
	<div class="form-group">
		<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengguna">
	</div>
	<div class="form-group">
		<input type="text" name="username" class="form-control" placeholder="Masukkan username">
	</div>
	<div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Masukkan password">
	</div>
	<div class="form-group">
		<select name="role" class="form-control" required>
			<option value="">Pilih Role Pengguna</option>
			<option value="Admin">Admin</option>
			<option value="Kasir">Kasir</option>
			<option value="Owner">Owner</option>
			<option></option>
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-primary w-100">Tambah</button>
	</div>
</form>

@endsection