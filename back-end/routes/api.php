<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

//Authorized user

Route::get('/auth/user/sale', 'SaleController@index')->middleware(['auth:api']);
Route::get('/auth/user/sale/{sale}', 'SaleController@show')->middleware(['auth:api']);
Route::get('/auth/user/lease', 'LeaseController@index')->middleware(['auth:api']);
Route::get('/auth/user/lease/{lease}', 'LeaseController@show')->middleware(['auth:api']);
Route::get('/auth/user/kharkov/sale', 'KharkovSaleController@index')->middleware(['auth:api']);
Route::get('/auth/user/kharkov/sale/{sale}', 'KharkovSaleController@show')->middleware(['auth:api']);
Route::get('/auth/user/kharkov/lease', 'KharkovLeaseController@index')->middleware(['auth:api']);
Route::get('/auth/user/kharkov/lease/{lease}', 'KharkovLeaseController@show')->middleware(['auth:api']);
Route::get('/auth/user/abroad/sale', 'AbroadSaleController@index')->middleware(['auth:api']);
Route::get('/auth/user/abroad/sale/{sale}', 'AbroadSaleController@show')->middleware(['auth:api']);
Route::get('/auth/user/abroad/lease', 'AbroadLeaseController@index')->middleware(['auth:api']);
Route::get('/auth/user/abroad/lease/{lease}', 'AbroadLeaseController@show')->middleware(['auth:api']);
Route::get('/auth/user/news', 'NewsController@index')->middleware(['auth:api']);
Route::get('/auth/user/news/{new}', 'NewsController@show')->middleware(['auth:api']);
Route::get('/auth/user/event', 'EventController@index')->middleware(['auth:api']);
Route::get('/auth/user/event/{event}', 'EventController@show')->middleware(['auth:api']);

Route::post('/auth/user/apartment', 'ApartmentController@story')->middleware(['auth:api']);
Route::post('/auth/user/news', 'NewsController@story')->middleware(['auth:api']);
Route::post('/auth/user/event', 'EventController@story')->middleware(['auth:api']);
Route::post('/auth/user/image_news', 'ImageNewsController@story')->middleware(['auth:api']);
Route::post('/auth/user/image_events', 'ImageEventsController@story')->middleware(['auth:api']);
Route::post('/auth/user/image_apartments', 'ImageApartmentController@story')->middleware(['auth:api']);
Route::post('/auth/user/facilities', 'FacilitiesController@story')->middleware(['auth:api']);

Route::put('/auth/user/apartment/{apartment}', 'ApartmentController@update')->middleware(['auth:api']);
Route::put('/auth/user/news/{new}', 'NewsController@update')->middleware(['auth:api']);
Route::put('/auth/user/event/{new}', 'EventController@update')->middleware(['auth:api']);
Route::put('/auth/user/image_news/{image}', 'ImageNewsController@update')->middleware(['auth:api']);
Route::put('/auth/user/image_events/{image}', 'ImageEventsController@update')->middleware(['auth:api']);
Route::put('/auth/user/image_apartments/{image}', 'ImageApartmentController@update')->middleware(['auth:api']);
Route::put('/auth/user/facilities/{facility}', 'FacilitiesController@update')->middleware(['auth:api']);

Route::delete('/auth/user/apartment/{apartment}', 'ApartmentController@delete')->middleware(['auth:api']);
Route::delete('/auth/user/news/{new}', 'NewsController@delete')->middleware(['auth:api']);
Route::delete('/auth/user/event/{new}', 'EventControllerController@delete')->middleware(['auth:api']);
Route::delete('/auth/user/image_news/{image}', 'ImageNewsController@delete')->middleware(['auth:api']);
Route::delete('/auth/user/image_events/{image}', 'ImageEventsController@delete')->middleware(['auth:api']);
Route::delete('/auth/user/image_apartments/{image}', 'ImageApartmentController@delete')->middleware(['auth:api']);
Route::delete('/auth/user/facilities/{facility}', 'FacilitiesController@delete')->middleware(['auth:api']);

Route::put('/auth/user', 'AuthController@update_user')->middleware('auth:api');
//Admin

