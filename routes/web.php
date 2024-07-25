<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\blogs\BlogsController;
use App\Http\Controllers\books\BookController;
use App\Http\Controllers\categories\CategoryController;
use App\Http\Controllers\front_end\frontEndController;
use App\Http\Controllers\Latest_books\Latest_booksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\warehouses\WareController;
use App\Http\Controllers\warehouses_stock\StockController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

//Register
Route::get('/registerFront_end' , [RegisterController::class , 'index'])->name('registerFront_end');

//home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function(){
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

    //users
    Route::resource('/users' , UserController::class);

    //roles
    Route::resource('/roles' , RoleController::class);

    //profile
    Route::get('/user_profile/{id}',[UserController::class ,'user_profile'])->name('user_profile');

    //update_user_profile
    Route::post('/update_user/{id}',[UserController::class , 'update_user'])->name('update_user');

    //route to manage cart
    Route::get('/show_cart' , [frontEndController::class , 'show_cart'])->name('show_cart');
});


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

    Route::post('add_to_cart/{id}' , [ frontEndController::class , 'add_to_cart'])->name('add_to_cart');

    Route::get('check_out/{id}' , [frontEndController::class , 'check_out'])->name('check_out');

    Route::get('latest_books', [frontEndController::class , 'getLatestBooks'])->name('latest_books');
});

// require __DIR__.'/auth.php';
