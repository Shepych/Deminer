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

Route::get('/', 'MainController@indexAction');

Route::get('/article/{new}', 'PostController@postAction');

Route::get('/course', 'MainController@courseAction');

# Маршруты добавленные пакетами UI
Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('user.profile');

# Маршруты с правами доступа для администратора
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/test', function () {
        return view('test');
    });
});
