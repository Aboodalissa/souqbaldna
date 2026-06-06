@extends('layouts.app')

@section('content')

<h1>👩‍🎨 البائعون</h1>
<p class="text-muted">تعرف على أصحاب المنتجات اليدوية</p>
<hr>

<div class="row">
    @forelse($sellers as $seller)
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center p-4">
                @if($seller->sellerProfile && $seller->sellerProfile->shop_image)
                    <img src="{{ asset('storage/' . $seller->sellerProfile->shop_image) }}"
                         class="rounded-circle mx-auto mb-3"
                         style="width:120px; height:120px; object-fit:cover">
                @else
                    <div class="mx-auto mb-3" style="font-size:5rem">👩‍🎨</div>
                @endif

                <h4>{{ $seller->sellerProfile->shop_name ?? $seller->name }}</h4>

                @if($seller->sellerProfile && $seller->sellerProfile->bio)
                    <p class="text-muted">{{ Str::limit($seller->sellerProfile->bio, 100) }}</p>
                @endif

                @if($seller->sellerProfile && $seller->sellerProfile->location)
                    <p class="text-muted">📍 {{ $seller->sellerProfile->location }}</p>
                @endif

                <a href="{{ route('sellers.show', $seller) }}"
                   class="btn btn-primary mt-auto">
                    عرض المتجر
                </a>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <span style="font-size:5rem">👩‍🎨</span>
            <h3 class="mt-3">لا يوجد بائعون بعد</h3>
        </div>
    @endforelse
</div>

@endsection