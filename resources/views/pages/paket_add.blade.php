@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Tambah Paket Laundry</h4>
	<a href="{{ route('paket')}}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('paket.store')}}" method="POST" class="mt-5">
	@csrf
	<div class="form-group">
		<select name="jenis" class="form-control">
			<option value="">Pilih jenis paket</option>
			<option value="Kiloan">Kiloan</option>
			<option value="Selimut">Selimut</option>
			<option value="Bed cover">Bed cover</option>
			<option value="Kaos">Kaos</option>
			<option value="Lain-lain">Lain-lain</option>
		</select>
	</div>
	<div class="form-group">
		<input type="text" name="nama_paket" class="form-control" placeholder="Masukkan nama paket Anda">
	</div>
	<div class="form-group">
		<input type="number" name="harga" class="form-control" placeholder="Masukkan harga paket Anda">
	</div>
	<div class="form-group">
		<button class="btn btn-primary w-100">Tambah</button>
	</div>
</form>

@endsection