@extends('layouts.app')

@section('content')

<style>
/* ==============================
   متغيرات محلية
============================== */
.home-page {
    --radius: 20px;
    --shadow-sm: 0 2px 12px rgba(0,0,0,0.06);
    --shadow-md: 0 8px 30px rgba(0,0,0,0.10);
    --shadow-lg: 0 20px 60px rgba(0,0,0,0.14);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* ==============================
   HERO
============================== */
.hero-wrap {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    border-radius: var(--radius);
    padding: 70px 50px;
    margin-bottom: 50px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
}
.hero-wrap::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.08) 0%, transparent 50%),
        radial-gradient(circle at 20% 80%, rgba(0,0,0,0.1) 0%, transparent 50%);
}
.hero-wrap::after {
    content: '';
    position: absolute;
    top: -60px; left: -60px;
    width: 300px; height: 300px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.08);
}
.hero-text { position: relative; z-index: 2; max-width: 560px; }
.hero-label {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    color: rgba(255,255,255,0.9);
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 3px;
    padding: 6px 16px;
    border-radius: 50px;
    margin-bottom: 1.2rem;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.15);
}
.hero-title-main {
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 900;
    color: #fff;
    line-height: 1.25;
    margin-bottom: 1rem;
}
.hero-title-main span {
    color: var(--accent);
}
.hero-desc {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.8);
    line-height: 1.9;
    margin-bottom: 2rem;
}
.hero-btns { display: flex; gap: 12px; flex-wrap: wrap; }
.btn-hero-primary {
    background: #fff;
    color: var(--primary-dark);
    border: none;
    padding: 13px 32px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    transition: var(--transition);
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}
.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(0,0,0,0.2);
    color: var(--primary-dark);
    text-decoration: none;
}
.btn-hero-ghost {
    background: rgba(255,255,255,0.12);
    color: #fff;
    border: 1.5px solid rgba(255,255,255,0.3);
    padding: 13px 32px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: var(--transition);
    backdrop-filter: blur(5px);
}
.btn-hero-ghost:hover {
    background: rgba(255,255,255,0.2);
    color: #fff;
    text-decoration: none;
}
.hero-art {
    position: relative;
    z-index: 2;
    font-size: 9rem;
    line-height: 1;
    animation: floatEmoji 4s ease-in-out infinite;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.25));
    flex-shrink: 0;
}
@keyframes floatEmoji {
    0%, 100% { transform: translateY(0) rotate(-3deg); }
    50% { transform: translateY(-18px) rotate(3deg); }
}
@media (max-width: 768px) {
    .hero-wrap { padding: 40px 24px; flex-direction: column; text-align: center; }
    .hero-art { font-size: 5rem; }
    .hero-btns { justify-content: center; }
}

/* ==============================
   عنوان القسم
============================== */
.section-head {
    margin: 3.5rem 0 1.5rem;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
}
.section-head-text {}
.section-eyebrow {
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 3px;
    color: var(--primary);
    margin-bottom: 4px;
}
.section-title-main {
    font-size: 1.6rem;
    font-weight: 800;
    color: #1a1a1a;
    margin: 0;
}
.section-link {
    color: var(--primary);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    border-bottom: 1.5px solid var(--primary);
    padding-bottom: 2px;
    transition: opacity 0.2s;
}
.section-link:hover { opacity: 0.7; text-decoration: none; color: var(--primary); }

/* ==============================
   التصنيفات
============================== */
.cats-row {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 2.5rem;
}
.cat-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 20px;
    border-radius: 50px;
    background: #fff;
    border: 1.5px solid #e8e8e8;
    font-size: 0.88rem;
    font-weight: 600;
    color: #444;
    text-decoration: none;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
}
.cat-pill:hover, .cat-pill.active {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    text-decoration: none;
}

/* ==============================
   البحث
============================== */
.search-bar {
    background: #fff;
    border-radius: var(--radius);
    padding: 1.2rem 1.4rem;
    box-shadow: var(--shadow-sm);
    border: 1.5px solid #efefef;
    margin-bottom: 2.5rem;
    display: grid;
    grid-template-columns: 2fr 1.2fr 1fr 1fr auto;
    gap: 10px;
    align-items: center;
}
@media (max-width: 992px) { .search-bar { grid-template-columns: 1fr 1fr; } .search-bar button { grid-column: span 2; } }
@media (max-width: 576px) { .search-bar { grid-template-columns: 1fr; } .search-bar button { grid-column: span 1; } }

