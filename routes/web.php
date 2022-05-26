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

Route::get('/article/{new}', 'PostController@postAction')->name('article');

Route::any('/course', 'MainController@courseAction')->name('course');
Route::get('/lesson/{id}', 'CourseController@lessonAction')->name('lesson');

# Маршруты добавленные пакетами UI
Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('user.profile');

# Маршруты с правами доступа для администратора
Route::middleware(['role:admin'])->prefix('admin')->group(function (){
    Route::get('/panel', [App\Http\Controllers\Admin\HomeController::class, 'indexAction'])->name('homeAdmin');

    Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'articlesAction'])->name('articlesList');

    Route::get('/articles/add', [App\Http\Controllers\Admin\ArticleController::class, 'articlesAddAction'])->name('articlesAdd');
    Route::post('/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('articleCreate');
    Route::any('/articles/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'articlesEditAction'])->name('articleEdit');
    Route::any('/articles/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('article.delete');
});

# Почта
Route::get('/mail', [App\Http\Controllers\MailController::class, 'sendMail'])->name('mail.send');
