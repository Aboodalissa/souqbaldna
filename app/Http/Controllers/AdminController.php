<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // لوحة تحكم الأدمن
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalUsers    = User::count();
        $totalOrders   = Order::count();
        $pendingProducts = Product::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalUsers',
            'totalOrders',
            'pendingProducts'
        ));
    }

    // إدارة المنتجات
    public function products()
    {
        $products = Product::with(['user', 'category'])->latest()->get();
        return view('admin.products', compact('products'));
    }

    // موافقة على منتج
    public function approveProduct(Product $product)
    {
        $product->update(['status' => 'active']);
        return redirect()->back()->with('success', 'تم قبول المنتج');
    }
    // رفض منتج
public function rejectProduct(Product $product)
{
   $product->update(['status' => 'inactive']);
    return redirect()->back()->with('success', 'تم رفض المنتج');
}

    // إدارة المستخدمين
    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    // تغيير دور مستخدم
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:buyer,seller,admin',
        ]);

        $user->update(['role' => $request->role]);
        return redirect()->back()->with('success', 'تم تغيير الدور بنجاح');
    }
    // عرض طلبات الانضمام
public function sellerRequests()
{
    $requests = \App\Models\SellerRequest::with('user')
        ->latest()
        ->get();

    return view('admin.seller-requests', compact('requests'));
}

// قبول طلب
public function approveSellerRequest(\App\Models\SellerRequest $sellerRequest)
{
    $sellerRequest->update(['status' => 'approved']);
    $sellerRequest->user->update(['role' => 'seller']);

    // إنشاء بروفايل بائع تلقائياً
    \App\Models\SellerProfile::firstOrCreate(
        ['user_id' => $sellerRequest->user_id],
        ['shop_name' => $sellerRequest->user->name . ' للمنتجات اليدوية']
    );

    return redirect()->back()->with('success', 'تم قبول الطلب وتحويل المستخدم لبائع');
}

// رفض طلب
public function rejectSellerRequest(\App\Models\SellerRequest $sellerRequest)
{
    $sellerRequest->update(['status' => 'rejected']);
    return redirect()->back()->with('success', 'تم رفض الطلب');
}
}