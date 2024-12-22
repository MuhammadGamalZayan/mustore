<?php
 
use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\CheckForPrice;


// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix', 'products'], function() {
    Route::get('/category/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleCategory'])->name('single.category');

    Route::get('/single-product/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('single.product');
    
    Route::post('/add-cart', [App\Http\Controllers\Products\ProductsController::class, 'addToCart'])->name('products.add.cart');
    
    Route::get('/delete-cart/{id}', [App\Http\Controllers\Products\ProductsController::class, 'deleteFromCart'])->name('products.delete.cart');
    
});

Route::group(['prefix' => 'checkout'], function() {
    Route::get('checkout/pay', [App\Http\Controllers\Products\ProductsController::class, 'payWithPaypal'])
    ->name('products.pay')->middleware('check.for.price');
    Route::get('checkout/success', [App\Http\Controllers\Products\ProductsController::class, 'success'])
    ->name('products.success')->middleware('check.for.price');
});

Route::group(['prefix' => 'account'], function() {
    Route::get('/track-order', [App\Http\Controllers\Users\UsersController::class, 'trackOrder'])
    ->name('account.track-order')->middleware('auth:web');

    Route::get('/settings', [App\Http\Controllers\Users\UsersController::class, 'mySettings'])
    ->name('account.settings')->middleware('auth:web');
    Route::post('/settings/{id}', [App\Http\Controllers\Users\UsersController::class, 'updateSettings'])
    ->name('account.settings.update')->middleware('auth:web');
});
// Products Category 
Route::get('shop', [App\Http\Controllers\Products\ProductsController::class, 'shop'])->name('products.shop');
// Add to cart - Delele
Route::get('cart', [App\Http\Controllers\Products\ProductsController::class, 'cart'])->name('products.cart')->middleware('auth:web');

// checkout 
Route::post('prepare-checkout', [App\Http\Controllers\Products\ProductsController::class, 'prepareCheckout'])
    ->name('products.prepare.checkout');

Route::get('checkout', [App\Http\Controllers\Products\ProductsController::class, 'checkout'])
            ->name('products.checkout')->middleware('check.for.price');
Route::post('checkout', [App\Http\Controllers\Products\ProductsController::class, 'processCheckout'])
            ->name('products.process.checkout')->middleware('check.for.price');


Route::get('about', [App\Http\Controllers\Pages\MainPages::class, 'about'])->name('about');
Route::get('contact', [App\Http\Controllers\Pages\MainPages::class, 'contact'])->name('contact');
Route::get('faq', [App\Http\Controllers\Pages\MainPages::class, 'faq'])->name('faq');
Route::get('privacy', [App\Http\Controllers\Pages\MainPages::class, 'privacy'])->name('privacy');
Route::get('terms', [App\Http\Controllers\Pages\MainPages::class, 'terms'])->name('terms');



Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/index', [App\Http\Controllers\Admins\AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/admins', [App\Http\Controllers\Admins\AdminController::class, 'adminsPage'])->name('admins.page');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminController::class, 'createAdmin'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminController::class, 'storeAdmin'])->name('admins.store');
    Route::get('/all-categories', [App\Http\Controllers\Admins\AdminController::class, 'showCategories'])->name('admins.categories');
    Route::get('/create-category', [App\Http\Controllers\Admins\AdminController::class, 'createCategory'])->name('admins.createcategory');
    Route::post('/create-category', [App\Http\Controllers\Admins\AdminController::class, 'storeCategory'])->name('admins.storecategory');
    Route::get('/update-category/{id}', [App\Http\Controllers\Admins\AdminController::class, 'updateCategory'])->name('admins.updatecategory');
    Route::post('/edit-category/{id}', [App\Http\Controllers\Admins\AdminController::class, 'editCategory'])->name('admins.editcategory');
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deletecategory'])->name('admins.deletecategory');
    Route::get('/products', [App\Http\Controllers\Admins\AdminController::class, 'allProducts'])->name('products.page');
    Route::get('/delete-product/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deleteProduct'])->name('products.delete');
    Route::get('/create-product', [App\Http\Controllers\Admins\AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/create-product', [App\Http\Controllers\Admins\AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/orders', [App\Http\Controllers\Admins\AdminController::class, 'allOrders'])->name('products.orders');
    Route::get('/edit-orders/{id}', [App\Http\Controllers\Admins\AdminController::class, 'editOrders'])->name('orders.edit');
    Route::post('/update-orders/{id}', [App\Http\Controllers\Admins\AdminController::class, 'updateOrders'])->name('orders.update');
});
// Admin Panel 
Route::get('admin/login', [App\Http\Controllers\Admins\AdminController::class, 'adminLogin'])->name('view.login')->middleware('check.admin.login');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminController::class, 'checkLogin'])->name('check.login')->middleware('check.admin.login');


// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/admin/logout', [App\Http\Controllers\Admins\AdminController::class, 'logout'])->name('admin.logout');

