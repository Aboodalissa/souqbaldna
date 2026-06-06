<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل جديد — سوق بلدنا</title>
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
        .login-image {
            width: 55%;
            background: linear-gradient(160deg, #ffffff 0%, #c8f0d0 30%, #4CAF50 100%);
            display: flex;
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
            background: rgba(255,255,255,0.15);
            top: -100px;
            left: -100px;
        }
        .login-image::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            bottom: -50px;
            right: -50px;
        }
        .login-image-content {
            position: relative;
            z-index: 1;
            text-align: center;
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
            color: #1a5c2a;
            margin-bottom: 16px;
        }
        .login-image p {
            font-size: 1.2rem;
            color: #2d7a3a;
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
            color: #1a5c2a;
            font-size: 1.1rem;
        }
        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.5);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        .login-form-side {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 50px;
            background: #f9fdf9;
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
            margin-bottom: 28px;
            font-size: 1.05rem;
        }
        .form-control {
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 1.05rem;
            border: 1.5px solid #c8e6c9;
            background: #fff;
            font-family: 'Tajawal', sans-serif;
        }
        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76,175,80,0.15);
        }
        .form-label {
            font-weight: 600;
            font-size: 1rem;
            color: #444;
            margin-bottom: 6px;
        }
        .btn-register {
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
        .btn-register:hover {
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(76,175,80,0.3);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #666;
        }
        .login-link a {
            color: #2e7d32;
            font-weight: 700;
            text-decoration: none;
        }
        .login-link a:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .login-image { display: none; }
            .login-form-side { width: 100%; padding: 40px 24px; }
        }
    </style>
</head>
<body>

    <!-- النصف الأيسر -->
    <div class="login-image">
        <div class="login-image-content">
            <span class="login-image-emoji">🧶</span>
            <h1>انضم لسوق بلدنا</h1>
            <p>سجل مجاناً وابدأ رحلتك مع المنتجات اليدوية الأصيلة</p>

            <div class="login-image-features">
                <div class="feature-item">
                    <div class="feature-icon">🏪</div>
                    <span>افتح متجرك الخاص</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🛍️</div>
                    <span>تسوق من آلاف المنتجات</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⭐</div>
                    <span>قيّم وشارك تجربتك</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <span>حساب آمن ومحمي</span>
                </div>
            </div>
        </div>
    </div>

    <!-- النصف الأيمن -->
    <div class="login-form-side">
        <div class="login-form-container">
            <h2>حساب جديد 🌱</h2>
            <p>أنشئ حسابك مجاناً الآن</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">الاسم الكامل</label>
                    <input type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" required autofocus
                           placeholder="مثال: أحمد محمد">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required
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

                <div class="mb-4">
                    <label class="form-label">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation"
                           class="form-control" required placeholder="••••••••">
                </div>

                <button type="submit" class="btn-register">
                    إنشاء الحساب ←
                </button>
            </form>

            <div class="login-link">
                عندك حساب؟
                <a href="{{ route('login') }}">سجل دخولك</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>