Route::post('/auth/user/{user}/moderator', 'AuthController@moderator')->middleware(['auth:api','admin']);
Route::post('/auth/user/{user}/unmoderator', 'AuthController@unmoderator')->middleware(['auth:api','admin']);

Route::get('/auth/admin/sale', 'SaleController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/sale/{sale}', 'SaleController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/lease', 'LeaseController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/lease/{lease}', 'LeaseController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/kharkov/sale', 'KharkovSaleController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/kharkov/sale/{sale}', 'KharkovSaleController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/kharkov/lease', 'KharkovLeaseController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/kharkov/lease/{lease}', 'KharkovLeaseController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/abroad/sale', 'AbroadSaleController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/abroad/sale/{sale}', 'AbroadSaleController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/abroad/lease', 'AbroadLeaseController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/abroad/lease/{lease}', 'AbroadLeaseController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/news', 'NewsController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/news/{new}', 'NewsController@show')->middleware(['auth:api','admin']);
Route::get('/auth/admin/event', 'EventController@index')->middleware(['auth:api','admin']);
Route::get('/auth/admin/event/{event}', 'EventController@show')->middleware(['auth:api','admin']);

Route::post('/auth/admin/apartment', 'ApartmentController@story')->middleware(['auth:api','admin']);
Route::post('/auth/admin/news', 'NewsController@story')->middleware(['auth:api','admin']);
Route::post('/auth/admin/event', 'EventController@story')->middleware(['auth:api','admin']);
Route::post('/auth/admin/image_news', 'ImageNewsController@story')->middleware(['auth:api','admin']);
Route::post('/auth/admin/image_events', 'ImageEventsController@story')->middleware(['auth:api','admin']);
Route::post('/auth/admin/image_apartments', 'ImageApartmentController@story')->middleware(['auth:api','admin']);
Route::post('/auth/admin/facilities', 'FacilitiesController@story')->middleware(['auth:api','admin']);

Route::put('/auth/admin/apartment/{apartment}', 'AdminController@apartment_update')->middleware(['auth:api','admin']);
Route::put('/auth/admin/news/{new}', 'AdminController@new_update')->middleware(['auth:api','admin']);
Route::put('/auth/admin/event/{new}', 'AdminController@event_update')->middleware(['auth:api','admin']);
Route::put('/auth/admin/image_news/{image}', 'AdminController@image_news_update')->middleware(['auth:api','admin']);
Route::put('/auth/admin/image_events/{image}', 'AdminController@image_events_update')->middleware(['auth:api','admin']);
Route::put('/auth/admin/image_apartments/{image}', 'AdminController@image_apartments_update')->middleware(['auth:api','admin']);
Route::put('/auth/admin/facilities/{facility}', 'AdminController@facilities_update')->middleware(['auth:api','admin']);

Route::delete('/auth/admin/apartment/{apartment}', 'AdminController@apartment_delete')->middleware(['auth:api','admin']);
Route::delete('/auth/admin/news/{new}', 'AdminController@new_delete')->middleware(['auth:api','admin']);
Route::delete('/auth/admin/event/{event}', 'AdminController@event_delete')->middleware(['auth:api','admin']);
Route::delete('/auth/admin/image_news/{image}', 'AdminController@image_news_delete')->middleware(['auth:api','admin']);
Route::delete('/auth/admin/image_events/{image}', 'AdminController@image_events_delete')->middleware(['auth:api','admin']);
Route::delete('/auth/admin/image_apartments/{image}', 'AdminController@image_apartments_delete')->middleware(['auth:api','admin']);
Route::delete('/auth/admin/facilities/{facility}', 'AdminController@facility_delete')->middleware(['auth:api','admin']);

Route::post('/auth/admin/events/{event}/active', 'AdminController@events_active')->middleware(['auth:api','admin']);
Route::post('/auth/admin/news/{new}/active', 'AdminController@news_active')->middleware(['auth:api','admin']);
Route::post('/auth/admin/apartment/{apartment}/active', 'AdminController@apartment_active')->middleware(['auth:api','admin']);

