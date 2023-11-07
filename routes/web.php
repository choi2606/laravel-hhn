<?php

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\PaymentDetailsController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Client\LoginUserController;
use App\Http\Controllers\Client\RegisterUserController;
use App\Http\Controllers\Client\ShopClientController;
use App\Http\Controllers\Admin\AddBlogController;
use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\CategoryDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ListProductController;
use App\Http\Controllers\Admin\ListUserController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\UpdateOrderController;
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
    Route::get('admin', [AdminController::class, 'index']);

    Route::get('add-user', [AddUserController::class, 'index']);
    Route::post('add-user', [AddUserController::class, 'store']);
    Route::get('list-users', [ListUserController::class, 'index']);
    Route::get('list-users/number_entries{number_entries}', [ListUserController::class, 'loadEntries']);
    Route::delete('delete-users/number_entries{number_entries}', [ListUserController::class, 'deleteUser']);
    Route::get('delete-users/number_entries{number_entries}', [ListUserController::class, 'loadEntries']);
    Route::post('list-users', [ListUserController::class, 'store']);
    Route::put('update-user/number_entries{number_entries}', [ListUserController::class, 'updateUser']);
    Route::get('update-user/number_entries{number_entries}', [ListUserController::class, 'loadEntries']);
    Route::get('search-users/number_entries{number_entries}', [ListUserController::class, 'searchUsers']);
    Route::get('sort-ascending/number_entries{number_entries}', [ListUserController::class, 'sortAscending']);
    Route::get('sort-descending/number_entries{number_entries}', [ListUserController::class, 'sortDescending']);


    Route::get('add-products', [AddProductController::class, 'index']);
    Route::post('add-products', [AddProductController::class, 'store']);
    Route::get('list-products', [ListProductController::class, 'index']);
    Route::post('list-products', [ListProductController::class, 'store']);
    Route::delete('remove-product', [ListProductController::class, 'removeProduct']);
    Route::get('remove-product', [ListProductController::class, 'loadDataOnURLDelete']);
    Route::post('update-product{product_id}', [ListProductController::class, 'updateProduct']);
    Route::get('search-products', [ListProductController::class, 'searchProducts']);
    Route::get('sort-ascending-products', [ListProductController::class, 'sortAscendingProducts']);
    Route::get('sort-descending-products', [ListProductController::class, 'sortDescendingProducts']);


    Route::get('update-orders', [UpdateOrderController::class, 'index']);
    Route::delete('delete-order{order_id}', [UpdateOrderController::class, 'deleteOrder']);
    Route::get('delete-order{order_id}', [UpdateOrderController::class, 'deleteOrder']);
    Route::get('update-status-order{order_id}', [UpdateOrderController::class, 'updateStatusOrder']);
    Route::get('view-order{order_id}', [UpdateOrderController::class, 'orderDetails']);

    Route::get('add-blogs', [AddBlogController::class, 'index']);
    Route::post('add-blogs', [AddBlogController::class, 'store']);
    Route::get('update-blogs', [AddBlogController::class, 'index']);
    Route::post('update-blogs', [AddBlogController::class, 'store']);

    Route::get('add-discount', [DiscountController::class, 'index']);
    Route::post('add-discount', [DiscountController::class, 'store']);
    Route::get('list-discount', [DiscountController::class, 'listDiscounts']);
    Route::get('delete-discount{discount_id}', [DiscountController::class, 'deleteDiscount']);
    


    Route::get('list-categories', [CategoryDashboardController::class, 'index']);
    Route::post('add-category', [CategoryDashboardController::class, 'add_category']);
    Route::delete('remove-category{category_idSelect}', [CategoryDashboardController::class, 'remove_category']);
    Route::put('update_category{category_idSelect}', [CategoryDashboardController::class, 'update_category']);
    

});

Route::get('/welcome', [Controller::class, 'welcome']);


//client routes
Route::get('/', [DashboardClientController::class,'index']);
Route::get('product-detail{product_id}', [ProductDetailController::class,'index']);
Route::get('/blog-singles', function () {
    return view('client.blog-singles');
});
Route::get('/blog', function () {
    return view('client.blog');
});

Route::get('cart', [CartController::class,'index'])->name('cart');
Route::post('add-cart{id}', [CartController::class,'addProductToCart']);
Route::get('update-cart', [CartController::class,'updateProductToCart']);
Route::get('delete-product-cart{id}', [CartController::class,'deleteProductFromCart']);
Route::post('apply-discount', [CartController::class,'applyDiscount']);
Route::get('checkout', [PaymentDetailsController::class, 'index'])->name('checkout');
Route::post('checkout', [PaymentDetailsController::class, 'store']);
Route::post('check-payment-detail/{payment_method}', [PaymentDetailsController::class, 'addPaymentDetail']);
Route::get('check-payment-detail/{payment_method}', [PaymentDetailsController::class, 'paymentOnline']);
Route::get('/contact', function () {
    return view('client.contact');
});
Route::get('about', function () {
   return view('client.about'); 
});

Route::get('shop', [ShopClientController::class, 'index']);
Route::get('categoryProducts/{category_id}', [ShopClientController::class, 'getProductsByCategory'])->name('categoryProducts');
Route::get('search', [ShopClientController::class,'searchByName'])->name('products.search');
Route::get('/product-detail', function () {
    return view('client.product-detail');
});
//frontend admin routes
