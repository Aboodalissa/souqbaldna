@extends('layouts.app')

@section('content')

<h1>🏪 طلبات الانضمام كبائع</h1>
<hr>

<div class="card p-4">
    @forelse($requests as $request)
        <div class="d-flex align-items-start gap-3 mb-4 pb-4 border-bottom">
            <div class="flex-grow-1">
                <h5>{{ $request->user->name }}</h5>
                <p class="text-muted mb-1">{{ $request->user->email }}</p>
                <p class="mb-2">{{ $request->reason }}</p>
                <small class="text-muted">{{ $request->created_at->diffForHumans() }}</small>
            </div>
            <div class="text-center">
                <span class="badge fs-6 mb-3 d-block
                    @if($request->status == 'pending') bg-warning text-dark
                    @elseif($request->status == 'approved') bg-success
                    @else bg-danger @endif">
                    @if($request->status == 'pending') ⏳ انتظار
                    @elseif($request->status == 'approved') ✅ مقبول
                    @else ❌ مرفوض @endif
                </span>

                @if($request->status == 'pending')
                    <form method="POST"
                          action="{{ route('admin.seller-requests.approve', $request) }}"
                          class="mb-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success w-100">
                            ✅ قبول
                        </button>
                    </form>
                    <form method="POST"
                          action="{{ route('admin.seller-requests.reject', $request) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger w-100">
                            ❌ رفض
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <span style="font-size:4rem">🏪</span>
            <h4 class="mt-3">لا توجد طلبات حالياً</h4>
        </div>
    @endforelse
</div>

@endsection