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

mb_internal_encoding("UTF-8");

Route::get('/', 'App\Http\Controllers\TripsController@getAll')->name('index');

//Левое
Route::get('/random_time', 'App\Http\Controllers\TripsController@get_random_time')->name('random_time');

Route::get('/tickets_list', 'App\Http\Controllers\TripsController@getTrip')->name('tickets');
Route::get('/places', 'App\Http\Controllers\PlacesController@getPlaces')->name('places');
Route::get('/print', 'App\Http\Controllers\OrderController@print')->name('print');
Route::get('/order_show', 'App\Http\Controllers\OrderController@getOrder')->name('getOrder');
Route::any('/checkEmpty', 'App\Http\Controllers\OrderController@checkEmpty')->name('checkEmpty');
Route::any('/letBuy', 'App\Http\Controllers\OrderController@letBuy')->name('letBuy');
Route::any('/RefundPage', 'App\Http\Controllers\OrderController@RefundPage')->name('RefundPage');
Route::any('/letRefund', 'App\Http\Controllers\OrderController@letRefund')->name('letRefund');
Route::get('/sendSMS', 'App\Http\Controllers\OrderController@sendSMS')->name('sendSMS');

Route::any('/pay/callback', [App\Http\Controllers\Payment\PaymentController::class, 'payCallback'])->name('pay.callback');

Auth::routes();
Route::get('/auth', 'App\Http\Controllers\lk\UserAuthController@index')->name('UserAuth');
Route::middleware(['auth'])->prefix('lk')->group( function(){
    Route::get('/', 'App\Http\Controllers\lk\UserPanelController@index')->name('lk');
});

Route::middleware(['role:admin|agent'])->prefix('home')->group( function(){
    Route::get('/', 'App\Http\Controllers\AdminController@getPanel')->name('admin.home');
    Route::get('/add', 'App\Http\Controllers\AdminController@getAdder')->name('admin.add');
    Route::get('/print', 'App\Http\Controllers\AdminController@getPrint')->name('admin.print');
    Route::get('/exel', 'App\Http\Controllers\AdminController@getExel')->name('admin.exel');
    Route::get('/edit', 'App\Http\Controllers\AdminController@getEditor')->name('admin.edit');
    Route::any('/letEdit', 'App\Http\Controllers\AdminController@letEdit')->name('admin.letEdit');
    Route::get('/delete', 'App\Http\Controllers\AdminController@delOrder')->name('admin.delete');
    Route::get('/restore', 'App\Http\Controllers\AdminController@restore')->name('admin.restore');
    Route::get('/showDeleted', 'App\Http\Controllers\AdminController@getDeleted')->name('admin.showDeleted');
    Route::get('/last', 'App\Http\Controllers\AdminController@lastOrders')->name('admin.last');
    Route::get('/tripsManagement', 'App\Http\Controllers\AdminController@tripsManagement')->name('admin.tripsManagement');
    Route::get('/letEditTrip', 'App\Http\Controllers\AdminController@letEditTrip')->name('admin.letEditTrip');
    Route::any('/booking', 'App\Http\Controllers\OrderController@letBooking')->name('letBooking');
});

Route::any('/daemon', 'App\Http\Controllers\Daemon@index')->name('daemon');
Route::any('/console', 'App\Http\Controllers\Console@index')->name('console');
Route::middleware(['role:admin'])->prefix('dev')->group( function(){
    Route::get('clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return "Кэш очищен.";
    });
//     Route::get('migrate', function () {
//         Artisan::call('migrate'); //возможно, это не безопасно, надо выяснить или удалить при продакшене
//         return "Миграции выполнены";
//     });
//     Route::get('seed', function () {
//         Artisan::call('db:seed'); //возможно, это не безопасно, надо выяснить или удалить при продакшене
//         return "Посев выполнен";
//     });
//     Route::get('rollback', function () {
//         Artisan::call('migrate:rollback');  //возможно, это не безопасно, надо выяснить или удалить при продакшене
//         return "Миграции откачены";
//     });
});


