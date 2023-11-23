<?php

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeClientController;
use App\Http\Controllers\Client\OrdersController;
use App\Http\Controllers\Client\PaymentDetailsController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Client\LoginUserController;
use App\Http\Controllers\Client\RegisterUserController;
use App\Http\Controllers\Client\ShopClientController;
use App\Http\Controllers\Admin\AddBlogController;
use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\CategoryDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ListUserController;
use App\Http\Controllers\Admin\LoginAdminController;
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

// client routes
Route::get('register', [RegisterUserController::class, 'index']);
Route::post('register', [RegisterUserController::class, 'store']);
Route::get('dashboard', [LoginUserController::class, 'index']);
Route::get('login', [LoginUserController::class, 'index']);
Route::post('login', [LoginUserController::class, 'store']);
Route::get('logout', [LoginUserController::class, 'logout']);
Route::get('forget', [LoginUserController::class, 'forget']);
// Admin routes
Route::get('login-admin', [LoginAdminController::class, 'index']);
Route::post('login-admin', [LoginAdminController::class, 'store']);
Route::get('admin-logout', [LoginAdminController::class, 'logout']);


Route::middleware('admin')->group(function () {
    //backend admin routes
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('add-user', [AddUserController::class, 'index']);
    Route::post('add-user', [AddUserController::class, 'store']);
    Route::get('list-users', [ListUserController::class, 'index']);
    Route::get('list-users/number_entries{number_entries}', [ListUserController::class, 'loadEntries']);
    Route::delete('delete-users/number_entries{number_entries}', [ListUserController::class, 'deleteUser']);
    Route::get('delete-users/number_entries{number_entries}', [ListUserController::class, 'loadEntries']);
    Route::put('update-user/number_entries{number_entries}', [ListUserController::class, 'updateUser']);
    Route::get('update-user/number_entries{number_entries}', [ListUserController::class, 'loadEntries']);
    Route::get('search-users/number_entries{number_entries}', [ListUserController::class, 'searchUsers']);
    Route::get('sort-ascending/number_entries{number_entries}', [ListUserController::class, 'sortAscending']);
    Route::get('sort-descending/number_entries{number_entries}', [ListUserController::class, 'sortDescending']);


    Route::get('add-products', [ProductController::class, 'index']);
    Route::post('add-products', [ProductController::class, 'addProduct']);
    Route::get('list-products', [ProductController::class, 'listProduct']);
    Route::post('list-products', [ProductController::class, 'store']);
    Route::delete('remove-product', [ProductController::class, 'removeProduct']);
    Route::get('remove-product', [ProductController::class, 'loadDataOnURLDelete']);
    Route::post('update-product{product_id}', [ProductController::class, 'updateProduct']);
    Route::put('update-status-product{product_id}', [ProductController::class, 'updateStatus']);
    Route::get('search-products', [ProductController::class, 'searchProducts']);
    Route::get('sort-ascending-products', [ProductController::class, 'sortAscendingProducts']);
    Route::get('sort-descending-products', [ProductController::class, 'sortDescendingProducts']);

    Route::get('list-orders', [OrderController::class, 'index']);
    Route::delete('delete-order{order_id}', [OrderController::class, 'deleteOrder']);
    Route::get('delete-order{order_id}', [OrderController::class, 'deleteOrder']);
    Route::put('update-status-order{order_id}', [OrderController::class, 'updateStatusOrder']);
    Route::get('view-order{order_id}', [OrderController::class, 'getOrderDetails']);

    Route::get('add-blogs', [AddBlogController::class, 'index']);
    Route::post('add-blogs', [AddBlogController::class, 'store']);
    Route::get('update-blogs', [AddBlogController::class, 'index']);
    Route::post('update-blogs', [AddBlogController::class, 'store']);

    Route::get('add-discount', [DiscountController::class, 'index']);
    Route::post('add-discount', [DiscountController::class, 'store']);
    Route::get('list-discount', [DiscountController::class, 'discountIndex']);
    Route::put('update-discount{discount_id}', [DiscountController::class, 'updateDiscount']);
    Route::get('delete-discount{discount_id}', [DiscountController::class, 'deleteDiscount']);

    Route::get('list-categories', [CategoryDashboardController::class, 'index']);
    Route::post('add-category', [CategoryDashboardController::class, 'add_category']);
    Route::delete('remove-category{category_idSelect}', [CategoryDashboardController::class, 'remove_category']);
    Route::put('update_category{category_idSelect}', [CategoryDashboardController::class, 'update_category']);

});

Route::get('/welcome', [Controller::class, 'welcome']);


//client routes
Route::get('/', [HomeClientController::class, 'index'])->name('index.client');
Route::get('product-detail{product_id}', [ProductDetailController::class, 'index']);
Route::get('/blog-singles', function () {
    return view('client.blog-singles');
});
Route::get('/blog', function () {
    return view('client.blog');
})->name('blog');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('add-cart{id}', [CartController::class, 'addProductToCart']);
//Route::get('add-cart{id}', [CartController::class, 'addProductToCart']);
Route::get('update-cart', [CartController::class, 'updateProductToCart']);
Route::get('delete-product-cart{id}', [CartController::class, 'deleteProductFromCart']);
Route::post('apply-discount', [CartController::class, 'applyDiscount']);
Route::get('checkout', [PaymentDetailsController::class, 'index'])->name('checkout');
Route::post('checkout', [PaymentDetailsController::class, 'store']);
Route::post('check-payment-detail/{payment_method}', [PaymentDetailsController::class, 'addPaymentDetail']);
Route::get('check-payment-detail/{payment_method}', [PaymentDetailsController::class, 'paymentOnline']);
Route::get('order', [OrdersController::class, 'index'])->name('client.order');
Route::get('cancel-status-product{order_id}', [OrdersController::class, 'cancelStatusOrder']);
Route::get('contact', function () {
    return view('client.contact');
})->name('contact');
Route::get('about', function () {
    return view('client.about');
})->name('about');

Route::get('shop', [ShopClientController::class, 'index'])->name('shop');
Route::get('product-detail', function () {
    return view('client.product-detail');
});

Route::get('fee-transport', [CartController::class, 'feeTransport']);

Route::get('email', function () {
    $cart = session()->get('cart');
    $pay = session()->get('payment');
    $status = 'pending';
    $code = "ORDER1234";
    $method = "Tiền mặt";
    $orderDate = date_format(now(), 'd/m/Y');
    return view('emails.orders.welcome', compact('status', 'code', 'cart', 'method', 'pay', 'orderDate'));
});

Route::get('vietnam', function() {
    return response()->file(public_path('data\vietnam.json'));
});

//frontend admin routes
