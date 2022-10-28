<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role_id == '2') {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }

        return view('dashboard.produks.index', [
            'produks'   =>  Produk::latest()->Filter(Request(['searchProduk']))->paginate(5)->withQueryString(),
            'tittlePage'    =>  "Produk " . strtoupper(auth()->user()->nama)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produks.create', [
            'tittlePage'    =>  "Tambah Produk " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateCreate = $request->validate([
            'image'             =>  'image',
            'kode'              =>  'required',
            'nama'              =>  'required',
            'harga'             =>  'required',
            'keterangan'        =>  'required'
        ]);

        if ($request->file('image')) {
            $validateCreate['image']  =   $request->file('image')->store('image-produks');
        }

        Produk::create($validateCreate);

        return redirect('/dashboard/produks')->with('success', 'Tambah Produk Sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('dashboard.produks.show', [
            'produk'   =>   $produk,
            'tittlePage'    =>  "Detail Produk " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produks.edit', [
            'produk'        =>  $produk,
            'tittlePage'    =>  "Edit Produk " . strtoupper(auth()->user()->nama)

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validateUpdate = $request->validate([
            'image'             =>  'image',
            'kode'              =>  'required',
            'nama'              =>  'required',
            'harga'             =>  'required',
            'keterangan'        =>  'required'
        ]);

        if ($request->file('image')) {
            if ($request->imageprodukOld) {
                Storage::delete($request->imageprodukOld);
            }

            $validateUpdate['image']    =   $request->file('image')->store('image-produks');
        }

        Produk::where('id', $produk->id)
            ->update($validateUpdate);

        return redirect('/dashboard/produks')->with('success', 'Update Product Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::delete($produk->image);
        }
        Produk::destroy($produk->id);

        return redirect('/dashboard/produks')->with('success', 'Delete Produk Sukses');
    }
}
