<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Member;
use Auth;

class PageController extends Controller
{
    //Menampilkan dashboard
    public function dashboard() 
    {
    	return view('pages.dashboard');
    }



    //Menampilkan menu produk/paket
    public function paket()
    {
        //$id_outlet = Auth::user()->id_outlet;
        //$paket = Paket::where('id_outlet', $id_outlet)->get();
        $paket = Auth::user()->outlet->paket()->get();
    	return view('pages.paket', ['paket'=>$paket]);
    }


    //Menampilkan menu pengguna
    public function pengguna()
    {
        $pengguna = Auth::user()->outlet->user()->get();
    	return view('pages.pengguna', ['pengguna'=>$pengguna]);
    }


    //Menampilkan menu entri transaksi
    public function transaksi()
    {
        $member = Member::get();
    	return view('pages.transaksi', ['member'=>$member]);
    }

    //menampilkan menu laporan
    public function laporan()
    {
        return view('pages.laporan');
    }

    //generate laporan
    public function laporanGenerate(Request $request)
    {
        $tglmulai = $request->tglmulai;
        $tglakhir = $request->tglakhir;

        $transaksi = Auth::user()->outlet
                                ->transaksi()
                                ->where('tanggal', '>=', $tglmulai)
                                ->where('tanggal', '<=', $tglakhir)
                                ->get();

        return view('print.laporan', ['transaksi'=>$transaksi]);
    }

    //menampilkan menu pengaturan
    public function pengaturan()
    {
        $outlet = Auth::user()->outlet;
        return view('pages.pengaturan', ['outlet'=>$outlet]);
    }
}
