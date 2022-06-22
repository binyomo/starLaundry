<?php

namespace App\Http\Controllers;

use App\Models\Topbar;
use Illuminate\Http\Request;

class TopbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.web.topbar.index', [
            'topbar' => Topbar::where('id', 1)->get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topbar $topbar)
    {
        $validatedData = $request->validate([
            'text_1' => 'required',
            'icon_1' => 'required',
            'text_2' => 'required',
            'icon_2' => 'required',
            'text_3' => 'required',
            'icon_3' => 'required'
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Topbar::where('id', $topbar->id)
            ->update($validatedData);

        return redirect('/admin/topbar')->with('success', 'Update Topbar Berhasil!');
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
}
