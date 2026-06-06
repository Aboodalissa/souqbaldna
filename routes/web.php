<?php
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', [ProductController::class, 'index'])->name('home');
  
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->isSeller()) {
        return redirect()->route('seller.dashboard');
    } else {
        return redirect()->route('products.index');
    }
})->middleware(['auth'])->name('dashboard');

// صفحات المنتجات (للكل)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// صفحات البائعين (للكل)
Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
Route::get('/sellers/{user}', [SellerController::class, 'show'])->name('sellers.show');

// صفحات تحتاج تسجيل دخول
Route::middleware(['auth'])->group(function () {

    // البروفايل
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // السلة
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    // الطلبات
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // التقييمات
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // طلب الانضمام كبائع
    Route::get('/become-seller', [SellerRequestController::class, 'create'])->name('seller-request.create');
    Route::post('/become-seller', [SellerRequestController::class, 'store'])->name('seller-request.store');

    // المفضلة
    Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{product}', [App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{wishlist}', [App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // صفحات البائع
    Route::middleware(['seller'])->prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // صفحات الأدمن
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/products', [AdminController::class, 'products'])->name('products');
        Route::patch('/products/{product}/approve', [AdminController::class, 'approveProduct'])->name('products.approve');
        Route::patch('/products/{product}/reject', [AdminController::class, 'rejectProduct'])->name('products.reject');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::patch('/users/{user}/role', [AdminController::class, 'updateRole'])->name('users.role');
        Route::get('/seller-requests', [AdminController::class, 'sellerRequests'])->name('seller-requests');
        Route::patch('/seller-requests/{sellerRequest}/approve', [AdminController::class, 'approveSellerRequest'])->name('seller-requests.approve');
        Route::patch('/seller-requests/{sellerRequest}/reject', [AdminController::class, 'rejectSellerRequest'])->name('seller-requests.reject');
    });

});

// Google Login
Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'callback']);

Route::get('/about', function () {
    return view('about');
})->name('about');

// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{user}', [MessageController::class, 'store'])->name('messages.store');
});
// الرسائل
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{user}', [App\Http\Controllers\MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{user}', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
});

require __DIR__.'/auth.php';