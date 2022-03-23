<?php

use Illuminate\Support\Facades\Artisan;
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


Route::get('/', 'App\Http\Controllers\TripsController@getAll')->name('index');

Route::get('/tickets_list', 'App\Http\Controllers\TripsController@getTrip')->name('tickets');

Route::get('/places', 'App\Http\Controllers\PlacesController@getPlaces')->name('places');

Route::post('/order', 'App\Http\Controllers\OrderController@letOrder')->name('letOrder');

Route::get('/print', 'App\Http\Controllers\OrderController@print')->name('print');

Route::get('/order_show', 'App\Http\Controllers\OrderController@getOrder')->name('getOrder');

Route::get('/sendSMS', 'App\Http\Controllers\OrderController@sendSMS')->name('sendSMS');




Auth::routes();


Route::middleware(['role:admin'])->prefix('home')->group( function(){
    Route::get('/', 'App\Http\Controllers\AdminController@getPanel')->name('admin.home');
    Route::get('/add', 'App\Http\Controllers\AdminController@getAdder')->name('admin.add');
    Route::get('/print', 'App\Http\Controllers\AdminController@getPrint')->name('admin.print');
});





Route::group(['prefix'=> 'dev'], function (){
    Route::get('clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return "Кэш очищен.";
    });
    Route::get('migrate', function () {
        Artisan::call('migrate'); //возможно, это не безопасно, надо выяснить или удалить при продакшене
        return "Миграции выполнены";
    });
    Route::get('seed', function () {
        Artisan::call('db:seed'); //возможно, это не безопасно, надо выяснить или удалить при продакшене
        return "Посев выполнен";
    });
    Route::get('rollback', function () {
        Artisan::call('migrate:rollback');  //возможно, это не безопасно, надо выяснить или удалить при продакшене
        return "Миграции откачены";
    });
});