Route::post('/auth/admin/events/{event}/deactive', 'AdminController@events_deactive')->middleware(['auth:api','admin']);
Route::post('/auth/admin/news/{new}/deactive', 'AdminController@news_deactive')->middleware(['auth:api','admin']);
Route::post('/auth/admin/apartment/{apartment}/deactive', 'AdminController@apartment_deactive')->middleware(['auth:api','admin']);

//Moderator

Route::get('/auth/moderator/sale', 'SaleController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/sale/{sale}', 'SaleController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/lease', 'LeaseController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/lease/{lease}', 'LeaseController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/kharkov/sale', 'KharkovSaleController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/kharkov/sale/{sale}', 'KharkovSaleController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/kharkov/lease', 'KharkovLeaseController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/kharkov/lease/{lease}', 'KharkovLeaseController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/abroad/sale', 'AbroadSaleController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/abroad/sale/{sale}', 'AbroadSaleController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/abroad/lease', 'AbroadLeaseController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/abroad/lease/{lease}', 'AbroadLeaseController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/news', 'NewsController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/news/{new}', 'NewsController@show')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/event', 'EventController@index')->middleware(['auth:api','moderator']);
Route::get('/auth/moderator/event/{event}', 'EventController@show')->middleware(['auth:api','moderator']);

Route::post('/auth/moderator/apartment', 'ApartmentController@story')->middleware(['auth:api','moderator']);
Route::post('/auth/moderator/news', 'NewsController@story')->middleware(['auth:api','moderator']);
Route::post('/auth/moderator/event', 'EventController@story')->middleware(['auth:api','moderator']);
Route::post('/auth/moderator/image_news', 'ImageNewsController@story')->middleware(['auth:api','moderator']);
Route::post('/auth/moderator/image_events', 'ImageEventsController@story')->middleware(['auth:api','moderator']);
Route::post('/auth/moderator/image_apartments', 'ImageApartmentController@story')->middleware(['auth:api','moderator']);
Route::post('/auth/moderator  /facilities', 'FacilitiesController@story')->middleware(['auth:api','moderator']);

Route::put('/auth/moderator/apartment/{apartment}', 'ModeratorController@apartment_update')->middleware(['auth:api','moderator']);
Route::put('/auth/moderator/news/{new}', 'ModeratorController@news_update')->middleware(['auth:api','moderator']);
Route::put('/auth/moderator/event/{new}', 'ModeratorController@event_update')->middleware(['auth:api','moderator']);
Route::put('/auth/moderator/image_news/{image}', 'ModeratorController@image_news_update')->middleware(['auth:api','moderator']);
Route::put('/auth/moderator/image_events/{image}', 'ModeratorController@image_events_update')->middleware(['auth:api','moderator']);
Route::put('/auth/moderator/image_apartments/{image}', 'ModeratorController@image_apartments_update')->middleware(['auth:api','moderator']);
Route::put('/auth/moderator/facilities/{facility}', 'ModeratorController@facilities_update')->middleware(['auth:api','moderator']);

Route::delete('/auth/moderator/apartment/{apartment}', 'ModeratorController@apartment_delete')->middleware(['auth:api','moderator']);
Route::delete('/auth/moderator/news/{new}', 'ModeratorController@news_delete')->middleware(['auth:api','moderator']);
Route::delete('/auth/moderator/event/{event}', 'ModeratorController@events_delete')->middleware(['auth:api','moderator']);
Route::delete('/auth/moderator/image_news/{image}', 'ModeratorController@image_news_delete')->middleware(['auth:api','moderator']);
Route::delete('/auth/moderator/image_events/{image}', 'ModeratorController@image_events_delete')->middleware(['auth:api','moderator']);
Route::delete('/auth/moderator/image_apartments/{image}', 'ModeratorController@image_apartments_delete')->middleware(['auth:api','moderator']);
Route::delete('/auth/moderator/facilities/{facility}', 'ModeratorController@facilities_delete')->middleware(['auth:api','moderator']);









