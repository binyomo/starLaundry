<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Topbar;
use App\Models\Hero;
use App\Models\About;
use App\Models\Testimoni;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Order;

class IndexController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $orders = Order::where('code', request('search'))->latest()->paginate(10);
        }else{
            $orders = 'none';
        }        

        return view('index', [
        	'topbar' => Topbar::where('id', 1)->get(),
        	'hero' => Hero::where('id', 1)->get(),
        	'about' => About::where('id', 1)->get(),
        	'testimonis' => Testimoni::all(),
        	'contact' => Contact::where('id', 1)->get(),
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3',
            'subject' => 'required|min:3',
            'message' => 'required|min:3'
        ]);

        Message::create($validatedData);

        return redirect('/')->with('success', 'Message Berhasil Dikirim');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function login()
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
