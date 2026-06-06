<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // عرض كل المحادثات
    public function index() {
        $conversations = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->with(['sender', 'receiver'])
            ->latest()
            ->get()
            ->groupBy(function($msg) {
                $other = $msg->sender_id === auth()->id()
                    ? $msg->receiver_id
                    : $msg->sender_id;
                return $other;
            });
        return view('messages.index', compact('conversations'));
    }

    // عرض محادثة مع شخص معين
    public function show(User $user) {
        $messages = Message::where(function($q) use ($user) {
                $q->where('sender_id', auth()->id())
                  ->where('receiver_id', $user->id);
            })->orWhere(function($q) use ($user) {
                $q->where('sender_id', $user->id)
                  ->where('receiver_id', auth()->id());
            })
            ->with('sender')
            ->oldest()
            ->get();

        // تعليم الرسائل كمقروءة
        Message::where('sender_id', $user->id)
            ->where('receiver_id', auth()->id())
            ->update(['is_read' => true]);

        return view('messages.show', compact('messages', 'user'));
    }

    // إرسال رسالة
    public function store(Request $request, User $user) {
        $request->validate(['body' => 'required|max:1000']);
        Message::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $user->id,
            'product_id'  => $request->product_id,
            'body'        => $request->body,
        ]);
return redirect()->route('messages.show', $user);    }
}