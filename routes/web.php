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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes([
    'verify' => true,
]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/users/{user}/delete', 'UserController@delete')->name('users.delete');
    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::get('/auditing', 'AuditController@auditing')->name('auditing.index');
});
