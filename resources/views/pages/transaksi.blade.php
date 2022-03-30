@extends('layout')

@section('content')


<h4>Selamat datang di menu transaksi Simplix Laundry</h4>
<p>Untuk membuat transaksi baru, silahkan pilih atau registrasi pelanggan terlebih dahulu.</p>

<div class="d-flex">
	<h5 class="mr-auto">Daftar Pelanggan</h5>
	<a href="{{ route('pelanggan.add')}}" class="btn btn-primary">Registrasi Pelanggan</a>
</div>

<table class="table mt-5">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>No Telp</th>
		<th>Total Transaksi</th>
		<th>Aksi</th>
	</tr>
	@foreach($member as $no=>$data)
	<tr>
		<td>{{ $no + 1 }}</td>
		<td>{{ $data->nama }}</td>
		<td>{{ $data->jeniskelamin }}</td>
		<td>{{ $data->alamat }}</td>
		<td>{{ $data->telp }}</td>
		<td>2</td>
		<td>
			<a href="{{ route('transaksi.pelanggan', $data->id)}}" class="btn btn-success">Transaksi</a>
		</td>
	</tr>
	@endforeach
</table>


@endsection