<?php

namespace App\Http\Controllers;

Use App\Models\Barang;
Use App\Models\BarangOrder;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang.index', [
            'barangs' => Barang::where('outlet_id', auth()->user()->outlet->id)
                                ->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.create');
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
            'name' => 'required',
            'harga' => 'required',
            'type' => 'required'
        ]);

        $validatedData['outlet_id'] = auth()->user()->outlet->id;

        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        Barang::create($validatedData);

        return redirect('/admin/barang')
                ->with('success', 'Tambah Barang Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('admin.barang.show', [
            'barang' => $barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('admin.barang.edit', [
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->slug = null;

        $validatedData = $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'type' => 'required'
        ]);

        $validatedData['outlet_id'] = auth()->user()->outlet->id;
        $validatedData['updated_by'] = auth()->user()->username;
        
        Barang::where('id', $barang->id)
                ->update($validatedData);
        $barang->update(['name' => $request->name]);

        return redirect('/admin/barang')
                ->with('success', 'Update Barang Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $order = BarangOrder::where('barang_id', $barang->id)
                            ->count();

        if ($order == 0) {
            Barang::destroy($barang->id);

            return redirect('/admin/barang')
                    ->with('success', 'Delete Barang Berhasil!');    
        } else{
            return redirect('/admin/barang')
                    ->with('error', 'Data Barang Dipakai Di Order');    
        }
        
    }
}