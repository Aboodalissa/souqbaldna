<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'سوق بلدنا') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}">

    <!-- Bootstrap 5 RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <!-- خط عربي -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/souq.css') }}">
    <style>
        .navbar-brand { font-size: 1rem; }
        .theme-btn {
    width: 22px !important;
    height: 22px !important;
    border-radius: 6px !important;
    display: inline-block;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border 0.2s;
}
.theme-btn.active {
    border: 2px solid #fff !important;
    outline: 1px solid #888;
}
    </style>
</head>
<body data-theme="heritage">

    <!-- الشريط العلوي -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🏺 سوق بلدنا</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">🛍️ المنتجات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sellers.index') }}">👩‍🎨 البائعون</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">🇯🇴 من نحن</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center">

                    <!-- أزرار الثيم -->
                    <li class="nav-item d-flex align-items-center gap-1 ms-1 me-2">
                        <span title="تراثي" class="theme-btn active" data-theme="heritage" style="background:#c0622f"></span>
                        <span title="زيتوني" class="theme-btn" data-theme="olive" style="background:#4a7c59"></span>
                        <span title="سماوي" class="theme-btn" data-theme="sky" style="background:#1a6b8a"></span>
                        <span title="ليلي" class="theme-btn" data-theme="night" style="background:#7c5cbf"></span>
                        <span title="ورد" class="theme-btn" data-theme="rose" style="background:#b5445a"></span>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                🛒 سلة المشتريات
                                @php
                                    $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                                @endphp
                                @if($cartCount > 0)
                                    <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wishlist.index') }}">❤️ المفضلة</a>
                        </li>
                   <li class="nav-item">
    <a class="nav-link position-relative" href="{{ route('messages.index') }}">
        💬 رسائلي
        @php
            $unreadCount = \App\Models\Message::where('receiver_id', auth()->id())
                ->where('is_read', false)
                ->count();
        @endphp
        @if($unreadCount > 0)
            <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
                {{ $unreadCount }}
            </span>
        @endif
    </a>
</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">📦 طلباتي</a>
                        </li>
                        @if(auth()->user()->isBuyer())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('seller-request.create') }}">🏪 أريد أن أبيع</a>
                            </li>
                        @endif
                        @if(auth()->user()->isSeller())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('seller.dashboard') }}">🏪 متجري</a>
                            </li>
                        @endif
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">⚙️ الإدارة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.seller-requests') }}">📋 طلبات البائعين</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <span class="nav-link">👤 {{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-danger">
                                    🚪 تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary ms-2" href="{{ route('login') }}">دخول</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ms-2" href="{{ route('register') }}">تسجيل جديد</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- الرسائل -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                ✅ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                ❌ {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- المحتوى -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- الذيل -->
    <footer class="border-top mt-5 py-4 text-center">
        <p class="mb-0">© 2026 سوق بلدنا — منتجات يدوية أصيلة من بلدنا الحبيب 🇯🇴</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- كود تغيير الثيم -->
    <script>
        const saved = localStorage.getItem('theme') || 'heritage';
        document.body.setAttribute('data-theme', saved);
        document.querySelectorAll('.theme-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.theme === saved);
        });

        document.querySelectorAll('.theme-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const theme = btn.dataset.theme;
                document.body.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
                document.querySelectorAll('.theme-btn').forEach(b => {
                    b.classList.toggle('active', b.dataset.theme === theme);
                });
            });
        });
    </script>
</body>
</html>