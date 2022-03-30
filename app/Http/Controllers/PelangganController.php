<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class PelangganController extends Controller
{
    //menampilkan menu tambah pelanggan
    public function add()
    {
    	return view('pages.pelanggan_add');
    }

    //input data ke db
    public function store(Request $request)
    {
    	$member = new Member();
    	$member->nama = $request->nama;
    	$member->alamat = $request->alamat;
    	$member->jeniskelamin = $request->jeniskelamin;
    	$member->telp = $request->telp;
    	$member->save();

    	return redirect()->route('transaksi');
    }
}
