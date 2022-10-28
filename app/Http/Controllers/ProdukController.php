<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Order_Detail;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    public function index()
    {
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }


        $keranjang = Keranjang::where('user_id', $user)->with('produk')->get();
        return view('home', [
            'tittlePage'    =>  'Home Produk',
            'produks'   =>  Produk::all(),
            'keranjangs' => $keranjang,
        ]);
    }

    public function detail(Produk $Produk)
    {
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }
        $keranjang = Keranjang::where('user_id', $user)->get();
        return view('detail', [
            'tittlePage'    =>  'Detail Produk',
            'produk'        =>  $Produk,
            'keranjangs'    => $keranjang,
        ]);
    }

    public function store($id)
    {
        $user = auth()->user();
        $produk = Produk::find($id);
        $keranjang = new Keranjang;
        $keranjang->user_id = $user->id;

        if (!auth()->user() == auth()->user()->id) {
            $keranjang->produk_id = $produk->id;
            $keranjang->save();
        } else {
            $keranjang = new Keranjang;
            $keranjang->user_id = $user->id;
            $keranjang->produk_id = $produk->id;
            $keranjang->save();
        }

        return redirect()->back()->with('success', 'Produk Berhasil ditambahkan ke Keranjang !!');
    }
}
