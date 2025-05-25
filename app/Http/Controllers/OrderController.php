<?php

namespace App\Http\Controllers;

use App\Model\category;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\product;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items.product')->get();
        return view('order.index', compact('orders'));
    }
    public function show(Order $order)
    {
        $order->load('items.product', 'user');
        return view('order.show', compact('order'));
    }

    public function showItem(Order $order, OrderItem $item)
    {
        // تحقق من أن العنصر ينتمي إلى الطلب
        if (!$order->items->contains($item)) {
            abort(404);
        }

        return view('admin.orders.item', compact('order', 'item'));
    }
}
