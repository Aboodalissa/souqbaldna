<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSeller
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isSeller()) {
            return redirect()->route('home')->with('error', 'هذه الصفحة للبائعين فقط');
        }

        return $next($request);
    }
}