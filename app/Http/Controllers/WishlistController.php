<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // عرض المفضلة
    public function index() {
        $items = Wishlist::where('user_id', auth()->id())
                         ->with('product')
                         ->get();
        return view('wishlist.index', compact('items'));
    }

    // إضافة منتج للمفضلة
    public function store(Product $product) {
        Wishlist::firstOrCreate([
            'user_id'    => auth()->id(),
            'product_id' => $product->id,
        ]);
        return back()->with('success', 'تمت الإضافة للمفضلة ❤️');
    }

    // حذف منتج من المفضلة
    public function destroy(Wishlist $wishlist) {
        if ($wishlist->user_id !== auth()->id()) abort(403);
        $wishlist->delete();
        return back()->with('success', 'تم الحذف من المفضلة');
    }
}