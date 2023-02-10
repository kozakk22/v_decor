<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/delivery', [App\Http\Controllers\DeliveryController::class, 'index'])->name('delivery');
Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');
Route::get('/{good}/card', [App\Http\Controllers\CardController::class, 'card'])->name('card');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::post('/order_cart', [App\Http\Controllers\OrderController::class, 'order_cart'])->name('order_cart');
Route::post('/{good}/order_card', [App\Http\Controllers\OrderController::class, 'order_card'])->name('order_card');
Route::post('/order_call', [App\Http\Controllers\OrderController::class, 'order_call'])->name('order_call');
Route::get('/{good}/delete_cart', [App\Http\Controllers\OrderController::class, 'delete_cart'])->name('delete_cart');
Route::get('/thanks', [App\Http\Controllers\ThanksController::class, 'index'])->name('thanks');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\Orders\IndexOrdersController::class, 'index'])->name('admin.orders.index');
    Route::prefix('goods')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\Goods\IndexGoodsController::class, 'index'])->name('admin.goods.index');
        Route::get('/create', [App\Http\Controllers\Admin\Goods\CreateGoodController::class, 'create'])->name('admin.goods.create');
        Route::post('/', [App\Http\Controllers\Admin\Goods\StoreGoodController::class, 'store'])->name('admin.goods.store');
        Route::get('/{good}/edit', [App\Http\Controllers\Admin\Goods\EditGoodController::class, 'edit'])->name('admin.goods.edit');
        Route::patch('/{good}', [App\Http\Controllers\Admin\Goods\UpdateGoodController::class, 'update'])->name('admin.goods.update');
        Route::delete('/{good}', [App\Http\Controllers\Admin\Goods\DestroyGoodController::class, 'destroy'])->name('admin.goods.destroy');
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\Orders\IndexOrdersController::class, 'index'])->name('admin.orders.index');
        Route::get('/switch', [App\Http\Controllers\Admin\Orders\SwitchOrdersController::class, 'switch'])->name('admin.orders.switch');
        Route::get('/{order}/edit', [App\Http\Controllers\Admin\Orders\EditOrderController::class, 'edit'])->name('admin.orders.edit');
        Route::patch('/{order}', [App\Http\Controllers\Admin\Orders\UpdateOrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/{order}', [App\Http\Controllers\Admin\Orders\DestroyOrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
    Route::prefix('shop')->group(function () {
        Route::get('/{shop}/edit', [App\Http\Controllers\Admin\Shop\EditShopController::class, 'edit'])->name('admin.shop.edit');
        Route::patch('/{shop}', [App\Http\Controllers\Admin\Shop\UpdateShopController::class, 'update'])->name('admin.shop.update');
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\Categories\IndexCategoriesController::class, 'index'])->name('admin.categories.index');
        Route::patch('/{category}', [App\Http\Controllers\Admin\Categories\UpdateCategoriesController::class, 'update'])->name('admin.categories.update');
    });
    Route::prefix('customers')->group(function () {
        Route::patch('/{customer}', [App\Http\Controllers\Admin\Customers\UpdateCustomerController::class, 'update'])->name('admin.customers.update');
    });
    Route::prefix('subcategories')->group(function () {
        Route::post('/', [App\Http\Controllers\Admin\Subcategories\StoreSubcategoriesController::class, 'store'])->name('admin.subcategories.store');
        Route::patch('/{subcategory}', [App\Http\Controllers\Admin\SubCategories\UpdateSubcategoriesController::class, 'update'])->name('admin.subcategories.update');
        Route::delete('/{subcategory}', [App\Http\Controllers\Admin\SubCategories\DestroySubCategoriesController::class, 'destroy'])->name('admin.subcategories.destroy');
    });
});

Auth::routes();


