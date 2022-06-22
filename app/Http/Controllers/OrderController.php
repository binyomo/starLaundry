<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Barang;
use App\Models\Discount;
use App\Models\Outlet;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $orders = Order::where('code', request('search'))->latest()->paginate(10);
        }else{
            $orders = 'none';
        }        

        return view('admin.order.index', [
            'list' => Order::where('status', 1)->count(),
            'progress' => Order::where('status', 2)->count(),
            'ready' => Order::where('status', 3)->count(),
            'done' => Order::where('status', 4)->count(),
            'cancel' => Order::where('status', 5)->count(),
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create', [
            'members' => Member::all(),
            'barangs' => Barang::all(),
            'discounts' => Discount::all(),
            'outlets' => Outlet::all()
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
        $order = new Order;

        $order->customer = $request->customer;
        $order->ambil = $request->ambil;
        $order->member_id = $request->member_id;
        $order->discount_id = $request->discount_id;
        $order->outlet_id = $request->outlet_id;
        $order->note = $request->note;
        $order->code = Str::random(8);
        $order->status = 1;
        $order->created_by = auth()->user()->username;
        $order->updated_by = auth()->user()->username;

        $order->save();
        
        $barang = $request->barang;
        $order->barang()->attach($barang);

        return redirect('/admin/order')->with('success', 'Tambah Order Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show', [
            'order' => $order,
            'barangs' => $order->barang(),
            'harga' => $order->barang()->sum('harga'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $pdf = PDF::loadview('admin.order.pdf',['order'=>$order,'harga' => $order->barang()->sum('harga')])->setPaper('A8', 'portrait');
        return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validatedData['status'] = $request->status;
        $validatedData['updated_by'] = auth()->user()->username;
        
        Order::where('id', $order->id)
            ->update($validatedData);

        if ($request->status == 2) {
            return redirect('/admin/order/list')->with('success', 'Update Status Order Berhasil!');
        }elseif ($request->status == 3){
            return redirect('/admin/order/progress')->with('success', 'Update Status Order Berhasil!');
        }elseif ($request->status == 4){
            return redirect('/admin/order/ready')->with('success', 'Update Status Order Berhasil!');
        }else{
            return redirect('/admin/order')->with('success', 'Cancel Order Berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        return view('admin.order.list', [
            'orders' => Order::where('status', 1)->latest()->paginate(10)
        ]);
    }

    public function progress()
    {
        return view('admin.order.progress', [
            'orders' => Order::where('status', 2)->latest()->paginate(10)
        ]);
    }

    public function ready()
    {
        return view('admin.order.ready', [
            'orders' => Order::where('status', 3)->latest()->paginate(10)
        ]);
    }

    public function done()
    {
        return view('admin.order.done', [
            'orders' => Order::where('status', 4)->latest()->paginate(10)
        ]);
    }

    public function cancel()
    {
        return view('admin.order.cancel', [
            'orders' => Order::where('status', 5)->latest()->paginate(10)
        ]);
    }
}
