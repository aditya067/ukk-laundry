@extends('layout')

@section('content')

<div class="d-flex">
	<h4 class="mr-auto">Manajemen Pengguna</h4>
	<a href="{{ route('pengguna.add')}}" class="btn btn-primary">Tambah</a>
</div>

<table class="table mt-3">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Role</th>
		<th>Aksi</th>
	</tr>
	@foreach($pengguna as $no=>$data)

	<tr>
		<td>{{ $no+1 }}</td>
		<td>{{ $data->nama }}</td>
		<td>{{ $data->username }}</td>
		<td>{{ $data->role }}</td>
		<td>
			<a href="{{ route('pengguna.edit', $data->id)}}" class="btn btn-warning">Edit</a>
			<a href="{{ route('pengguna.delete', $data->id)}}" class="btn btn-danger">Hapus</a>
		</td>
	</tr>

	@endforeach
</table>

@endsection