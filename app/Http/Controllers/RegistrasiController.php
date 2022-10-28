<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi.index', [
            'tittlePage'    =>  'Registrasi'
        ]);
    }

    public function store(Request $request)
    {

        $validatecreate = $request->validate([
            // 'role_id'   =>  'required',
            'nama'      =>  'required',
            'username'  =>  'required',
            'email'     =>  'required|email',
            'password'  =>  'required',
            'alamat'    =>  'required',
            'telp'      =>  'required'
        ]);


        if ($request->file('image')) {
            $validatecreate['image']    = $request->file('image')->store('user-images');
        }

        $validatecreate['password'] = Hash::make($validatecreate['password']);

        User::create($validatecreate);

        return redirect('/login')->with('success', 'Registrasi Berhasil !!');
    }
}
