@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Edit Paket Laundry</h4>
	<a href="{{ route('paket')}}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('paket.update', $paket->id)}}" method="POST" class="mt-5">
	@csrf
	<div class="form-group">
		<select name="jenis" class="form-control" required>
			<option value="kiloan" {{ $paket->jenis != 'kiloan' ?: 'selected'}}>Kiloan</option>
			<option value="selimut" {{ $paket->jenis != 'selimut' ?: 'selected'}}>Selimut</option>
			<option value="bed_cover" {{ $paket->jenis != 'bed_cover' ?: 'selected'}}>Bed cover</option>
			<option value="kaos" {{ $paket->jenis != 'kaos' ?: 'selected'}}>Kaos</option>
			<option value="lain" {{ $paket->jenis != 'lain' ?: 'selected'}}>Lain-lain</option>
		</select>
	</div>
	<div class="form-group">
		<input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="form-control" placeholder="Masukkan nama paket Anda">
	</div>
	<div class="form-group">
		<input type="number" name="harga" value="{{ $paket->harga }}" class="form-control" placeholder="Masukkan harga paket Anda">
	</div>
	<div class="form-group">
		<button class="btn btn-primary w-100">Simpan</button>
	</div>
</form>

@endsection