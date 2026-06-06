@extends('layouts.app')

@section('content')

<h1>📦 طلباتي</h1>
<hr>

@if($orders->isEmpty())
    <div class="text-center py-5">
        <span style="font-size:5rem">📦</span>
        <h3 class="mt-3">لا توجد طلبات بعد</h3>
        <p class="text-muted">تصفح المنتجات وابدأ التسوق</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
            تصفح المنتجات
        </a>
    </div>
@else
    <div class="row">
        @foreach($orders as $order)
            <div class="col-12 mb-3">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>طلب رقم #{{ $order->id }}</h5>
                            <p class="text-muted mb-1">
                                📅 {{ $order->created_at->format('Y/m/d') }}
                            </p>
                            <p class="text-muted mb-0">
                                📍 {{ $order->address }}
                            </p>
                        </div>
                        <div class="text-center">
                            <span class="badge fs-6
                                @if($order->status == 'pending') bg-warning text-dark
                                @elseif($order->status == 'processing') bg-info
                                @elseif($order->status == 'completed') bg-success
                                @else bg-danger @endif">
                                @if($order->status == 'pending') ⏳ بانتظار التأكيد
                                @elseif($order->status == 'processing') 🔄 جاري التجهيز
                                @elseif($order->status == 'completed') ✅ مكتمل
                                @else ❌ ملغي @endif
                            </span>
                            <p class="fw-bold text-primary fs-5 mt-2">{{ $order->total }} د.أ</p>
                            <a href="{{ route('orders.show', $order) }}"
                               class="btn btn-outline-primary">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection