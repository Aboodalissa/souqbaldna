<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // عرض السلة
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // إضافة منتج للسلة
    public function add(Request $request, Product $product)
{
    $cartItem = Cart::where('user_id', auth()->id())
        ->where('product_id', $product->id)
        ->first();

    if ($cartItem) {
        // تحقق إن الكمية ما تتجاوز الـ stock
        if ($cartItem->quantity >= $product->stock) {
            return redirect()->back()->with('error', 'لا يوجد مخزون كافٍ');
        }
        $cartItem->increment('quantity');
    } else {
        // تحقق إن المنتج متوفر
        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'المنتج غير متوفر');
        }
        Cart::create([
            'user_id'    => auth()->id(),
            'product_id' => $product->id,
            'quantity'   => 1,
        ]);
    }

    return redirect()->back()->with('success', 'تمت الإضافة للسلة');
}

    // حذف من السلة
    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'تم الحذف من السلة');
    }
}