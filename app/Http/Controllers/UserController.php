<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    // Login User UI

    public function login()
    {
    	return view('loginuser');
    }

    //doLogin

    public function doLogin(Request $request)
    {
    	$data = $request->only('username','password');
    	if(Auth::attempt($data)) {
    		$request->session()->regenerate();
    		return redirect()->route('dashboard');
    	}

    	return redirect()->back()->with('error', 'Username atau password Anda salah');
    }

    //tampilan add user
    public function add()
    {
        return view('pages.pengguna_add');
    }

    //input data ke db
    public function store(Request $request)
    {
        $id_outlet = Auth::user()->outlet->id;

        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->id_outlet = $id_outlet;
        $user->save();


        if ($user) {
            return redirect()->route('pengguna');
        }
        return redirect()->back();
    }

    //manampilkan halaman edit
    public function edit($id)
    {
        $user = Auth::user()->outlet->user()->where('id', $id)->first();
        return view('pages.pengguna_edit', ['pengguna'=>$user]);
    }

    //update ke db
    public function update(Request $request, $id)
    {
        $id_outlet = Auth::user()->outlet->id;
        $user = Auth::user()->outlet->user()->where('id', $id)->first();
        if ($user) {
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->role = $request->role;
            $user->id_outlet = $id_outlet;        

            if ($request->password){
                $user->password = bcrypt($request->password);
            }
            
            $user->update();
            return redirect()->route('pengguna');
        }
    }

    //hapus data
    public function delete($id)
    {
        $user = Auth::user()->outlet->user()->where('id', $id)->first();
        if ($user) {
            $user->delete();
            return redirect()->back();
        }
    }

    //logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
