<?php

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

Route::get('/', function () {
    return view('welcome');
});


//User

Route::get('sale', 'SaleController@index');
Route::get('sale/{sale}', 'SaleController@show');
Route::get('lease', 'LeaseController@index');
Route::get('lease/{lease}', 'LeaseController@show');
Route::get('kharkov/sale', 'KharkovSaleController@index');
Route::get('kharkov/sale/{sale}', 'KharkovSaleController@show');
Route::get('kharkov/lease', 'KharkovLeaseController@index');
Route::get('kharkov/lease/{lease}', 'KharkovLeaseController@show');
Route::get('abroad/sale', 'AbroadSaleController@index');
Route::get('abroad/sale/{sale}', 'AbroadSaleController@show');
Route::get('abroad/lease', 'AbroadLeaseController@index');
Route::get('abroad/lease/{lease}', 'AbroadLeaseController@show');
Route::get('news', 'NewsController@index');
Route::get('news/{new}', 'NewsController@show');
Route::get('event', 'EventController@index');
Route::get('event/{event}', 'EventController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('google', function () {

    return view('google');

});

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');

Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('vkauth', function (\ATehnix\VkClient\Auth $auth) {
    echo "<a href='{$auth->getUrl()}'> Войти через VK.Com </a><hr>";


    if (Request::exists('code')) {
        dd($auth);
        echo 'Token: '.$auth->getToken(Request::get('code'));
    }
});
