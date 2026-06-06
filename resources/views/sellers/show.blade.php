@extends('layouts.app')

@section('content')

<!-- معلومات البائع -->
<div class="card p-4 mb-4">
    <div class="row align-items-center">
        <div class="col-md-2 text-center">
            @if($profile && $profile->shop_image)
                <img src="{{ asset('storage/' . $profile->shop_image) }}"
                     class="rounded-circle"
                     style="width:120px; height:120px; object-fit:cover">
            @else
                <div style="font-size:5rem">👩‍🎨</div>
            @endif
        </div>
        <div class="col-md-10">
            <h1>{{ $profile->shop_name ?? $user->name }}</h1>
            @if($profile && $profile->bio)
                <p class="text-muted fs-5">{{ $profile->bio }}</p>
            @endif
            <div class="d-flex gap-4 text-muted">
                @if($profile && $profile->location)
                    <span>📍 {{ $profile->location }}</span>
                @endif
                @if($profile && $profile->phone)
                    <span>📞 {{ $profile->phone }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- منتجات البائع -->
<h2>🛍️ منتجات المتجر</h2>
<hr>

<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover; border-radius:16px 16px 0 0"
                         alt="{{ $product->name }}">
                @else
                    <div class="bg-light text-center py-5" style="border-radius:16px 16px 0 0">
                        <span style="font-size:4rem">🏺</span>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 80) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-primary fs-5">{{ $product->price }} د.أ</span>
                        <a href="{{ route('products.show', $product) }}"
                           class="btn btn-primary">
                            عرض المنتج
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <span style="font-size:5rem">🏺</span>
            <h3 class="mt-3">لا توجد منتجات بعد</h3>
        </div>
    @endforelse
</div>

@endsection