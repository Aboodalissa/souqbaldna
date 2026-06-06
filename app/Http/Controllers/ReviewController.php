<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // إضافة تقييم
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|min:3',
        ]);

        // تحقق إذا المستخدم قيّم المنتج من قبل
        $existing = Review::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'قيّمت هذا المنتج من قبل');
        }

        Review::create([
            'user_id'    => auth()->id(),
            'product_id' => $product->id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return redirect()->back()->with('success', 'تم إضافة تقييمك بنجاح');
    }

    // حذف تقييم
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'تم حذف التقييم');
    }
}