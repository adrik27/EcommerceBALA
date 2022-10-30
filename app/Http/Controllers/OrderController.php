<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\Status;
use App\Models\Keranjang;
use App\Models\Order_Detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $produk     =   Produk::where('id', $request->id)->first();
        $jumlah     =   $request->jumlah;
        $user_id    =   auth()->user()->id;
        $status     =   '1';
        $tanggal    =   date('y-m-d');
        $total      =   $produk->harga * $jumlah;

        $data = [
            'user_id'   =>   $user_id,
            'status_id' =>  $status,
            'tanggal'   =>  $tanggal,
            'total'     =>  $total
        ];

        $order = Order::create($data);

        $data_detail = [
            'order_id'  =>  $order->id,
            'produk_id' =>  $produk->id,
            'jumlah'    =>  $jumlah
        ];
        Order_Detail::create($data_detail);

        // return redirect('/')->with('success', 'Order Pesanan Berhasil !!')->with('link', $order->id);
        return redirect('/')->with('success', 'Order Pesanan Berhasil !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function detail(Order $Order)
    {
        // dd($Order);
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }

        $keranjang = Keranjang::where('user_id', $user)->with('produk')->get();
        return view('detailpesanan', [
            'tittlePage'    =>  'Detail Pesanan',
            'keranjangs'    => $keranjang,
            'order'        =>  $Order //::with(['Order_Detail'])->where('user_id', auth()->user()->id)->first()
        ]);
    }

    public function order_keranjang(Request $req)
    {
        // return $req->all();
        $user_id = auth()->user()->id;
        $status_id = 1;
        $tanggal = date('Y-m-d');
        $total = $req->total_iki;

        $data = [
            'user_id' => $user_id,
            'status_id' => $status_id,
            'tanggal' => $tanggal,
            'total' => $total
        ];

        $order = Order::create($data);
        $order_id = $order->id;

        $dataorderdetail = [];

        foreach ($req->id_produk as $key => $value) {
            $dataorderdetail[] = [
                'order_id' => $order_id,
                'produk_id' => $req->id_produk[$key],
                'jumlah' => $req->jumlah[$key]
            ];
        }

        Order_Detail::insert($dataorderdetail);
        Keranjang::where('user_id', $user_id)->delete();
        return redirect('/')->with('success', 'Order Pesanan Berhasil !!');
    }

    public function detailsemua(Request $req)
    {
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }


        $keranjang = Keranjang::where('user_id', $user)->with('produk')->get();
        return view('detailpesanansemua', [
            'tittlePage'    =>  'Detail Pesanan semua',
            'keranjangs'    =>  $keranjang,
            'orders'        =>  Order::with(['Order_Detail'])->where('user_id', auth()->user()->id)->first()
        ]);
    }

    public function pesanansaya()
    {
        if ($user = auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = auth()->user();
        }


        $keranjang = Keranjang::where('user_id', $user)->with('produk')->get();

        return view('pesanansaya', [
            'tittlePage'    =>  'Pesanan Saya',
            'keranjangs'    =>  $keranjang,
            'pesanansaya'   =>  Order::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function alllistorder()
    {
        return view('dashboard.Listorder.index', [
            'tittlePage'    =>  'List Order',
            'orders'        =>  Order::all()
        ]);
    }

    public function edit_listOrder($order)
    {
        return view('dashboard.Listorder.edit', [
            'tittlePage'    =>  'List Order',
            'statuses'      =>  Status::all(),
            'orders'        =>  Order::where('id', $order)->first()
        ]);
    }

    public function update_listOrder(Request $request)
    {

        $data = $request->validate([
            'status_id' => 'required'
        ]);

        Order::where('id', $request->id)
            ->update($data);
        return redirect('/dashboard/listorder')->with('success', 'Update List Order Berhasil !!');
    }
}
