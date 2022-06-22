<?php

namespace App\Http\Controllers;

Use App\Models\Barang;
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
            'barangs' => Barang::latest()->paginate(10)
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
            'name' => 'required|min:3|max:255',
            'harga' => 'required',
            'jumlah' => 'required',
            'type' => 'required'
        ]);

        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        Barang::create($validatedData);

        return redirect('/admin/barang')->with('success', 'Tambah Barang Berhasil!');
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
            'name' => 'required|min:3|max:255',
            'harga' => 'required',
            'jumlah' => 'required',
            'type' => 'required'
        ]);
        
        $validatedData['updated_by'] = auth()->user()->username;
        
        Barang::where('id', $barang->id)
            ->update($validatedData);
        $barang->update(['name' => $request->name]);

        return redirect('/admin/barang')->with('success', 'Update Barang Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);

        return redirect('/admin/barang')->with('success', 'Delete Barang Berhasil!');
    }
}
