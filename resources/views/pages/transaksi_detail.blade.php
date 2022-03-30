@extends('layout')

@section('content')


<div class="d-flex">
	<h4>Detail Transaksi</h4>
</div>

<div class="row">
	<div class="col-md-6">
		<ul class="list-unstyled">
			<li>Kode Invoice	: {{ $transaksi->kode_invoice }}</li>
			<li>Nama member	: {{$transaksi->member->nama}}</li>
			<li>Tanggal	: {{ $transaksi->tanggal }}</li>
			<li>Batas Waktu	: {{ $transaksi->batas_waktu }}</li>
			<li>Tanggal Bayar	: {{ $transaksi->tanggal_bayar }}</li>
			<li>Biaya Tambahan	: Rp {{ $transaksi->biaya_tambahan}},-</li>
			<li>Diskon	: {{ $transaksi->diskon }}%</li>
			<li>Pajak	: Rp {{ $transaksi->pajak }},-</li>
			<li>Status	: {{ $transaksi->status}}</li>
			<li>Pembayaran	: {{$transaksi->dibayar}}</li>
		</ul>
	</div>
	<div class="col-md-6">
		<form action="{{ route('transaksi.detail.store', $transaksi->id)}}" method="POST">
			@csrf
			<div class="form-group">
				<select name="id_paket" class="form-control" required>
					<option value="">Pilih paket</option>
					@foreach($paket as $data)
					<option value="{{ $data->id}}">{{$data->nama_paket}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah">
			</div>
			<div class="form-group">
				<input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan">
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Tambah</button>
			</div>
		</form>
	</div>
</div>
<table class="table mt-4">
	<tr>
		<th>No</th>
		<th>Jenis Paket</th>
		<th>Nama Paket</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Total</th>
	</tr>
	@foreach($transaksi->detailTransaksi as $no=>$data)
	<tr>
		<td>{{ $no+1}}</td>
		<td>{{ $data->paket->jenis}}</td>
		<td>{{ $data->paket->nama_paket}}</td>
		<td>{{ $data->paket->harga}}</td>
		<td>{{ $data->qty}}</td>
		<td>{{ $data->keterangan}}</td>
		<td>{{ $data->paket->harga * $data->qty }}</td>
	</tr>
	@endforeach
</table>

@endsection