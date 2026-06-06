@extends('layouts.app')

@section('content')

<h1>🛒 سلة المشتريات</h1>
<hr>

@if($cartItems->isEmpty())
    <div class="text-center py-5">
        <span style="font-size:5rem">🛒</span>
        <h3 class="mt-3">سلتك فارغة</h3>
        <p class="text-muted">تصفح المنتجات وأضف ما يعجبك</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
            تصفح المنتجات
        </a>
    </div>
@else
    <div class="row">
        <div class="col-md-8">
            @foreach($cartItems as $item)
                <div class="card mb-3 p-3">
                    <div class="d-flex align-items-center gap-3">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                 style="width:100px; height:100px; object-fit:cover; border-radius:10px">
                        @else
                            <div class="bg-light text-center rounded-3"
                                 style="width:100px; height:100px; line-height:100px; font-size:2.5rem">
                                🏺
                            </div>
                        @endif
                        <div class="flex-grow-1">
                            <h5>{{ $item->product->name }}</h5>
                            <p class="text-primary fw-bold">{{ $item->product->price }} د.أ</p>
                            <p class="text-muted">الكمية: {{ $item->quantity }}</p>
                        </div>
                        <form method="POST" action="{{ route('cart.remove', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                🗑️ حذف
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <h4>ملخص الطلب</h4>
                <hr>
                <div class="d-flex justify-content-between fs-5">
                    <span>المجموع:</span>
                    <strong class="text-primary">{{ $total }} د.أ</strong>
                </div>
                <hr>
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">عنوان التوصيل</label>
                        <textarea name="address" class="form-control" rows="3"
                                  placeholder="اكتب عنوانك بالتفصيل..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control"
                               placeholder="07XXXXXXXX" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        ✅ تأكيد الطلب
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif

@endsection