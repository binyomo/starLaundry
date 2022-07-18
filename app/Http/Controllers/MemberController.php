<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Order;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index', [
            'members' => Member::where('outlet_id', auth()->user()->outlet->id)
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
        return view('admin.member.create');
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
            'nickname' => 'required',
            'number' => 'required'
        ]);

        $validatedData['outlet_id'] = auth()->user()->outlet->id;

        $validatedData['created_by'] = auth()->user()->username;
        $validatedData['updated_by'] = auth()->user()->username;

        Member::create($validatedData);

        return redirect('/admin/member')
                ->with('success', 'Tambah Member Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.member.show', [
            'member' => $member,
            'orders' => Order::where('member_id', $member['id'])
                            ->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit', [
            'member' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->slug = null;

        $validatedData = $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'number' => 'required'
        ]);

        $validatedData['outlet_id'] = auth()->user()->outlet->id;

        $validatedData['updated_by'] = auth()->user()->username;
        
        Member::where('id', $member->id)
            ->update($validatedData);
        $member->update(['nickname' => $request->nickname]);

        return redirect('/admin/member')
                ->with('success', 'Update Member Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $order = Order::where('member_id', $member->id)->count();
        if ($order == 0) {
            Member::destroy($member->id);

            return redirect('/admin/member')
                    ->with('success', 'Delete Member Berhasil!');    
        }
        return redirect('/admin/member')
                    ->with('error', 'Data Member Dipakai Di Order!');    
    }
}
