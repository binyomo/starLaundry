<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function authenticate(Request $request)
    {
    	$credentials = $request->validate([
    		'username' => 'required|min:3',
    		'password' => 'required'
    	]);

        $remember = $request->get('remember');

    	if(Auth::attempt($credentials, $remember)){
    		$request->session()->regenerate();
    		return redirect()->intended('/admin')->with('success', 'Login Berhasil!, Hai!!!');
    	}

    	return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request) 
    {
    	Auth::logout();

    	$request->session()->invalidate();

		$request->session()->regenerateToken();    	

		return redirect('/admin/login');
    }
}
