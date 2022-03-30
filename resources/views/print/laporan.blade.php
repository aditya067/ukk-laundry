<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body onload="print()">

	<h4>Generate Laporan Transaksi</h4>
	<p>Tanggal {{ date('d-m-Y H:i', strtotime(request('tglmulai'))) }} sampai {{ date('d-m-Y H:i', strtotime(request('tglakhir')))}}</p>

	<div class="col-md-9 mt-5">
		<table class="table">
			<tr>
				<th>No</th>
				<th>Kode Invoice</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal Masuk</th>
				<th>Batas Waktu</th>
				<th>Tanggal Bayar</th>
				<th>Status</th>
				<th>Pembayaran</th>
			</tr>
			@foreach($transaksi as $no=>$data)
			<tr>
				<td>{{ $no+1 }}</td>
				<td>{{ $data->kode_invoice }}</td>
				<td>{{ $data->member->nama }}</td>
				<td>{{ $data->tanggal }}</td>
				<td>{{ $data->batas_waktu }}</td>
				<td>{{ $data->tanggal_bayar }}</td>
				<th>{{ $data->status }}</th>
				<td>{{ $data->dibayar }}</td>
			</tr>
			@endforeach
		</table>
	</div>

</body>
</html>