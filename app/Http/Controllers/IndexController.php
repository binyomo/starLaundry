<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Topbar;
use App\Models\Hero;
use App\Models\About;
use App\Models\Testimoni;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Order;
use App\Models\Barang;

class IndexController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $orders = Order::where('code', request('search'))
                            ->latest()->paginate(10);
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

        return redirect('/')
                ->with('success', 'Message Berhasil Dikirim');
    }

    public function admin()
    {
        $weekDay = Carbon::now();
        $week = []; 
        for ($i=0; $i <7 ; $i++) {
            $week[] = $weekDay->startOfWeek()->addDay($i)->format('Y-m-d');
        }

        /**
        -----------------------
            GRAFIK PENDAPATAN
        -----------------------
        */
        $pendapatan = Order::where('outlet_id', auth()->user()->outlet->id)
                            ->get();

        $dayPendapatan = Order::whereDate('created_at', date('Y-m-d'))
                            ->where('outlet_id', auth()->user()->outlet->id)
                            ->get();
        $weekPendapatan = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::MONDAY), Carbon::now()->endOfWeek(Carbon::SUNDAY)])
                        ->where('outlet_id', auth()->user()->outlet->id)
                        ->get();
        $monthPendapatan = Order::whereMonth('created_at', date('m'))
                        ->where('outlet_id', auth()->user()->outlet->id)
                        ->get();

        for ($i=0; $i < 7; $i++) { 
            $pendapatanWeek[$i] = Order::whereDate('created_at', $week[$i])
                                ->where('outlet_id', auth()->user()->outlet->id)
                                ->get()->sum('grandTotal');
        }

        /**
        -----------------------
            GRAFIK ORDER
        -----------------------
        */
        $order = Order::where('outlet_id', auth()->user()->outlet->id)
                    ->get();
        $dayOrder = Order::whereDate('created_at', date('Y-m-d'))
                    ->where('outlet_id', auth()->user()->outlet->id)
                    ->get();
        $weekOrder = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::MONDAY), Carbon::now()->endOfWeek(Carbon::SUNDAY)])
                    ->where('outlet_id', auth()->user()->outlet->id)
                    ->get();
        $monthOrder = Order::whereMonth('created_at', date('m'))
                    ->where('outlet_id', auth()->user()->outlet->id)
                    ->get();

        for ($i=0; $i < 7; $i++) { 
            $orderWeek[$i] = Order::whereDate('created_at', $week[$i])
                                ->where('outlet_id', auth()->user()->outlet->id)
                                ->get()->count('order');
        }

        return view('admin.index', [
            'pendapatan' => $pendapatan,
            'dayPendapatan' => $dayPendapatan,
            'weekPendapatan' => $weekPendapatan,
            'monthPendapatan' => $monthPendapatan,
            'pendapatanWeeks' => $pendapatanWeek,

            // Grafik Order
            'order' => $order,
            'dayOrder' => $dayOrder,
            'weekOrder' => $weekOrder,
            'monthOrder' => $monthOrder,
            'orderWeeks' => $orderWeek,
        ]);
    }



    // 
    // 
    // LOGIN
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
            return redirect()->intended('/admin')
                    ->with('success', 'Login Berhasil!, Hai!!!');
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
