<!DOCTYPE html>
<html>
<head>
	<title>Simplix Laundry</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body>

	<div class="header bg-dark">
		<div class="container">
			<div class="d-flex py-3 text-white">
				<h4 class="mr-auto">Aplikasi Laundry</h4>
				<span>{{ Auth::user()->nama}}</span>
			</div>
		</div>
	</div>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<h4>Navigasi</h4>
						<ul>
							<li><a href="{{ route('dashboard')}}">Dashboard</a></li>
							@if(Auth::user()->role != 'Owner' && Auth::user()->role != 'Kasir')
							<li><a href="{{ route('paket')}}">Paket</a></li>
							<li><a href="{{ route('pengguna')}}">Pengguna</a></li>
							@endif
							@if(Auth::user()->role != 'Owner')
							<li><a href="{{ route('transaksi')}}">Transaksi</a></li>
							@endif
							<li><a href="{{ route('laporan')}}">Laporan</a></li>
							@if(Auth::user()->role != 'Owner' && Auth::user()->role != 'Kasir')
							<li><a href="{{ route('pengaturan')}}">Pengaturan</a></li>
							@endif
						</ul>
						<form action="{{ route('logout') }}" method="POST">
							@csrf
							<button class="btn btn-danger w-100">Logout</button>
						</form>
					</div>
				</div>		
			</div>
			<div class="col-md-9">
				@yield('content')
			</div>
		</div>
	</div>

</body>
</html>