<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('status',1)->get();

        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order){

       if(Auth::user()->orders()->contains($order)){
           return redirect(route('orders.index'));
       }

         return view('auth.orders.show',compact('order'));
    }
}
