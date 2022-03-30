@extends('layout')

@section('content')


<div class="d-flex">
	<h4 class="mr-auto">Tambah Transaksi</h4>	
	<a href="{{ route('transaksi.pelanggan', $pelanggan->id)}}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('transaksi.pelanggan.store', $pelanggan->id)}}" method="POST">
	@csrf

	<h5 class="mt-3">Data Pelanggan</h5>
	<ul>
		<li>{{ $pelanggan->nama }}</li>
		<li>{{ $pelanggan->jeniskelamin }}</li>
		<li>{{ $pelanggan->alamat }}</li>
		<li>{{ $pelanggan->telp }}</li>
	</ul>

	<div class="form-group">
		<label>Kode Invoice</label>
		<input type="text" name="kodeinvoice" class="form-control" placeholder="Masukkan kode invoice">
	</div>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="datetime-local" name="tanggal" class="form-control">
	</div>
	<div class="form-group">
		<label>Batas Waktu</label>
		<input type="datetime-local" name="bataswaktu" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal Bayar</label>
		<input type="datetime-local" name="tanggalbayar" class="form-control">
	</div>
	<div class="form-group">
		<label>Biaya Tambahan</label>
		<input type="number" name="biayatambahan" class="form-control">
	</div>
	<div class="form-group">
		<label>Diskon</label>
		<input type="number" name="diskon" class="form-control">
	</div>
	<div class="form-group">
		<label>Pajak</label>
		<input type="number" name="pajak" class="form-control">
	</div>
	<div class="form-group">
		<label>Status Pembayaran</label>
		<select name="dibayar" class="form-control">
			<option value="">Pilih status pembayaran</option>
			<option value="Dibayar">Dibayar</option>
			<option value="Belum dibayar">Belum dibayar</option>
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-success">Tambah Transaksi</button>
	</div>
</form>


@endsection