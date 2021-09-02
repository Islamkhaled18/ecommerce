<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    
    // ->middleware('VerifiedUser');



    Route::group(['namespace' => 'Site', 'middleware' => ['auth','VerifiedUser']], function () {
                // must be authenticated user
        Route::get('profile', function () {
            return 'You Are Authenticated ';
        });
    });

    Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
        // must be authenticated user
        Route::post('verify-user/', 'VerificationCodeController@verify')->name('verify-user');
        Route::get('verify', 'VerificationCodeController@getVerifyPage')->name('get.verification.form');
    });

    Route::group(['namespace' => 'Site','middleware' => 'auth'], function () {
        //guest  user
        Route::get('/','HomeController@home') -> name('home');
        Route::get('category/{slug}' ,'CategoryController@productsBySlug')->name('category');
        Route::get('product/{slug}','ProductController@productsBySlug')->name('product.details');
        Route::post('wishlist','WishListController@store')->name('wishlist.store');
        Route::post('wishlist/products','WishListController@index')->name('wishlist.products.index');
        Route::delete('wishlist', 'WishlistController@destroy')->name('wishlist.destroy');
        Route::get('payment/{amount}', 'PaymentController@getPayments') -> name('payment');
        Route::post('payment', 'PaymentController@processPayment') -> name('payment.process');

    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', 'CartController@getIndex')->name('site.cart.index');
        Route::post('/cart/add/{slug?}', 'CartController@postAdd')->name('site.cart.add');
        Route::post('/update/{slug}', 'CartController@postUpdate')->name('site.cart.update');
        Route::post('/update-all', 'CartController@postUpdateAll')->name('site.cart.update-all');
    });



});
