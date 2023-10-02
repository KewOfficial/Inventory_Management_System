<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // Import DashboardController
use App\Http\Controllers\ProductController;  // Import ProductController
use App\Http\Controllers\SaleController;     // Import SaleController
use App\Http\Controllers\RestockController;  // Import RestockController
use App\Http\Controllers\PurchaseController; // Import PurchaseController
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
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
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // Assuming this is your "contact" page.
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact-form', [ContactFormController::class, 'showContactForm'])->name('contact-form'); // Use a different name.
Route::post('/contact-form', [ContactFormController::class, 'submitContactForm']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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



Route::get('/landing', [HomeController::class, 'landing'])->name('landing');

// web.php




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/product/{product_id}', [ProductController::class, 'showSingleProduct'])->name('products.single');

    });
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::put('/sales/{id}', [SaleController::class, 'update'])->name('sales.update');

    Route::get('/restocks', [RestockController::class, 'index'])->name('restocks.index');
    Route::get('/restocks/create', [RestockController::class, 'create'])->name('restocks.create');
    Route::post('/restocks', [RestockController::class, 'store'])->name('restocks.store');
    Route::get('/restocks/{restock}', [RestockController::class, 'show'])->name('restocks.show');
    Route::delete('/restocks/{restock}', [RestockController::class, 'destroy'])->name('restocks.destroy');

    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('/purchases/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
});
Route::get('/product/{product_id}', [ProductController::class, 'showSingleProduct'])->name('products.single');