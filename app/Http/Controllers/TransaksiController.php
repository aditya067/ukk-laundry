<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\DetailTransaksi;
use Auth;

class TransaksiController extends Controller
{
    //menampilkan transaksi pelanggan
    public function pelanggan($id)
    {
    	$transaksi = Auth::user()->outlet->transaksi()->where('id_member', $id)->get();
    	$pelanggan = Member::where('id', $id)->first();
    	return view('pages.pelanggan_transaksi', ['transaksi'=>$transaksi, 'pelanggan'=>$pelanggan]);
    }

    //menampilkan halaman utk add transaksi
    public function pelangganAdd($id)
    {
    	$pelanggan = Member::where('id', $id)->first();
    	return view('pages.pelanggan_transaksi_add', ['pelanggan'=>$pelanggan]);
    }

    //input data transaksi ke db
    public function pelangganStore(Request $request, $id)
    {
    	$pelanggan = Member::where('id', $id)->first();
    	$transaksi = new Transaksi();
    	$transaksi->id_outlet = Auth::user()->outlet->id;
    	$transaksi->kode_invoice = $request->kodeinvoice;
    	$transaksi->id_member = $pelanggan->id;
    	$transaksi->tanggal = $request->tanggal;
    	$transaksi->batas_waktu = $request->bataswaktu;
    	$transaksi->tanggal_bayar = $request->tanggalbayar;
    	$transaksi->biaya_tambahan = $request->biayatambahan;
    	$transaksi->diskon = $request->diskon;
    	$transaksi->pajak = $request->pajak;
    	$transaksi->status = 'baru';
    	$transaksi->dibayar = $request->dibayar;
    	$transaksi->id_user = Auth::user()->id;
    	$transaksi->save();

    	if ($transaksi) {
    		return redirect()->route('transaksi.detail', $transaksi->id);
    	}
    }

    //detail transaksi
    public function detail($id)
    {
    	$id_outlet = Auth::user()->id_outlet;
    	$transaksi = Transaksi::where('id', $id)->where('id_outlet', $id_outlet)->first();
    	$paket = Paket::get();
    	if ($transaksi) {
    		return view('pages.transaksi_detail', ['transaksi'=>$transaksi, 'paket'=>$paket]);
    	}
    }

    //tambah detail transaksi di db
    public function transaksiDetailStore(Request $request, $id)
    {
    	$detailTransaksi = new DetailTransaksi();
    	$detailTransaksi->id_transaksi = $id;
    	$detailTransaksi->id_paket = $request->id_paket;
    	$detailTransaksi->qty = $request->qty;
    	$detailTransaksi->keterangan = $request->keterangan;
    	$detailTransaksi->save();

    	return redirect()->back();
    }
}
