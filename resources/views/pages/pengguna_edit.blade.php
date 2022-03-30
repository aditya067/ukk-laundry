@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Edit Pengguna</h4>
	<a href="{{ route('pengguna')}}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('pengguna.update', $pengguna->id)}}" method="POST" class="mt-5">
	@csrf
	<div class="form-group">
		<input type="text" name="nama" class="form-control" value="{{ $pengguna->nama }}" placeholder="Masukkan nama pengguna">
	</div>
	<div class="form-group">
		<input type="text" name="username" class="form-control" value="{{ $pengguna->username}}" placeholder="Masukkan username">
	</div>
	<div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
	</div>
	<div class="form-group">
		<select name="role" class="form-control" required>
			<option value="Admin" {{ $pengguna->role != 'Admin' ?: 'selected' }}>Admin</option>
			<option value="Kasir" {{ $pengguna->role != 'Kasir' ?: 'selected' }}>Kasir</option>
			<option value="Owner" {{ $pengguna->role != 'Owner' ?: 'selected' }}>Owner</option>
			<option></option>
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

@endsection