<?php

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

Route::get('/', function () {
    return view('pages.main');
});
Route::get('/tickets', function () {
    return view('pages.tickets');
});
Route::get('/places', function () {
    return view('pages.places');
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
        Artisan::call('migrate'); //возможно, это не безопасно, надо выяснить или нужно удалить при продакшене
        return "Миграции выполнены";
    });
    Route::get('rollback', function () {
        Artisan::call('migrate:rollback');  //возможно, это не безопасно, надо выяснить или нужно удалить при продакшене
        return "Миграции откачены";
    });
});
