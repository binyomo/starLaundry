<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Order;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.outlet.index', [
            'outlets' => Outlet::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.outlet.create');
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
            'name' => 'required|min:3|max:255',
            'alamat' => 'required|min:3'
        ]);

        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        Outlet::create($validatedData);

        return redirect('/admin/outlet')->with('success', 'Tambah Outlet Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        return view('admin.outlet.show', [
            'outlet' => $outlet,
            'orders' => Order::where('outlet_id', $outlet['id'])->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('admin.outlet.edit', [
            'outlet' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $outlet->slug = null;

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'alamat' => 'required|min:3',
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Outlet::where('id', $outlet->id)
            ->update($validatedData);
        $outlet->update(['name' => $request->name]);

        return redirect('/admin/outlet')->with('success', 'Update Outlet Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        Outlet::destroy($outlet->id);

        return redirect('/admin/outlet')->with('success', 'Delete Outlet Berhasil!');
    }
}
