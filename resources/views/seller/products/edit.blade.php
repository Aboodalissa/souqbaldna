@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>✏️ تعديل المنتج</h1>
    <a href="{{ route('seller.dashboard') }}" class="btn btn-outline-secondary">
        ← رجوع للوحة التحكم
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('seller.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">اسم المنتج</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">وصف المنتج</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">السعر (د.أ)</label>
                <input type="number" name="price" class="form-control"
                       step="0.01" min="0"
                       value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">الكمية المتوفرة</label>
                <input type="number" name="stock" class="form-control"
                       min="0"
                       value="{{ old('stock', $product->stock) }}" required>
                @error('stock')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">التصنيف</label>
            <select name="category_id" class="form-select" required>
                <option value="">اختر التصنيف</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">صورة المنتج</label>
            @if($product->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         style="height:150px; border-radius:10px">
                    <p class="text-muted mt-1">الصورة الحالية</p>
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <div class="form-text">اتركه فارغاً إذا ما تريد تغيير الصورة</div>
            @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">
            💾 حفظ التعديلات
        </button>
    </form>
</div>

@endsection