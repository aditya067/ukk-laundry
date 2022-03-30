@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Registrasi Pelanggan</h4>
	<a href="{{ route('transaksi')}}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('pelanggan.store')}}" method="POST" class="mt-5">
	@csrf
	<div class="form-group">
		<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan">
	</div>
	<div class="form-group">
		<input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat ">
	</div>
	<div class="form-group">
		<select name="jeniskelamin" class="form-control" required>
		<option value="">Pilih jenis kelamin</option>
		<option value="Laki-laki">Laki-laki</option>
		<option value="Perempuan">Perempuan</option>
	</select>
	</div>
	<div class="form-group">
		<input type="text" name="telp" class="form-control" placeholder="Masukkan no telepon">
	</div>
	<div class="form-group">
		<button class="btn btn-primary w-100">Tambah</button>
	</div>
</form>

@endsection