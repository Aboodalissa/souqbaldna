<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض طلبات المستخدم
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    // عرض طلب واحد
    public function show(Order $order)
    {
        $items = $order->items()->with('product')->get();
        return view('orders.show', compact('order', 'items'));
    }

    // إنشاء طلب جديد
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|min:10',
            'phone'   => 'required|min:10',
        ]);

        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'السلة فارغة');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total'   => $total,
            'status'  => 'pending',
            'address' => $request->address,
            'phone'   => $request->phone,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);

            $item->product->decrement('stock', $item->quantity);
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('orders.show', $order)->with('success', 'تم إنشاء الطلب بنجاح');
    }
}