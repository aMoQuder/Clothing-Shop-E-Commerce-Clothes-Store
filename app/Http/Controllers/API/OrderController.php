<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Product;
use App\Http\Resources\OrderResource;
use Darryldecode\Cart\Facades\CartFacade;

class OrderController extends Controller
{
    // GET /api/orders
    public function index(): JsonResponse
    {
        $orders = Order::with(['items.product', 'user'])->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Orders fetched successfully.',
            'data'    => OrderResource::collection($orders),
        ]);
    }

    // GET /api/orders/{id}
    public function show($id): JsonResponse
    {
        $order = Order::with(['items.product', 'user'])->find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order retrieved.',
            'data'    => new OrderResource($order),
        ]);
    }

    // POST /api/orders
    public function store(Request $request): JsonResponse
    {
        $cart = CartFacade::getContent();

        if ($cart->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty.',
            ], 400);
        }

        $total = $cart->sum(function($item) {
        return $item->price * $item->quantity;
        });
        $order = Order::create([
            'user_id'     => Auth::id(),
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->id,
                'size'       => $item->attributes->size ?? null,
                'color'      => $item->attributes->color ?? null,
                'quantity'   => $item->quantity,
                'price'      => $item->price,
            ]);
        }

        CartFacade::clear();

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully.',
            'data'    => new OrderResource($order),
        ], 201);
    }

    // DELETE /api/orders/{id}
    public function destroy($id): JsonResponse
    {
        $order = Order::with('items')->find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found.',
            ], 404);
        }

        $order->items()->delete();
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully.',
        ]);
    }
}
