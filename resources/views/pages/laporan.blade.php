@extends('layout')

@section('content')


<h4>Generate Laporan</h4>
<small>Masukkan rentang tanggal yang akan di <i>generate</i> laporannya</small>

<form action="{{ route('laporan.generate')}}">
	@csrf
	<div class="form-group">
		<label>Tanggal awal</label>
		<input type="datetime-local" name="tglmulai" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal akhir</label>
		<input type="datetime-local" name="tglakhir" class="form-control">
	</div>
	<div class="form-group">
		<button class="btn btn-success">Generate Laporan</button>
	</div>
</form>


@endsection