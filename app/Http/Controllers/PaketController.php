<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Auth;

class PaketController extends Controller
{
    //Menampilkan page tambah

    public function add()
    {
    	return view('pages.paket_add');
    }


    //Input data ke database
    public function store(Request $request)
    {
    	$paket = new Paket();
    	$paket->id_outlet = Auth::user()->id_outlet;
    	$paket->jenis = $request->jenis;
    	$paket->nama_paket = $request->nama_paket;
    	$paket->harga = $request->harga;
    	$paket->save();

    	if ($paket) {
    		return redirect()->route('paket');
    	}
    }

    //Tampilkan halaman edit
    public function edit($id)
    {
    	$paket = Auth::user()->outlet->paket()->where('id', $id)->first();
    	return view('pages.paket_edit', ['paket'=>$paket]);
    }

    //Update data di database
    public function update(Request $request, $id)
    {
    	$paket = Auth::user()->outlet->paket()->where('id', $id)->first();
    	$paket->id_outlet = Auth::user()->id_outlet;
    	$paket->jenis = $request->jenis;
    	$paket->nama_paket = $request->nama_paket;
    	$paket->harga = $request->harga;
    	$paket->update();

    	if ($paket) {
    		return redirect()->route('paket');
    	}
    }

    //delete data
    public function delete($id)
    {
    	$paket = Auth::user()->outlet->paket()->where('id', $id)->first();
    	$paket->delete();
    	return redirect()->back();
    }
}
