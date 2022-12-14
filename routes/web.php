<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandProduct;
use App\Http\Controllers\Backend\CategoryPost;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryProduct;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\PostHomeController;
use App\Http\Controllers\Backend\DeliveryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    
//======================= Phần client
// trang home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/', [HomeController::class, 'index'])->name('index');
// tìm kiếm sản phẩm
Route::post('/search', [HomeController::class, 'search'])->name('search.search');
//chi tiết sản phẩm
Route::get('/product-detail/{id}', [HomeController::class, 'detail'])->name('detail');
// Route::get('/search', [HomeController::class, 'indsearchex'])->name('home.index');
// loại sản phẩm 
Route::get('/category/{id}', [CategoryController::class, 'index'])->name('detail');
// phần giỏ hàng
Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'view_cart'])->name('cart.view-cart');
Route::get('/delete-cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
// mã giảm giá
// Route::post('/check-coupon', [CartController::class, 'check_coupon'])->name('coupon.check_coupon');
Route::post('/check-coupon', [CartController::class, 'check_coupon'])->name('check_coupon.check_coupon');
// checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
//load trang vận chuyển tỉnh thành phố
Route::post('/checkout-address', [CheckoutController::class, 'load_address'])->name('checkout.load_address');
// tính phí vẫn chuyển 
Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee'])->name('checkout.calculate_fee');
// đặt hàng shiping
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order'])->name('checkout.confirm_order');
// trang bài viết
Route::get('/post', [PostHomeController::class, 'index'])->name('post.index');
// bài viết chi tiết
Route::get('/post-detail/{id}', [PostHomeController::class, 'detail'])->name('post.index');
// checkout
// Login admin
Route::get('/admin', [AdminController::class, 'getLogin'])->name('admin.getLogin');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.getLogin');
// Regis admin
Route::get('/admin/regis', [AdminController::class, 'getRegis'])->name('admin.getRegis');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.index')->middleware('check_auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend'],function(){
    // =============================== dashboard ===============================
    $prefix         = '';
    $controllerName = 'dashboard';
    // Route::group(['prefix' => $prefix], function () use($controllerName) {
    //     Route::get('/admin/dashboard', [DashboardController::class, 'index'])              ->name($controllerName.'.index');
    // });
    //=============================== slider ===============================
    $prefix         = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [SliderController::class, 'index'])                ->name($controllerName.'.index');
        Route::get('/{status}/{id}',[SliderController::class, 'status'])   ->name($controllerName.'.status')->whereNumber('id');
        Route::get('/create', [SliderController::class, 'create'])         ->name($controllerName.'.create');
        Route::post('/', [SliderController::class, 'store'])               ->name($controllerName.'.store');
        Route::put('/{id}', [SliderController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id');
        Route::delete('/{id}', [SliderController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id');
        Route::get('/{id}', [SliderController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id');
        Route::get('/{id}/edit', [SliderController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id');
    });
// quản lý đơn hàng
Route::prefix('/order')->group(function () {
        Route::get('/',[OrderController::class, 'index'])->name('order.index');
        Route::get('/view-order/{code}',[OrderController::class, 'detail'])->name('order.detail');
        Route::post('/update-order',[OrderController::class, 'update_order'])->name('update.order');
    });
// phí vận chuyển 
Route::prefix('/delivery')->group(function () {
        Route::get('/',[DeliveryController::class, 'index'])->name('coupon.index');
        Route::post('/select-delivery',[DeliveryController::class, 'select_delivery'])->name('coupon.select_delivery');
        Route::post('/insert-delivery',[DeliveryController::class, 'insert_delivery'])->name('feeship.insert_delivery');
        Route::post('/select-feeship',[DeliveryController::class, 'feeship'])->name('feeship.feeship'); 
         Route::post('/update-feeship',[DeliveryController::class, 'update_feeship'])->name('feeship.update_feeship'); 
    });
// mã giảm giá
    Route::prefix('coupon')->group(function () {
        Route::get('/',[CouponController::class, 'index'])->name('coupon.index');
        Route::get('/create-coupon',[CouponController::class, 'create'])->name('coupon  .create');
        Route::post('/store-coupon',[CouponController::class, 'store'])->name('coupon.store'); 
        Route::get('/delete-coupon/{id}',[CouponController::class, 'delete'])->name('coupon.delete');
        Route::get('/edit-coupon/{id}',[CouponController::class, 'edit'])->name('coupon.edit');
        Route::post('/update-coupon/{id}',[CouponController::class, 'update'])->name('coupon.update'); 
    });
 // ===============================gallery Ảnh =====================================
    Route::prefix('gallery')->group(function () {
        Route::get('/add/{id}',[GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/gallery-all',[GalleryController::class, 'gallery_all'])->name('gallery.gallery_all');
        Route::post('/store/{id}',[GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/delete-gallery/{id}',[GalleryController::class, 'delete'])->name('gallery.delete');
       
           
    });
    // ===============================Category Product =====================================
    Route::prefix('category-product')->group(function () {
        Route::get('/',[CategoryProduct::class,'index'])->name('category.index')->middleware('can:category-product-list'); // da cai do phan quyen e lam a
        Route::get('/create-category-product',[CategoryProduct::class, 'create'])->name('category.create')->middleware('can:category-product-add');
        Route::get('/destroy-category-product/{id}', [CategoryProduct::class, 'destroy'])->name('category.destroy')->middleware('can:category-product-delete');
        Route::get('/edit-category-product/{id}', [CategoryProduct::class, 'edit'])->name('category.edit')->middleware('can:category-product-edit');
        Route::post('/store-category-product', [CategoryProduct::class, 'store'])->name('category.store');
        Route::post('/update-category-product/{id}', [CategoryProduct::class, 'update'])->name('category.update');
        Route::get('/active-category-product/{id}', [CategoryProduct::class, 'active'])->name('category.active');
        Route::get('/unactive-category-product/{id}', [CategoryProduct::class, 'unactive'])->name('category.unactive');
           
    });
    // ===============================brand Product =====================================
    route::prefix('brand')->group(function(){
        Route::get('/',[BrandProduct::class,'index'])->name('brand.index')->middleware('can:brand-list'); 
        Route::get('create-brand',[BrandProduct::class, 'create'])->name('brand.create')->middleware('can:brand-add');
        Route::get('/destroy-brand/{id}', [BrandProduct::class, 'destroy'])->name('brand.destroy')->middleware('can:brand-delete');
        Route::get('/edit-brand/{id}', [BrandProduct::class, 'edit'])->name('brand.edit')->middleware('can:brand-edit');
        Route::post('/store-brand', [BrandProduct::class, 'store'])->name('brand.store');
        Route::post('/update-brand/{id}', [BrandProduct::class, 'update'])->name('brand.update');

    });
    // ===============================brand Product =====================================
    // ===================================Product =====================================
    route::prefix('product')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('product.index')->middleware('can:product-list'); 
        Route::get('create-product',[ProductController::class, 'create'])->name('product.create')->middleware('can:product-add');
        Route::get('/destroy-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('can:product-delete');
        Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:product-edit');
        Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
        Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

    });
    // =================================== Product =====================================
    // =================================== POST =====================================
    route::prefix('post')->group(function(){
        Route::get('/',[PostController::class,'index'])->name('product.index')->middleware('can:post-list'); 
        Route::get('create-post',[PostController::class, 'create'])->name('post.create')->middleware('can:post-add');
        Route::get('/destroy-post/{id}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('can:post-delete');
        Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('post.edit')->middleware('can:post-edit');
        Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
        Route::post('/update-post/{id}', [PostController::class, 'update'])->name('post.update');

    });
    // =================================== POST =====================================
    // =================================== category POST =====================================
    route::prefix('category-post')->group(function(){
        Route::get('/',[CategoryPost::class,'index'])->name('category.index')->middleware('can:category-post-list'); 
        Route::get('create-category-post',[CategoryPost::class, 'create'])->name('category.create')->middleware('can:category-post-add');
        Route::get('/destroy-category-post/{id}', [CategoryPost::class, 'destroy'])->name('category.destroy')->middleware('can:category-post-delete');
        Route::get('/edit-category-post/{id}', [CategoryPost::class, 'edit'])->name('category.edit')->middleware('can:category-post-edit');
        Route::post('/store-category-post', [CategoryPost::class, 'store'])->name('category.store');
        Route::post('/update-category-post/{id}', [CategoryPost::class, 'update'])->name('category.update');

    });
    // =================================== category POST =====================================
    // =============================== Role Admin =====================================
    route::prefix('roles')->group(function(){
        Route::get('/',[RoleController::class,'index'])->name('roles.index')->middleware('can:roles-list'); 
        Route::get('add-roles',[RoleController::class, 'create'])->name('roles.create')->middleware('can:roles-add');
        Route::get('/delete-roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('can:roles-delete');
        Route::get('/edit-roles/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('can:roles-edit');
        Route::post('/store-roles', [RoleController::class, 'store'])->name('roles.store');
        Route::post('/update-roles/{id}', [RoleController::class, 'update'])->name('roles.update');

    });
    // =============================== Role Admin =====================================
    // =============================== user Admin =====================================
    route::prefix('user')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('user.index')->middleware('can:user-list'); 
        Route::get('add-user',[UserController::class, 'create'])->name('user.create')->middleware('can:user-add');
        Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('can:user-delete');
        Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('can:user-edit');
        Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
        Route::post('/update-user/{id}', [UserController::class, 'update'])->name('user.update');

    });
    // =============================== user Admin =====================================
     // =============================== user Admin =====================================
     route::prefix('permission')->group(function(){ 
        Route::get('/create-permission',[PermissionController::class, 'create'])->name('user.create')->middleware('can:permission-list');
        Route::post('/store-permission', [PermissionController::class, 'store'])->name('user.store')->middleware('can:permission-add');
    });
    // =============================== user Admin =====================================

});

Auth::routes();







