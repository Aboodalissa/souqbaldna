<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول — سوق بلدنا</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/souq.css') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Tajawal', sans-serif;
            min-height: 100vh;
            display: flex;
        }

        /* النصف الأيسر — الصورة */
        .login-image {
            width: 55%;
    background: linear-gradient(160deg, #ffffff 0%, #c8f0d0 30%, #4CAF50 100%);            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }
        .login-image::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            top: -100px;
            left: -100px;
        }
        .login-image::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            bottom: -50px;
            right: -50px;
        }
        .login-image-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: #fff;
        }
        .login-image-emoji {
            font-size: 6rem;
            display: block;
            margin-bottom: 24px;
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .login-image h1 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 16px;
        }
        .login-image p {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.85);
            line-height: 1.8;
            max-width: 380px;
        }
        .login-image-features {
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.9);
            font-size: 1.1rem;
        }
        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        /* النصف الأيمن — الفورم */
        .login-form-side {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 50px;
            background: #fdf8f3;
        }
        .login-form-container {
            width: 100%;
            max-width: 400px;
        }
        .login-form-container h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #2e7d32;
            margin-bottom: 8px;
        }
        .login-form-container p {
            color: #888;
            margin-bottom: 32px;
            font-size: 1.05rem;
        }
        .form-control {
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 1.05rem;
            border: 1.5px solid #e0d5ca;
            background: #fff;
            font-family: 'Tajawal', sans-serif;
        }
        .form-control:focus {
            border-color: #c0622f;
            box-shadow: 0 0 0 3px rgba(192,98,47,0.15);
        }
        .form-label {
            font-weight: 600;
            font-size: 1rem;
            color: #444;
            margin-bottom: 6px;
        }
        .btn-login {
            
              background: linear-gradient(135deg, #4CAF50, #2e7d32);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-size: 1.15rem;
            font-weight: 700;
            width: 100%;
            font-family: 'Tajawal', sans-serif;
            transition: all 0.3s;
            margin-top: 8px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #a0522d, #8B4513);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(192,98,47,0.3);
        }
        .divider {
            text-align: center;
            color: #aaa;
            margin: 20px 0;
            position: relative;
        }
        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 42%;
            height: 1px;
            background: #e0d5ca;
        }
        .divider::before { right: 0; }
        .divider::after { left: 0; }
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #666;
        }
        .register-link a {
            color: #c0622f;
            font-weight: 700;
            text-decoration: none;
        }
        .register-link a:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .login-image { display: none; }
            .login-form-side { width: 100%; padding: 40px 24px; }
        }
    </style>
</head>
<body>

    <!-- النصف الأيسر — الصورة -->
    <div class="login-image">
        <div class="login-image-content">
            <span class="login-image-emoji">🏺</span>
            <h1>سوق بلدنا</h1>
            <p>منصة المنتجات اليدوية الأصيلة — من أيدي حرفيينا إلى بيوتكم</p>

            <div class="login-image-features">
                <div class="feature-item">
                    <div class="feature-icon">🧶</div>
                    <span>منتجات يدوية أصيلة</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🚚</div>
                    <span>توصيل لباب البيت</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⭐</div>
                    <span>تقييمات حقيقية من المشترين</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <span>دفع آمن وموثوق</span>
                </div>
            </div>
        </div>
    </div>

    <!-- النصف الأيمن — الفورم -->
    <div class="login-form-side">
        <div class="login-form-container">
            <h2>أهلاً بك! 👋</h2>
            <p>سجل دخولك للمتابعة</p>

            @if(session('status'))
                <div class="alert alert-success mb-4">{{ session('status') }}</div>
            @endif
           @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus
                           placeholder="example@email.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">كلمة المرور</label>
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required placeholder="••••••••">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted" for="remember">تذكرني</label>
                    </div>
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-muted" style="font-size:0.95rem">
                            نسيت كلمة المرور؟
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    دخول ←
                </button>
            </form>

           <div class="divider">أو</div>

{{-- زر Google --}}
<a href="{{ route('auth.google') }}" class="btn w-100 mb-3" style="
    border: 1.5px solid #e0d5ca;
    border-radius: 12px;
    padding: 14px;
    font-size: 1.1rem;
    font-weight: 700;
    font-family: 'Tajawal', sans-serif;
    background: #fff;
    color: #444;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
">
    <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="24">
    تسجيل الدخول بـ Google
</a>

<div class="register-link">
                ما عندك حساب؟
                <a href="{{ route('register') }}">سجل الآن مجاناً</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>