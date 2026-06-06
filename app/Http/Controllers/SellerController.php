<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\SellerProfile;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    // قائمة كل البائعين
    public function index()
    {
        $sellers = User::where('role', 'seller')
            ->with('sellerProfile')
            ->get();

        return view('sellers.index', compact('sellers'));
    }

    // صفحة بائع معين ومنتجاته
    public function show(User $user)
    {
        $products = Product::where('user_id', $user->id)
            ->where('status', 'active')
            ->latest()
            ->get();

        $profile = $user->sellerProfile;

        return view('sellers.show', compact('user', 'products', 'profile'));
    }

    // لوحة تحكم البائع
    public function dashboard()
    {
        $products = Product::where('user_id', auth()->id())
            ->latest()
            ->get();

        $totalSales = 0;

        return view('seller.dashboard', compact('products', 'totalSales'));
    }
}