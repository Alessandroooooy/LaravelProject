<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::group(['middleware' => 'web'], function () {
    // Маршруты для входа и выхода
    Route::get('/login', [LoginController::class,'showLoginForm' ])->name('login');
    Route::post('/login', [LoginController::class,'login']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Для POST-запрос
});



Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',  [RegisterController::class,'register']);

Route::get('/password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');

Route::get('/password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


// Маршруты для отображения главной страницы и каталога товаров

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Маршруты для категорий товаров
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Маршруты для корзины и оформления заказа
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add', [CartController::class, 'showAddForm'])->name('cart.showAddForm');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
Route::get('/order/thank-you', function () {
    return view('order.thank-you');
})->name('order.thank-you');

// Маршруты для административной панели
//Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//    Route::get('admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
//    Route::get('admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
//    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    // Другие маршруты административной панели
//});

// Маршруты для личного кабинета пользователя

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Другие маршруты для личного кабинета
});

// Маршруты для комментариев
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/create', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/products/{product}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/products/{product}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('comments.store');

// Маршруты для создания и сохранения рейтинга
Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/ratings/{rating}/edit', [RatingController::class, 'edit'])->name('ratings.edit');
Route::put('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');
Route::delete('/ratings/{rating}', [RatingController::class, 'destroy'])->name('ratings.destroy');

// Маршруты для аутентификации и восстановления пароля
Auth::routes();
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
