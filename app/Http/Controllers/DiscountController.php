<?php

namespace App\Http\Controllers;

Use App\Models\Discount;
Use App\Models\Order;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.discount.index', [
            'discounts' => Discount::where('outlet', auth()->user()->outlet)->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'discount' => 'required',
            'type' => 'required'
        ]);

        $validatedData['outlet'] = auth()->user()->outlet;

        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        Discount::create($validatedData);

        return redirect('/admin/discount')->with('success', 'Tambah Discount Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return view('admin.discount.show', [
            'discount' => $discount,
            'orders' => Order::where('discount_id', $discount['id'])->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('admin.discount.edit', [
            'discount' => $discount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $discount->slug = null;

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'discount' => 'required',
            'type' => 'required'
        ]);

        $validatedData['outlet'] = auth()->user()->outlet;

        $validatedData['updated_by'] = auth()->user()->username;
        
        Discount::where('id', $discount->id)
            ->update($validatedData);
        $discount->update(['name' => $request->name]);

        return redirect('/admin/discount')->with('success', 'Update Discount Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        Discount::destroy($discount->id);

        return redirect('/admin/discount')->with('success', 'Delete Discount Berhasil!');
    }
}
