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

//Route::get('/{var?}', 'HomeController@index')->name('home');

Route::get('/category/{var?}', 'HomeController@index')->name('home');
Route::get('/product/{var?}', 'HomeController@index')->name('home');
Route::get('/order/{var?}', 'HomeController@index')->name('order');
Route::get('/contact', 'HomeController@index')->name('contact.index');
Route::post('/contact', 'HomeController@index')->name('contact.post');

$adminPathPrefix = 'admin';

Route::middleware(['role:admin', 'auth'])->namespace('Admin\\')->name('admin.')->prefix($adminPathPrefix)->group(function () {
    Route::get('/', 'DashboardController')->name('dashboard');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/products', 'ProductController');
    Route::resource('/orders', 'PageController');
    Route::resource('/text-manager', 'textController')->except(['edit', 'show', 'delete']);
    Route::resource('/pages', 'PageController');
    Route::get('/menus', 'MenuController@index')->name('menu.index');
    Route::get('/activity-log', 'ActivityController@index')->name('activity.index');
    Route::resource('/filemanager', 'FileManagerController')->only(['index']);
});

Route::group(['prefix' => '/laravel-filemanager', 'middleware' => ['web', 'role:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get($adminPathPrefix.'/login', 'Admin\LoginController@login')->name('admin.login');

Route::get('/password/reset', 'Admin\LoginController@showLinkRequestForm')->name('password.request');
Route::get('/password/reset/{token}', 'Admin\LoginController@showResetForm')->name('password.reset');

/**
 * Login Route(s)
 */
Route::post($adminPathPrefix.'/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Password Reset Route(S)
 */
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

