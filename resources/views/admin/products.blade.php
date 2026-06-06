@extends('layouts.app')

@section('content')

<h1>🛍️ إدارة المنتجات</h1>
<hr>

{{-- رسالة النجاح --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>المنتج</th>
                    <th>البائع</th>
                    <th>التصنيف</th>
                    <th>السعر</th>
                    <th>الحالة</th>
                    <th>الإجراء</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         style="width:50px; height:50px; object-fit:cover; border-radius:8px">
                                @else
                                    <span style="font-size:2rem">🏺</span>
                                @endif
                                <span>{{ $product->name }}</span>
                            </div>
                        </td>
                        <td>{{ $product->user->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }} د.أ</td>
                        <td>
                            <span class="badge fs-6
                                @if($product->status == 'active') bg-success
                                @elseif($product->status == 'pending') bg-warning text-dark
                                @else bg-danger @endif">
                                @if($product->status == 'active') ✅ نشط
                                @elseif($product->status == 'pending') ⏳ انتظار
                                @else ❌ غير نشط @endif
                            </span>
                        </td>
                        <td>
                            @if($product->status == 'pending')
    <div class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.products.approve', $product) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">✅ قبول</button>
        </form>

        <form method="POST" action="{{ route('admin.products.reject', $product) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-danger">❌ رفض</button>
        </form>
    </div>
@else
    <span class="text-muted">تمت المعالجة</span>
@endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            لا توجد منتجات
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection