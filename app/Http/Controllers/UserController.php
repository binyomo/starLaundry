<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
            'outlets' => Outlet::latest()->get()
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
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'usertype_id' => 'required',
            'outlet_id' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        User::create($validatedData);

        return redirect('/admin/user')->with('success', 'Tambah User Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            'outlets' => Outlet::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'usertype_id' => 'required',
            'outlet_id' => 'required'
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/admin/user')->with('success', 'Update User Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->outlet->name == auth()->user()->outlet->name) {
            User::destroy($user->id);

            return redirect('/admin/user')->with('success', 'Delete User Berhasil!');    
        } else{
            return redirect('/admin/user')->with('error', 'Tidak Bisa Hapus User');
        }
        
    }
}
