<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all()->sortByDesc('created_at');

        return view('admin.order.index', compact('orders'));
    }

    public function show(string $id)
    {
        $orders = Order::findOrFail($id);

        return view('admin.order.show', compact('orders'));
    }
}
