<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // عرض كل المنتجات
   public function index(Request $request)
{
    $query = Product::with(['category', 'user'])
        ->where('status', 'active');

    // بحث
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // فلتر تصنيف
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // فلتر سعر
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    $products = $query->latest()->paginate(12)->withQueryString();
    $categories = Category::all();

    return view('products.index', compact('products', 'categories'));
}

    // عرض منتج واحد
    public function show(Product $product)
    {
        $reviews = $product->reviews()->with('user')->latest()->get();
        return view('products.show', compact('product', 'reviews'));
    }

    // صفحة إضافة منتج جديد
    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    // حفظ منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|min:3',
            'description' => 'required|min:10',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'user_id'     => auth()->id(),
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imagePath,
            'status'      => 'pending',
        ]);

        return redirect()->route('seller.dashboard')->with('success', 'تم إضافة المنتج بنجاح — بانتظار موافقة الأدمن');
    }

    // صفحة تعديل منتج
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    // حفظ التعديل
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|min:3',
            'description' => 'required|min:10',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('seller.dashboard')->with('success', 'تم تعديل المنتج بنجاح');
    }
public function destroy(Product $product)
{
    // تحقق إن ما في طلبات على المنتج
    if ($product->orderItems()->exists()) {
        return redirect()->back()->with('error', 'لا يمكن حذف المنتج لأن عليه طلبات');
    }

    $product->delete();
    return redirect()->route('seller.dashboard')->with('success', 'تم حذف المنتج');
}
}