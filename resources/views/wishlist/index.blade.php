@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">❤️ المفضلة</h3>

    @if($items->isEmpty())
        <div class="alert alert-info text-center">
            لا يوجد منتجات في المفضلة حتى الآن
        </div>
    @else
        <div class="row g-4">
            @foreach($items as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                 class="card-img-top"
                                 style="height:200px; object-fit:cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                 style="height:200px;">
                                🖼️ لا توجد صورة
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="text-muted">{{ number_format($item->product->price, 2) }} د.أ</p>

                            <a href="{{ route('products.show', $item->product) }}"
                               class="btn btn-outline-primary btn-sm">
                                👁️ عرض المنتج
                            </a>

                            <form action="{{ route('wishlist.destroy', $item) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">
                                    🗑️ حذف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection