@extends('layout')

@section('content')


<div class="d-flex">
	<h4 class="mr-auto">Daftar Transaksi Pelanggan</h4>
	<a href="{{ route('transaksi.pelanggan.add', request('id'))}}" class="btn btn-primary">Tambah Transaksi</a>
</div>

	<h5 class="mt-3">Data Pelanggan</h5>
	<ul>
		<li>Nama			: {{ $pelanggan->nama }}</li>
		<li>Jenis Kelamin	: {{ $pelanggan->jeniskelamin }}</li>
		<li>Alamat			: {{ $pelanggan->alamat }}</li>
		<li>No Telepon		: {{ $pelanggan->telp }}</li>
	</ul>

	<div class="col-md-9 mt-5">
		<table class="table">
			<tr>
				<th>No</th>
				<th>Kode Invoice</th>
				<th>Tanggal Masuk</th>
				<th>Batas Waktu</th>
				<th>Tanggal Bayar</th>
				<th>Status</th>
				<th>Pembayaran</th>
				<th>Aksi</th>
			</tr>
			@foreach($transaksi as $no=>$data)
			<tr>
				<td>{{ $no+1 }}</td>
				<td>{{ $data->kode_invoice }}</td>
				<td>{{ $data->tanggal }}</td>
				<td>{{ $data->batas_waktu }}</td>
				<td>{{ $data->tanggal_bayar }}</td>
				<th>{{ $data->status }}</th>
				<td>{{ $data->dibayar }}</td>
				<td>
					<a href="{{ route('transaksi.detail', $data->id) }}" class="btn btn-primary">Detail</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>


@endsection