.search-bar input,
.search-bar select {
    border: 1.5px solid #e8e8e8;
    border-radius: 10px;
    padding: 11px 14px;
    font-family: 'Tajawal', sans-serif;
    font-size: 0.9rem;
    background: var(--bg);
    width: 100%;
    transition: border-color 0.25s;
}
.search-bar input:focus,
.search-bar select:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px var(--primary-light);
}
.search-bar button {
    background: var(--primary);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 11px 26px;
    font-family: 'Tajawal', sans-serif;
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    transition: var(--transition);
    width: 100%;
}
.search-bar button:hover { background: var(--primary-dark); transform: translateY(-1px); }

/* ==============================
   كروت المنتجات
============================== */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.4rem;
    margin-bottom: 2.5rem;
}
.p-card {
    background: #fff;
    border-radius: var(--radius);
    overflow: hidden;
    border: 1.5px solid #f0f0f0;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    transition: var(--transition);
    position: relative;
}
.p-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-md);
    border-color: var(--primary-light);
}
.p-card-img {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: var(--primary-light);
}
.p-card-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    object-position: right center;
    transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1),
                object-position 0.7s ease;
}
.p-card:hover .p-card-img img {
    transform: scale(1.08);
    object-position: left center;
}
.p-card-img-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
}
.p-card-cat {
    position: absolute;
    bottom: 10px; right: 10px;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(6px);
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 50px;
    color: #333;
}

/* زر المفضلة */
.wish-btn {
    position: absolute;
    top: 10px; left: 10px;
    width: 36px; height: 36px;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(6px);
    border: none;
    border-radius: 50%;
    font-size: 1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 5;
}
.wish-btn:hover {
    background: #fff;
    transform: scale(1.15);
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
}

