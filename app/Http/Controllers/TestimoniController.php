<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.web.testimoni.index', [
            'testimonis' => Testimoni::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.web.testimoni.create');
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
            'position' => 'required',
            'statement' => 'required'
        ]);

        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        Testimoni::create($validatedData);

        return redirect('/admin/testimoni')
                ->with('success', 'Tambah Testimoni Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        return view('admin.web.testimoni.show', [
            'testimoni' => $testimoni,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        return view('admin.web.testimoni.edit', [
            'testimoni' => $testimoni
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $testimoni->slug = null;

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'statement' => 'required'
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Testimoni::where('id', $testimoni->id)
                ->update($validatedData);
        $testimoni->update(['name' => $request->name]);

        return redirect('/admin/testimoni')
                ->with('success', 'Update Testimoni Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        Testimoni::destroy($testimoni->id);

        return redirect('/admin/testimoni')
                ->with('success', 'Delete Testimoni Berhasil!');
    }
}
