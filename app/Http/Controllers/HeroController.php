<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.web.hero.index', [
            'hero' => Hero::where('id', 1)->get()
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
    public function update(Request $request, Hero $hero)
    {
        $validatedData = $request->validate([
            'm_title' => 'required',
            'm_desc' => 'required',
            'icon_1' => 'required',
            'title_1' => 'required',
            'desc_1' => 'required',
            'icon_2' => 'required',
            'title_2' => 'required',
            'desc_2' => 'required',
            'icon_3' => 'required',
            'title_3' => 'required',
            'desc_3' => 'required',            
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Hero::where('id', $hero->id)
            ->update($validatedData);

        return redirect('/admin/hero')->with('success', 'Update Hero Berhasil!');
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
