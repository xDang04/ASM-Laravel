<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\OrderController;

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
    return view('users.login');
});

Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::get('login', [AuthController::class, 'viewLogin'])
    ->name('viewLogin');
Route::get('logout', [AuthController::class, 'logout'])
    ->name('admin.logout');
Route::get('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('add-user', [UserController::class, 'addPostUser'])
    ->name('addPostUser');
Route::get('add-user', [UserController::class, 'addUser'])
    ->name('addUser');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkAdmin'], function () {

    Route::get('dashboard', [UserController::class, 'index'])
        ->name('index');
    Route::get('listOrders', [OrderController::class, 'listOrders'])
    ->name('listOrders');
    Route::get('showOder', [OrderController::class, 'show'])
    ->name('show');
    Route::post('orders/update-status/{id}', [OrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');

    Route::group([
        'prefix' => 'users',
        'as' => 'users.'
    ], function () {
        // CRUD users
        Route::get('list-users', [UserController::class, 'listUsers'])
            ->name('listUsers');





        Route::delete('delete-user', [UserController::class, 'deleteUser'])
            ->name('deleteUser');

        Route::get('update-user/{idUser}', [UserController::class, 'updateUser'])
            ->name('updateUser');
        Route::put('update-user/{idUser}', [UserController::class, 'updatePutUser'])
            ->name('updatePutUser');
    });
    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function () {
        //CRUD products\
        Route::get('/', [ProductController::class, 'listProducts'])
            ->name('listProducts');

        Route::get('add-product', [ProductController::class, 'addProduct'])
            ->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])
            ->name('addPostProduct');

        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])
            ->name('deleteProduct');

        Route::get('showDetail-product/{idProduct}', [ProductController::class, 'detailProduct'])
            ->name('detailProduct');

        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])
            ->name('updateProduct');
        Route::put('update-product/{idProduct}', [ProductController::class, 'updatePutProduct'])
            ->name('updatePutProduct');
    });
    Route::group([
        'prefix' => 'category',
        'as' => 'category.'
    ], function () {
        Route::get('/', [CategoryController::class, 'listCategories'])
            ->name('listCategories');
        Route::get('add-category', [CategoryController::class, 'addCategory'])
            ->name('addCategory');
        Route::post('add-category', [CategoryController::class, 'addPostCategory'])
            ->name('addPostCategory');
        Route::delete('delete-category', [CategoryController::class, 'deleteCategory'])
            ->name('deleteCategory');
        Route::get('update-category/{id_category}', [CategoryController::class, 'updateCategory'])
            ->name('updateCategory');
        Route::put('update-category/{id_category}', [CategoryController::class, 'updatePutCategory'])
            ->name('updatePutCategory');
    });
});


Route::group([
    'prefix' => 'users', 'as' => 'users.'
], function () {
    Route::get('home', [UserController::class, 'home'])
        ->name('home');
    Route::get('search-product', [UserController::class, 'searchProduct'])
        ->name('searchProduct');


    // Route::get('forgot-password', [AuthController::class, 'forgotPassword'])
    // ->name('forgotPassword');
    // Route::post('check-email', [AuthController::class, 'checkEmail'])
    // ->name('checkEmail');
    // Route::post('forgot-password/change-password', [AuthController::class, 'changePassword'])
    // ->name('changePassword');

    Route::get('password/request', [AuthController::class, 'showRequestForm'])
        ->name('password.request');
    Route::post('password/email', [AuthController::class, 'sendResetLink'])
        ->name('password.email');
    Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('password/reset', [AuthController::class, 'resetPassword'])
        ->name('password.update');

    Route::get('/search', [UserController::class, 'searchByCategory'])->name('search.category');


    Route::get('/cart', [CartController::class, 'viewCart'])
        ->name('cart.viewCart');
    Route::post('/cart/add/{id}', [CartController::class, 'addProductToCart'])
        ->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])
        ->name('cart.update');
});
