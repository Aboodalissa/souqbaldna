@extends('layouts.app')

@section('content')

<div class="row">
    <!-- صورة ومعلومات المنتج -->
    <div class="col-md-6 mb-4">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 class="img-fluid rounded-4 shadow"
                 alt="{{ $product->name }}">
        @else
            <div class="bg-light text-center py-5 rounded-4">
                <span style="font-size:8rem">🏺</span>
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <span class="badge bg-warning text-dark mb-2 fs-6">{{ $product->category->name }}</span>
        <h1>{{ $product->name }}</h1>
        <p class="text-muted fs-5">{{ $product->description }}</p>

        <div class="card p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold fs-3 text-primary">{{ $product->price }} د.أ</span>
                <span class="text-muted">المتوفر: {{ $product->stock }} قطعة</span>
            </div>
        </div>

        <p class="text-muted">
            البائع:
            <a href="{{ route('sellers.show', $product->user) }}">
                {{ $product->user->name }}
            </a>
        </p>

        @auth
            @if($product->stock > 0)
                <form method="POST" action="{{ route('cart.add', $product) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        🛒 أضف إلى السلة
                    </button>
                </form>
            @else
                <button class="btn btn-secondary btn-lg w-100" disabled>
                    نفذت الكمية
                </button>
            @endif

            <form method="POST" action="{{ route('wishlist.store', $product) }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-lg w-100">
                    ❤️ أضف للمفضلة
                </button>
            </form>

            @if(auth()->id() !== $product->user_id)
                <form method="POST" action="{{ route('messages.store', $product->user) }}" class="mt-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="body" value="مرحباً، أود الاستفسار عن منتج: {{ $product->name }}">
                    <button type="submit" class="btn btn-outline-secondary btn-lg w-100">
                        💬 راسل البائع
                    </button>
                </form>
            @endif

        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100">
                سجل دخولك للشراء
            </a>
        @endauth
    </div>
</div>

<!-- التقييمات -->
<div class="row mt-5">
    <div class="col-12">
        <h2>⭐ آراء المشترين</h2>
        <hr>

        @auth
            <div class="card p-4 mb-4">
                <h5>أضف تقييمك</h5>
                <form method="POST" action="{{ route('reviews.store', $product) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">التقييم</label>
                        <select name="rating" class="form-select">
                            <option value="5">⭐⭐⭐⭐⭐ ممتاز</option>
                            <option value="4">⭐⭐⭐⭐ جيد جداً</option>
                            <option value="3">⭐⭐⭐ جيد</option>
                            <option value="2">⭐⭐ مقبول</option>
                            <option value="1">⭐ ضعيف</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">رأيك بالمنتج</label>
                        <textarea name="comment" class="form-control" rows="3"
                                  placeholder="شاركنا تجربتك..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">إرسال التقييم</button>
                </form>
            </div>
        @endauth

        @forelse($reviews as $review)
            <div class="card p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <strong>{{ $review->user->name }}</strong>
                    <span>
                        @for($i = 1; $i <= $review->rating; $i++) ⭐ @endfor
                    </span>
                </div>
                <p class="mt-2 mb-0">{{ $review->comment }}</p>
            </div>
        @empty
            <p class="text-muted">لا توجد تقييمات بعد — كن أول من يقيّم!</p>
        @endforelse
    </div>
</div>

@endsection