<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\blogs\BlogsController;
use App\Http\Controllers\books\BookController;
use App\Http\Controllers\categories\CategoryController;
use App\Http\Controllers\front_end\frontEndController;
use App\Http\Controllers\Latest_books\Latest_booksController;
use App\Http\Controllers\warehouses\WareController;
use App\Http\Controllers\warehouses_stock\StockController;
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

Route::get('/', function () {
    return view('front_end.landing');
})->name('front_end/home');



Auth::routes();


//login route
Route::get('/loginFront_end', [LoginController::class , 'index'])->name('loginPage');

//home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category controller
Route::resource('/categories' , CategoryController::class);

//books controller
Route::resource('/books', BookController::class);
Route::get('getBooks/{id}', [BookController::class , 'getBooks'])->name('getBooks');

//warehouses controller
Route::resource('/warehouses', WareController::class);

//ware_stock controller
Route::resource('/ware_stock' , StockController::class);

//blogeBackEnd
Route::resource('/blogeBackEnd' , BlogsController::class);

//Latest_books
Route::resource('/Latest_books', Latest_booksController::class);

//***************************************************************************************************** */
// ************************************Front End Route************************************************* */
// **************************************************************************************************** */

Route::name('front_end/')->group(function () {
    Route::get('about' , [frontEndController::class , 'about'])->name('about');

    Route::get('blogs' , [frontEndController::class , 'blogs'])->name('blogs');

    Route::get('blog_detail/{id}' , [frontEndController::class , 'blog_detail'])->name('blog_detail');

    Route::get('shop' , [frontEndController::class , 'shop'])->name('shop');

    Route::get('shop_detail/{id}' , [frontEndController::class , 'shop_detail'])->name('shop_detail');

    Route::get('show_category/{id}' , [frontEndController::class , 'show_category'])->name('show_category');

    Route::get('live_search/{id}' , [frontEndController::class , 'live_search'])->name('live_search');

    Route::get('add_to_cart/{id}' , [ frontEndController::class , 'add_to_cart'])->name('add_to_cart');

    Route::get('check_out/{id}' , [frontEndController::class , 'check_out'])->name('check_out');
});