@extends('layouts.app')

@section('content')
<div class="container" style="max-width:700px">

    {{-- رأس الصفحة --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('messages.index') }}" class="btn btn-outline-secondary btn-sm">← رجوع</a>
        <h5 class="mb-0">💬 محادثة مع {{ $user->name }}</h5>
    </div>

    {{-- المنتج المرتبط --}}
    @php
        $relatedProduct = $messages->whereNotNull('product_id')->first()?->product;
    @endphp
    @if($relatedProduct)
        <div class="alert alert-light border mb-3 d-flex align-items-center gap-3 py-2">
            @if($relatedProduct->image)
                <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                     style="width:50px; height:50px; object-fit:cover; border-radius:10px;">
            @else
                <span style="font-size:2rem">🏺</span>
            @endif
            <div>
                <small class="text-muted">بخصوص المنتج:</small>
                <a href="{{ route('products.show', $relatedProduct) }}"
                   class="d-block fw-bold text-decoration-none">
                    {{ $relatedProduct->name }}
                </a>
            </div>
        </div>
    @endif

    {{-- صندوق الرسائل --}}
    <div class="card mb-3">
        <div class="card-body p-3"
             id="chat-box"
             style="height:420px; overflow-y:auto; display:flex; flex-direction:column; gap:10px">

            @forelse($messages as $msg)

                {{-- رسالة المستخدم الحالي (يسار) --}}
                @if($msg->sender_id === auth()->id())
                    <div class="d-flex justify-content-start">
                        <div class="p-2 px-3 rounded-4 rounded-start-0"
                             style="max-width:65%; background:#f0f0f0">
                            <p class="mb-1" style="font-size:0.95rem">{{ $msg->body }}</p>
                            <small class="text-muted" style="font-size:0.75rem">
                                {{ $msg->created_at->format('h:i A') }}
                            </small>
                        </div>
                    </div>

                {{-- رسالة الطرف الثاني (يمين) --}}
                @else
                    <div class="d-flex justify-content-end">
                        <div class="p-2 px-3 rounded-4 rounded-end-0"
                             style="max-width:65%; background:var(--primary); color:white">
                            <p class="mb-1" style="font-size:0.95rem">{{ $msg->body }}</p>
                            <small style="font-size:0.75rem; opacity:0.8">
                                {{ $msg->created_at->format('h:i A') }}
                            </small>
                        </div>
                    </div>
                @endif

            @empty
                <div class="text-center text-muted my-auto">
                    <span style="font-size:3rem">💬</span>
                    <p class="mt-2">ابدأ المحادثة الآن!</p>
                </div>
            @endforelse

        </div>
    </div>

    {{-- فورم إرسال الرسالة --}}
    <form action="{{ route('messages.store', $user) }}" method="POST">
        @csrf
        <div class="input-group">
            <input type="text"
                   name="body"
                   class="form-control rounded-start-4"
                   placeholder="اكتب رسالتك..."
                   autocomplete="off"
                   required>
            <button type="submit" class="btn btn-primary rounded-end-4">إرسال ✉️</button>
        </div>
        @error('body')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </form>

</div>

{{-- سكرول تلقائي للأسفل --}}
<script>
    const box = document.getElementById('chat-box');
    box.scrollTop = box.scrollHeight;
</script>
@endsection