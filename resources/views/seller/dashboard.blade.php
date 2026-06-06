@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>🏪 لوحة التحكم — متجري</h1>
    <a href="{{ route('seller.products.create') }}" class="btn btn-primary btn-lg">
        ➕ إضافة منتج جديد
    </a>
</div>

<!-- إحصائيات -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">🛍️</span>
            <h2 class="mt-2">{{ $products->count() }}</h2>
            <p class="text-muted">إجمالي المنتجات</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">✅</span>
            <h2 class="mt-2">{{ $products->where('status', 'active')->count() }}</h2>
            <p class="text-muted">منتجات نشطة</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">⏳</span>
            <h2 class="mt-2">{{ $products->where('status', 'pending')->count() }}</h2>
            <p class="text-muted">بانتظار الموافقة</p>
        </div>
    </div>
</div>

<!-- قائمة المنتجات -->
<div class="card p-4">
    <h3 class="mb-4">منتجاتي</h3>
    @forelse($products as $product)
        <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     style="width:80px; height:80px; object-fit:cover; border-radius:10px">
            @else
                <div class="bg-light text-center rounded-3"
                     style="width:80px; height:80px; line-height:80px; font-size:2rem">
                    🏺
                </div>
            @endif
            <div class="flex-grow-1">
                <h5>{{ $product->name }}</h5>
                <p class="text-muted mb-0">السعر: {{ $product->price }} د.أ | المتوفر: {{ $product->stock }}</p>
                <span class="badge
                    @if($product->status == 'active') bg-success
                    @elseif($product->status == 'pending') bg-warning text-dark
                    @else bg-danger @endif">
                    @if($product->status == 'active') ✅ نشط
                    @elseif($product->status == 'pending') ⏳ بانتظار الموافقة
                    @else ❌ غير نشط @endif
                </span>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('seller.products.edit', $product) }}"
                   class="btn btn-outline-primary">
                    ✏️ تعديل
                </a>
                <form method="POST" action="{{ route('seller.products.destroy', $product) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('هل أنت متأكد من الحذف؟')">
                        🗑️ حذف
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="text-center py-4">
            <span style="font-size:4rem">🏺</span>
            <h4 class="mt-3">لا توجد منتجات بعد</h4>
            <a href="{{ route('seller.products.create') }}" class="btn btn-primary">
                أضف منتجك الأول
            </a>
        </div>
    @endforelse
</div>

@endsection