<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderItem;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = CartFacade::getContent();
        return view('card', compact('cartItems'));
    }

    public function checkout()
    {
        $cartItems = CartFacade::getContent();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice,
            'status' => 'completed',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'size' => $item->attributes->size,
                'color' => $item->attributes->color,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        CartFacade::clear();

        return redirect()->route('cart.list')->with("massege","you check out success");
    }

  
    public function addToCart(Request $request)
    {   $user_id=Auth::user()->id;
        CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'size' => $request->size,
                'color' => $request->color,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('shop');
    }

    public function updateCart(Request $request)
    {
        CartFacade::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        CartFacade::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->back();
    }

    public function clearAllCart()
    {
        CartFacade::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->back();
    }
}
