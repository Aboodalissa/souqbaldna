@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📦 تفاصيل الطلب #{{ $order->id }}</h1>
    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
        ← رجوع لطلباتي
    </a>
</div>

<div class="row">
    <!-- تفاصيل الطلب -->
    <div class="col-md-8">
        <div class="card p-4 mb-4">
            <h4>المنتجات المطلوبة</h4>
            <hr>
            @foreach($items as $item)
                <div class="d-flex align-items-center gap-3 mb-3">
                    @if($item->product->image)
                        <img src="{{ asset('storage/' . $item->product->image) }}"
                             style="width:80px; height:80px; object-fit:cover; border-radius:10px">
                    @else
                        <div class="bg-light text-center rounded-3"
                             style="width:80px; height:80px; line-height:80px; font-size:2rem">
                            🏺
                        </div>
                    @endif
                    <div class="flex-grow-1">
                        <h5>{{ $item->product->name }}</h5>
                        <p class="text-muted mb-0">الكمية: {{ $item->quantity }}</p>
                        <p class="text-muted mb-0">السعر: {{ $item->price }} د.أ</p>
                    </div>
                    <strong class="text-primary fs-5">
                        {{ $item->price * $item->quantity }} د.أ
                    </strong>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

    <!-- ملخص الطلب -->
    <div class="col-md-4">
        <div class="card p-4">
            <h4>معلومات الطلب</h4>
            <hr>
            <p><strong>رقم الطلب:</strong> #{{ $order->id }}</p>
            <p><strong>التاريخ:</strong> {{ $order->created_at->format('Y/m/d') }}</p>
            <p><strong>الهاتف:</strong> {{ $order->phone }}</p>
            <p><strong>العنوان:</strong> {{ $order->address }}</p>
            <hr>
            <p>
                <strong>الحالة:</strong>
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
            </p>
            <hr>
            <div class="d-flex justify-content-between fs-5">
                <span>المجموع الكلي:</span>
                <strong class="text-primary">{{ $order->total }} د.أ</strong>
            </div>
        </div>
    </div>
</div>

@endsection