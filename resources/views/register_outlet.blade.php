<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Outlet</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body class="container">

	<div class="card mt-5">
		<div class="card-header">
			<h3>Registrasi Outlet Laundry</h3>
			<h6>Silahkan lengkapi form ini</h1>
		</div>
		<div class="card-body">
			<form action="{{ route('outlet.register')}}" method="post">
				@csrf
				<div class="form-group">
					<input type="text" class="form-control" name="nama_outlet" placeholder="Masukkan nama outlet" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="alamat_outlet" placeholder="Masukkan alamat outlet" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="telp_outlet" placeholder="Masukkan nomor telp outlet" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="nama_user" placeholder="Masukkan nama user" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="username_user" placeholder="Masukkan username" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password_user" placeholder="Masukkan password" required>
				</div>
				<div class="form-group">
					<button class="btn btn-dark w-100">Register!</button>
				</div>
			</form>
			<p>Sudah memiliki akun? <a href="{{ route('login')}}">Login disini</a></p>
		</div>
	</div>

</body>
</html>