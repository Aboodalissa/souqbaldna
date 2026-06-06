@extends('layouts.app')

@section('content')
<div class="container" style="max-width:700px">
    <h3 class="mb-4">💬 محادثاتي</h3>

    @if($conversations->isEmpty())
        <div class="text-center py-5">
            <span style="font-size:4rem">💬</span>
            <h5 class="mt-3 text-muted">لا توجد محادثات بعد</h5>
        </div>
    @else
        <div class="list-group">
            @foreach($conversations as $userId => $msgs)
                @php
                    $lastMsg  = $msgs->last();
                    $otherUser = $lastMsg->sender_id === auth()->id()
                        ? $lastMsg->receiver
                        : $lastMsg->sender;
                    $unread = $msgs->where('receiver_id', auth()->id())
                                   ->where('is_read', false)
                                   ->count();
                @endphp
                <a href="{{ route('messages.show', $otherUser) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $otherUser->name }}</strong>
                        <p class="mb-0 text-muted small">{{ Str::limit($lastMsg->body, 50) }}</p>
                    </div>
                    <div class="text-end">
                        <small class="text-muted">{{ $lastMsg->created_at->diffForHumans() }}</small>
                        @if($unread > 0)
                            <span class="badge bg-primary rounded-pill d-block mt-1">{{ $unread }}</span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection