@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Manajemen Paket Laundry</h4>
	<a href="{{ route('paket.add')}}" class="btn btn-primary">Tambah</a>
</div>

<table class="table mt-3">
	<tr>
		<th>No</th>
		<th>Jenis</th>
		<th>Nama Paket</th>
		<th>Harga</th>
		<th>Aksi</th>
	</tr>
	@foreach($paket as $no=>$data)

	<tr>
		<td>{{ $no+1 }}</td>
		<td>{{ $data->jenis }}</td>
		<td>{{ $data->nama_paket }}</td>
		<td>{{ $data->harga }}</td>
		<td>
			<a href="{{ route('paket.edit', $data->id)}}" class="btn btn-warning">Edit</a>
			<a href="{{ route('paket.delete', $data->id)}}" class="btn btn-danger">Hapus</a>
		</td>
	</tr>

	@endforeach
</table>

@endsection