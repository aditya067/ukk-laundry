<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Outlet;
use App\Models\User;
use Auth;

class OutletController extends Controller
{
    //Registrasi Outlet
   	public function register() 
   	{
   		return view('register_outlet');
   	}

   	//do regist dan simpan di database
   	public function doRegister(Request $request)
   	{
   		$outlet = new Outlet();
   		$outlet->nama = $request->nama_outlet;
   		$outlet->alamat = $request->alamat_outlet;
   		$outlet->telp = $request->telp_outlet;
   		$outlet->save();

   		if ($outlet) {
   			$user = new User();
   			$user->nama = $request->nama_user;
   			$user->username = $request->username_user;
   			$user->password = bcrypt($request->password_user);
   			$user->id_outlet = $outlet->id;
   			$user->role = 'Admin';
   			$user->save();

   			return redirect()->route('login')->with('status','Registrasi berhasil! Silahkan login ke outlet Anda');
   		} 

   		return redirect()->back();
   	}

      //update data outlet ke db
      public function update(Request $request)
      {
         $outlet = Auth::user()->outlet;
         $outlet->nama = $request->nama;
         $outlet->alamat = $request->alamat;
         $outlet->telp = $request->telp;
         $outlet->update();

         if ($outlet) {
            return redirect()->back();
         }
      }

      //hapus data outlet
      public function delete()
      {
         $outlet = Auth::user()->outlet;
         if ($outlet) {
            $outlet->delete();
            Auth::logout();
            return redirect()->route('login');
         }
      }
}
