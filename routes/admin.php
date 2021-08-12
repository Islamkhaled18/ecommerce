<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
    {
        
        Route::group(['namespace' => 'Dashboard' , 'middleware' => 'auth:admin' , 'prefix' => 'admin'], function () {


            Route::get('/','DashboardController@index')->name('admin.dashboard'); // the first page admin visits after login
            Route::get('logout','LoginController@logout')->name('admin.logout');

            Route::group(['prefix'=>'settings'], function (){
                
                Route::get('shipping-methods/{type}' , 'SettingsController@editShippingMethods')->name('edit.shippings.methods');
                Route::put('shipping-methods/{id}' , 'SettingsController@updateShippingMethods')->name('update.shippings.methods');


            });//route for all settings

        });



        Route::group(['namespace' => 'Dashboard' , 'middleware' => 'guest:admin','prefix' => 'admin'], function () {

            Route::get('login','LoginController@login')->name('admin.login');
            Route::post('login','LoginController@postlogin')->name('admin.post.login');


        });

});

