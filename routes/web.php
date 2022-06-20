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

Route::get('/print', 'App\Http\Controllers\OrderController@print')->name('print');

Route::get('/order_show', 'App\Http\Controllers\OrderController@getOrder')->name('getOrder');

Route::any('/letBuy', 'App\Http\Controllers\OrderController@letBuy')->name('letBuy');

Route::get('/sendSMS', 'App\Http\Controllers\OrderController@sendSMS')->name('sendSMS');

Route::any('/daemon', 'App\Http\Controllers\Daemon@index')->name('daemon');

//Route::any('/pay', [App\Http\Controllers\Payment\PaymentController::class, 'payCreate'])->name('pay.create');
Route::any('/pay/callback', [App\Http\Controllers\Payment\PaymentController::class, 'payCallback'])->name('pay.callback');

Auth::routes();

Route::middleware(['auth'])->prefix('home')->group( function(){
    Route::get('/', 'App\Http\Controllers\AdminController@getPanel')->name('admin.home');
    Route::get('/add', 'App\Http\Controllers\AdminController@getAdder')->name('admin.add');
    Route::get('/print', 'App\Http\Controllers\AdminController@getPrint')->name('admin.print');
    Route::get('/edit', 'App\Http\Controllers\AdminController@getEditor')->name('admin.edit');
    Route::any('/letEdit', 'App\Http\Controllers\AdminController@letEdit')->name('admin.letEdit');
    Route::get('/delete', 'App\Http\Controllers\AdminController@delOrder')->name('admin.delete');
    Route::get('/last', 'App\Http\Controllers\AdminController@lastOrders')->name('admin.last');
    Route::get('/tripsManagement', 'App\Http\Controllers\AdminController@tripsManagement')->name('admin.tripsManagement');
    Route::get('/letEditTrip', 'App\Http\Controllers\AdminController@letEditTrip')->name('admin.letEditTrip');

    Route::any('/booking', 'App\Http\Controllers\OrderController@letBooking')->name('letBooking');
});


Route::middleware(['auth'])->prefix('dev')->group( function(){
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


