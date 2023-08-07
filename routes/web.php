<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\BillController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderClientController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [HomeController::class,'index']);

Route::get('/contact', function () {
    return view('client.contact');
});
Route::get('/sale', function () {
    return view('client.sale');
});
Route::get('/detail', function () {
    return view('client.detail');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');
Route::middleware('auth')->group(function () {

    Route::resource('/order',OrderClientController::class);
    Route::resource('/cart',CartController::class);
    Route::resource('/bill',BillController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories',CategoryController::class);
    Route::resource('colors',ColorController::class);
    Route::resource('products',ProductController::class);
    Route::resource('banners',BannerController::class);
    Route::resource('sales',SaleController::class);
    Route::resource('orders',OrderController::class);
    Route::resource('images',ImageController::class);
    Route::resource('catepro',CategoryProductController::class);
    Route::resource('users',UserController::class);
    Route::resource('productdetails',ProductDetailController::class)->except(['destroy,edit','update','show']);
    Route::patch('/productdetails/updatestatus/{id}',[ProductDetailController::class,'updateStatus'])->name('productdetails.updatestatus');
    Route::patch('/order/updatestatus/{id}',[OrderController::class,'updateStatus'])->name('order.updatestatus');
});
Route::prefix('admin')->group(function () {
    Route::get('/',function(){
        return view('admin.index');
    });
});
require __DIR__.'/auth.php';
