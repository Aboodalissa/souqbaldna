@extends('layouts.app')

@section('content')

<h1>⚙️ لوحة الإدارة</h1>
<hr>

<!-- إحصائيات -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">🛍️</span>
            <h2 class="mt-2">{{ $totalProducts }}</h2>
            <p class="text-muted">إجمالي المنتجات</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">👥</span>
            <h2 class="mt-2">{{ $totalUsers }}</h2>
            <p class="text-muted">إجمالي المستخدمين</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">📦</span>
            <h2 class="mt-2">{{ $totalOrders }}</h2>
            <p class="text-muted">إجمالي الطلبات</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-4 text-center">
            <span style="font-size:3rem">⏳</span>
            <h2 class="mt-2">{{ $pendingProducts }}</h2>
            <p class="text-muted">منتجات بانتظار الموافقة</p>
        </div>
    </div>
</div>

<!-- روابط سريعة -->
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card p-4">
            <h4>إدارة المنتجات</h4>
            <p class="text-muted">راجع وقبل أو ارفض المنتجات الجديدة</p>
            <a href="{{ route('admin.products') }}" class="btn btn-primary">
                🛍️ إدارة المنتجات
            </a>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card p-4">
            <h4>إدارة المستخدمين</h4>
            <p class="text-muted">تحكم بأدوار المستخدمين</p>
            <a href="{{ route('admin.users') }}" class="btn btn-primary">
                👥 إدارة المستخدمين
            </a>
        </div>
    </div>
</div>

@endsection