.p-card-body {
    padding: 1.1rem 1.2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.p-card-name {
    font-size: 1rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 0.4rem;
    text-decoration: none;
    display: block;
    line-height: 1.4;
}
.p-card-name:hover { color: var(--primary); text-decoration: none; }
.p-card-desc {
    font-size: 0.84rem;
    color: #888;
    line-height: 1.7;
    flex: 1;
    margin-bottom: 0.9rem;
}
.p-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 0.85rem;
    border-top: 1.5px solid #f5f5f5;
}
.p-card-price {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--primary-dark);
}
.p-card-price small { font-size: 0.75rem; font-weight: 500; color: #aaa; }
.p-card-btn {
    background: var(--primary);
    color: #fff;
    border-radius: 10px;
    padding: 8px 18px;
    font-size: 0.83rem;
    font-weight: 700;
    text-decoration: none;
    transition: var(--transition);
}
.p-card-btn:hover {
    background: var(--primary-dark);
    color: #fff;
    text-decoration: none;
    transform: translateY(-1px);
}
.p-card-seller {
    background: var(--bg);
    padding: 0.6rem 1.2rem;
    font-size: 0.8rem;
    color: #888;
    border-top: 1px solid #f0f0f0;
}
.p-card-seller strong { color: #444; }

/* empty */
.empty-box {
    grid-column: 1/-1;
    text-align: center;
    padding: 4rem 2rem;
    background: #fff;
    border-radius: var(--radius);
    border: 1.5px dashed #e0e0e0;
}
.empty-box p { color: #aaa; font-size: 1rem; margin: 0; }

/* ==============================
   قسم الانضمام
============================== */
.join-wrap {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    border-radius: var(--radius);
    padding: 60px 40px;
    text-align: center;
    margin: 3rem 0 2rem;
    position: relative;
    overflow: hidden;
}
.join-wrap::before {
    content: '🇯🇴';
    position: absolute;
    font-size: 18rem;
    opacity: 0.04;
    top: -40px; left: -40px;
    line-height: 1;
}
.join-wrap h2 {
    font-size: 2rem;
    font-weight: 900;
    color: #fff;
    margin-bottom: 0.8rem;
}
.join-wrap h2 span { color: var(--accent); }
.join-wrap p {
    color: rgba(255,255,255,0.78);
    font-size: 1rem;
    line-height: 1.8;
    margin-bottom: 2rem;
}
.join-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
</style>

<div class="home-page">

{{-- ══ HERO ══ --}}
<div class="hero-wrap">
    <div class="hero-text">
        <span class="hero-label">🇯🇴 منتجات يدوية أردنية أصيلة</span>
        <h1 class="hero-title-main">
            اكتشف جمال<br>
            <span>سوق بلدنا</span>
        </h1>
        <p class="hero-desc">
            من بيوت حرفيينا إلى بيتك — كل قطعة تحمل قصة، كل لمسة تحكي حباً وأصالة.
        </p>
        <div class="hero-btns">
            <a href="#products" class="btn-hero-primary">🛍️ تصفح المنتجات</a>
            <a href="{{ route('sellers.index') }}" class="btn-hero-ghost">👩‍🎨 تعرف على الحرفيين</a>
        </div>
    </div>
    <div class="hero-art">🏺</div>
</div>

{{-- ══ التصنيفات ══ --}}
<div class="section-head">
    <div class="section-head-text">
        <p class="section-eyebrow">الأقسام</p>
        <h2 class="section-title-main">تصفح حسب التصنيف</h2>
    </div>
</div>

<div class="cats-row">
    <a href="{{ route('products.index') }}"
       class="cat-pill {{ !request('category') ? 'active' : '' }}">
        🏪 الكل
    </a>
    @foreach($categories as $cat)
        <a href="{{ route('products.index', ['category' => $cat->id]) }}"
           class="cat-pill {{ request('category') == $cat->id ? 'active' : '' }}">
            {{ $cat->name }}
        </a>
    @endforeach
</div>

{{-- ══ البحث ══ --}}
<form method="GET" action="{{ route('products.index') }}">
    <div class="search-bar">
        <input type="text" name="search" placeholder="🔍 عن ماذا تبحث؟"
               value="{{ request('search') }}">
        <select name="category">
            <option value="">كل التصنيفات</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        <input type="number" name="min_price" placeholder="السعر من"
               value="{{ request('min_price') }}">
        <input type="number" name="max_price" placeholder="إلى"
               value="{{ request('max_price') }}">
        <button type="submit">بحث</button>
    </div>
</form>

{{-- ══ المنتجات ══ --}}
<div class="section-head" id="products">
    <div class="section-head-text">
        <p class="section-eyebrow">المتجر</p>
        <h2 class="section-title-main">جميع المنتجات</h2>
    </div>
    <a href="{{ route('products.index') }}" class="section-link">عرض الكل ←</a>
</div>

<div class="products-grid">
    @forelse($products as $product)
        <div class="p-card">
            <div class="p-card-img">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}" loading="lazy">
                @else
                    <div class="p-card-img-placeholder">🏺</div>
                @endif
                <span class="p-card-cat">{{ $product->category->name }}</span>

                {{-- زر المفضلة --}}
                @auth
                <form method="POST" action="{{ route('wishlist.store', $product) }}">
                    @csrf
                    <button type="submit" class="wish-btn" title="أضف للمفضلة">❤️</button>
                </form>
                @endauth
            </div>

            <div class="p-card-body">
                <a href="{{ route('products.show', $product) }}" class="p-card-name">
                    {{ $product->name }}
                </a>
                <p class="p-card-desc">{{ Str::limit($product->description, 80) }}</p>
                <div class="p-card-footer">
                    <div class="p-card-price">
                        {{ number_format($product->price, 2) }}
                        <small>د.أ</small>
                    </div>
                    <a href="{{ route('products.show', $product) }}" class="p-card-btn">
                        التفاصيل
                    </a>
                </div>
            </div>

            <div class="p-card-seller">
                البائع: <strong>{{ $product->user->name }}</strong>
            </div>
        </div>
    @empty
        <div class="empty-box">
            <p>🏺 لا توجد منتجات حالياً</p>
        </div>
    @endforelse
</div>

<div style="display:flex; justify-content:center; margin-bottom:2rem;">
    {{ $products->links() }}
</div>

{{-- ══ قسم الانضمام ══ --}}
@guest
<div class="join-wrap">
    <h2>انضم إلى <span>سوق بلدنا</span></h2>
    <p>سجل مجاناً وابدأ اقتناء القطع الفريدة، أو افتح متجرك الخاص</p>
    <div class="join-btns">
        <a href="{{ route('register') }}" class="btn-hero-primary">🚀 سجل الآن</a>
        <a href="{{ route('login') }}" class="btn-hero-ghost">تسجيل الدخول</a>
    </div>
</div>
@endguest

</div>
@endsection