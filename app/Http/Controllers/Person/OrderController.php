<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $orders = Auth::user()->orders()->where('status',1)->get();

        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order){


        $products = $order->products()->get();
        dd($products);
        return view('auth.orders.show',compact('order'));
    }
}