//Route::post('/auth/admin/apartment', 'AuthController@apartment_post')->middleware(['auth:api','admin']);
//Route::get('/auth/admin/apartment/{apartment}', 'AuthController@apartment_get')->middleware(['auth:api','admin']);
//Route::get('/auth/admin/apartment', 'AuthController@apartment')->middleware(['auth:api','admin']);
//Route::put('/auth/admin/apartment/{apartment}', 'AuthController@apartment_put')->middleware(['auth:api','admin']);
//Route::delete('/auth/admin/apartment/{apartment}', 'AuthController@apartment_delete')->middleware(['auth:api','admin']);
//
//
//Route::post('/auth/moderator/apartment', 'AuthController@apartment_post')->middleware(['auth:api','moderator']);
//Route::get('/auth/moderator/apartment/{apartment}', 'AuthController@apartment_get')->middleware(['auth:api','moderator']);
//Route::get('/auth/moderator/apartment', 'AuthController@apartment')->middleware(['auth:api','moderator']);
//Route::put('/auth/moderator/apartment/{apartment}', 'AuthController@apartment_put')->middleware(['auth:api','moderator']);
//Route::delete('/auth/moderator/apartment/{apartment}', 'AuthController@apartment_delete')->middleware(['auth:api','moderator']);
//
//
//Route::post('/auth/admin/news', 'AuthController@new_post')->middleware(['auth:api','admin']);
//Route::get('/auth/admin/news/{new}', 'AuthController@new_get')->middleware(['auth:api','admin']);
//Route::get('/auth/admin/news', 'AuthController@new')->middleware(['auth:api','admin']);
//Route::put('/auth/admin/news/{new}', 'AuthController@new_put')->middleware(['auth:api','admin']);
//Route::delete('/auth/admin/news/{new}', 'AuthController@new_delete')->middleware(['auth:api','admin']);
//
//
//Route::post('/auth/moderator/news', 'AuthController@new_post')->middleware(['auth:api','moderator']);
//Route::get('/auth/moderator/news/{new}', 'AuthController@new_get')->middleware(['auth:api','moderator']);
//Route::get('/auth/moderator/news', 'AuthController@new')->middleware(['auth:api','moderator']);
//Route::put('/auth/moderator/news/{new}', 'AuthController@new_put')->middleware(['auth:api','moderator']);
//Route::delete('/auth/moderator/news/{new}', 'AuthController@new_delete')->middleware(['auth:api','moderator']);
//
//
//Route::post('/auth/admin/events', 'AuthController@event_post')->middleware(['auth:api','admin']);
//Route::get('/auth/admin/events/{event}', 'AuthController@event_get')->middleware(['auth:api','admin']);
//Route::get('/auth/admin/events', 'AuthController@event')->middleware(['auth:api','admin']);
//Route::put('/auth/admin/events/{new}', 'AuthController@event_put')->middleware(['auth:api','admin']);
//Route::delete('/auth/admin/events/{event}', 'AuthController@event_delete')->middleware(['auth:api','admin']);
//
//
//Route::post('/auth/moderator/events', 'AuthController@event_post')->middleware(['auth:api','moderator']);
//Route::get('/auth/moderator/events/{event}', 'AuthController@event_get')->middleware(['auth:api','moderator']);
//Route::get('/auth/moderator/events', 'AuthController@event')->middleware(['auth:api','moderator']);
//Route::put('/auth/moderator/events/{new}', 'AuthController@event_put')->middleware(['auth:api','moderator']);
//Route::delete('/auth/moderator/events/{event}', 'AuthController@event_delete')->middleware(['auth:api','moderator']);
//
//Route::post('/auth/admin/events/{event}/active', 'AuthController@events_active')->middleware(['auth:api','admin']);
//Route::post('/auth/admin/news/{new}/active', 'AuthController@news_active')->middleware(['auth:api','admin']);
//Route::post('/auth/admin/apartment/{apartment}/active', 'AuthController@apartment_active')->middleware(['auth:api','admin']);
//
//Route::post('/auth/admin/events/{event}/deactive', 'AuthController@events_deactive')->middleware(['auth:api','admin']);
//Route::post('/auth/admin/news/{new}/deactive', 'AuthController@news_deactive')->middleware(['auth:api','admin']);
//Route::post('/auth/admin/apartment/{apartment}/deactive', 'AuthController@apartment_deactive')->middleware(['auth:api','admin']);


