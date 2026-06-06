<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use Illuminate\Http\Request;

class SellerRequestController extends Controller
{
    // صفحة طلب الانضمام
    public function create()
    {
        // تحقق إذا عنده طلب مسبق
        $existing = SellerRequest::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        return view('seller-request.create', compact('existing'));
    }

    // حفظ الطلب
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|min:20',
        ]);

        // تحقق إذا عنده طلب pending
        $existing = SellerRequest::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'طلبك قيد المراجعة — انتظر رد الأدمن');
        }

        SellerRequest::create([
            'user_id' => auth()->id(),
            'reason'  => $request->reason,
            'status'  => 'pending',
        ]);

        return redirect()->back()->with('success', 'تم إرسال طلبك — سيتم مراجعته قريباً');
    }
}