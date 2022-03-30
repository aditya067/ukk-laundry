<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body class="container">

	<div class="card mt-5">
		<div class="card-header">
			<h3>Login User</h3>
			<h6>Masukkan username dan password Anda</h1>
		</div>
		<div class="card-body">
			@if(session('error'))
			<p class="text-danger">{{ session('error')}}</p>
			@elseif(session('status'))
			<p class="text-success">{{ session('status')}}</p>
			@endif
			<form action="{{ route('user.login')}}" method="post">
				@csrf
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Masukkan username Anda" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Masukkan password Anda" required>
				</div>
				<div class="form-group">
					<button class="btn btn-dark w-100">Login!</button>
				</div>
			</form>
			<p>Belum memiliki akun? <a href="{{ route('register')}}">Daftar disini</a></p>
		</div>
	</div>

</body>
</html>