@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <h1>🏪 طلب الانضمام كبائع</h1>
        <hr>

        @if($existing && $existing->status == 'pending')
            <div class="alert alert-warning">
                ⏳ طلبك قيد المراجعة — سيتم الرد عليك قريباً
            </div>

        @elseif($existing && $existing->status == 'approved')
            <div class="alert alert-success">
                ✅ تم قبول طلبك! أنت الآن بائع.
                <a href="{{ route('seller.dashboard') }}" class="btn btn-success ms-3">
                    اذهب للوحة البائع
                </a>
            </div>

        @else
            <div class="card p-4">
                <p class="text-muted fs-5 mb-4">
                    أخبرنا عن نفسك وعن المنتجات اليدوية التي تصنعها،
                    وسيقوم فريقنا بمراجعة طلبك والرد عليك في أقرب وقت.
                </p>

                <form method="POST" action="{{ route('seller-request.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">لماذا تريد أن تصبح بائعا ؟</label>
                        <textarea name="reason" class="form-control @error('reason') is-invalid @enderror"
                                  rows="5"
                                  placeholder="مثال: أصنع مشغولات يدوية منذ 10 سنوات وأريد بيعها عبر الإنترنت...">{{ old('reason') }}</textarea>
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">اكتب على الأقل 20 حرفاً</div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        إرسال الطلب ←
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

@endsection