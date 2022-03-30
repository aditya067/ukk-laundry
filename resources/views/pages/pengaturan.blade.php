@extends('layout')

@section('content')


<h4>Pengaturan</h4>
<form action="{{ route('outlet.update')}}" method="POST">
	@csrf
	<div class="form-group">
		<input type="text" name="nama" value="{{ $outlet->nama }}" class="form-control">
	</div>
	<div class="form-group">
		<input type="text" name="alamat" value="{{ $outlet->alamat }}" class="form-control">
	</div>
	<div class="form-group">
		<input type="text" name="telp" value="{{ $outlet->telp }}" class="form-control">
	</div>
	<div class="form-group">
		<button class="btn btn-primary w-100">Update</button>
	</div>
</form>

<h5>Hapus Outlet</h5>
<small>Silahkan klik hapus outlet di bawah ini, akun Anda akan dihapus dan logout ketika outlet dihapus</small>
<form action="{{ route('outlet.delete')}}" method="POST" onsubmit="return confirm('Apakah Anda yakin untuk menghapus Outlet ini?')">
	@csrf
	<button class="btn btn-danger w-100">Hapus Outlet</button>
</form>


@endsection