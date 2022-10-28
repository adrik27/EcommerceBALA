<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class BeliProdukController extends Controller
{
    public function index(Produk $Produk)
    {
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }


        $keranjang = Keranjang::where('user_id', $user)->with('produk')->get();

        return view('beli.index', [
            'tittlePage'    =>  'Detail Beli',
            'keranjangs' => $keranjang,
            'Produk'    =>  $Produk
        ]);
    }

    public function checkoutDariKeranjang(Request $req)
    {
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }

        $keranjang = Keranjang::where('user_id', $user)->with('produk')->get();
        $produks = [];
        foreach ($req->produk as $value) {
            $isi =  Produk::where('id', $value)->first();
            $produks[] = $isi;
        }

        return view('beli.index2', [
            'tittlePage'    =>  'Detail Beli',
            'keranjangs' => $keranjang,
            'Produks' => $produks
        ]);
    }
}
