@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>➕ إضافة منتج جديد</h1>
    <a href="{{ route('seller.dashboard') }}" class="btn btn-outline-secondary">
        ← رجوع للوحة التحكم
    </a>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('seller.products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">اسم المنتج</label>
            <input type="text" name="name" class="form-control"
                   placeholder="مثال: سجادة يدوية مطرزة"
                   value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">وصف المنتج</label>
            <textarea name="description" class="form-control" rows="4"
                      placeholder="اوصف منتجك بالتفصيل..." required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">السعر (د.أ)</label>
                <input type="number" name="price" class="form-control"
                       placeholder="0.00" step="0.01" min="0"
                       value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">الكمية المتوفرة</label>
                <input type="number" name="stock" class="form-control"
                       placeholder="0" min="0"
                       value="{{ old('stock') }}" required>
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
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
            <input type="file" name="image" class="form-control" accept="image/*">
            <div class="form-text">اختياري — JPG أو PNG بحجم أقل من 2 ميغا</div>
            @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">
            ✅ إضافة المنتج
        </button>
    </form>
</div>

@endsection