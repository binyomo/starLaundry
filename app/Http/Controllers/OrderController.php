<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Barang;
use App\Models\Discount;
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
            $orders = Order::where('code', request('search'))
                            ->latest()->paginate(10);
        }else{
            $orders = 'none';
        }        

        return view('admin.order.index', [
            'list' => Order::where('status', 1)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->count(),
            'progress' => Order::where('status', 2)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->count(),
            'ready' => Order::where('status', 3)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->count(),
            'done' => Order::where('status', 4)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->count(),
            'cancel' => Order::where('status', 5)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->count(),
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
            'members' => Member::where('outlet_id', auth()->user()->outlet->id)
                                ->get(),
            'barangs' => Barang::where('outlet_id', auth()->user()->outlet->id)
                                ->get(),
            'discounts' => Discount::where('outlet_id', auth()->user()->outlet->id)
                                ->get(),
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
        /*
        ----------------------------------
            Buat Order Di Table Order
        ----------------------------------
        */
        $order = new Order;

        $order->customer = $request->customer;
        $order->ambil = $request->ambil;
        $order->payment = $request->payment;
        $order->member_id = $request->member_id;
        $order->discount_id = $request->discount_id;
        $order->outlet_id = auth()->user()->outlet->id;
        $order->note = $request->note;
        $order->code = Str::random(8);
        $order->status = 1;
        $order->total = 0;
        $order->grandTotal = 0;
        
        $order->created_by = auth()->user()->username;
        $order->updated_by = auth()->user()->username;

        if($request->payment == 1) {
            $order->payment_by = auth()->user()->username;
        };

        $order->save();

        /*
        ------------------------------------------
            Buat Order Barang Di Table Pivot
        ------------------------------------------
        */ 
        $barang = $request->barang;
        $jumlah = $request->jumlah;

        $sync_data = [];
        for($i = 0; $i < count($barang); $i++){
            $sync_data[$barang[$i]] = ['jumlah' => $jumlah[$i]];
        };

        $order->barang()->sync($sync_data);

        $barang = $order->barang;
        for($i = 0; $i < count($barang); $i++){
            $harga[$i] = $barang[$i]->harga;  
            $jumlah[$i] = $barang[$i]->pivot->jumlah;  
        };

        for($i = 0; $i < count($harga); $i++){
            $harga[$i] = $harga[$i]*$jumlah[$i];    
        };

        $total = 0;
        for($i = 0; $i < count($harga); $i++){
            $total += $harga[$i];
        }; 

        /*
        -------------------------------------------
            Update Harga Total Di Tabel Order
        -------------------------------------------
        */ 
        $order->total = $total;

        if ($request->discount_id > 0) {
            $discount = Discount::where('id', $request->discount_id)
                                ->first();

            if ($discount->type == 0) {
                $grandTotal = $total - $discount->discount;
            }else{
                $grandTotal = $total - $total * $discount->discount / 100;
            };
            
            $order->grandTotal = $grandTotal;
        } else{
            $order->grandTotal = $total;
        };
        
        $order->update();

        return redirect('/admin/order')
                ->with('success', 'Tambah Order Berhasil!');
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
            'order' => $order
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
        $pdf = PDF::loadview('admin.order.pdf',[
            'order' => $order
        ])->setPaper('A8', 'portrait');

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
        if ($request->status > 0) {
            $validatedData['status'] = $request->status;
            $validatedData['updated_by'] = auth()->user()->username;    
        }        

        if ($request->status == 4) {
            if ($order->payment == 0) {
                return redirect('/admin/order/ready')
                        ->with('error', 'Selesaikan Pembayaran Dahulu!!!');    
            }
        }
        
        if ($request->payment == 1) {
            $validatedData['payment'] = $request->payment;
            $validatedData['payment_by'] = auth()->user()->username;            
        }
        
        Order::where('id', $order->id)
            ->update($validatedData);

        if ($request->payment == 1) {
            return redirect('/admin/order')
                    ->with('success', 'Update Pembayaran Berhasil!');
        }

        if ($request->status == 2) {
            return redirect('/admin/order/list')
                    ->with('success', 'Update Status Order Berhasil!');
        }elseif ($request->status == 3){
            return redirect('/admin/order/progress')
                    ->with('success', 'Update Status Order Berhasil!');
        }elseif ($request->status == 4){
            return redirect('/admin/order/ready')
                    ->with('success', 'Update Status Order Berhasil!');
        }else{
            return redirect('/admin/order')
                    ->with('success', 'Cancel Order Berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);

        $order->barang()->detach($order->id);

        return redirect('/admin/order')
                ->with('success', 'Delete Order Berhasil!');    
    }

    public function list()
    {
        return view('admin.order.list', [
            'orders' => Order::where('status', 1)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->latest()->paginate(10)
        ]);
    }

    public function progress()
    {
        return view('admin.order.progress', [
            'orders' => Order::where('status', 2)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->latest()->paginate(10)
        ]);
    }

    public function ready()
    {
        return view('admin.order.ready', [
            'orders' => Order::where('status', 3)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->latest()->paginate(10)
        ]);
    }

    public function done()
    {
        return view('admin.order.done', [
            'orders' => Order::where('status', 4)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->latest()->paginate(10)
        ]);
    }

    public function cancel()
    {
        return view('admin.order.cancel', [
            'orders' => Order::where('status', 5)
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->latest()->paginate(10)
        ]);
    }
}
