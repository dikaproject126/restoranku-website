<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

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
        $orderItems = OrderItem::where('order_id', $orders->id)->get();

        return view('admin.order.show', compact('orders', 'orderItems'));
    }

    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);

        if(Auth::user()->role->role_name == 'admin' || Auth::user()->role->role_name == 'cashier'){
            $order->status = 'settlement';
            $order->save();
            return redirect()->route('orders.index')->with('success', 'Order settlement successfully');
        } else{
            $order->status = 'cooked';
            $order->save();
            return redirect()->route('orders.index')->with('success', 'Order cooked successfully');
        }
        
    }
}
