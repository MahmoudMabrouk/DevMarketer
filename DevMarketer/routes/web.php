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
    return redirect('/home');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function (){
    Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function(){

        Route::get('/','ManageController@index');
        Route::get('/dashboard','ManageController@dashboard')->name('manage.dashboard');
        Route::resource('/users','UserController');
        Route::resource('/permission','PermissionController')->except('destroy');
        Route::resource('/role','RoleController')->except('destroy');
        Route::resource('/post','PostController');
        Route::get('/post/storeImage/{id}','Postcontroller@storeImage');
    });


    Route::any('/logout','Auth\LoginController@logout');
});
Route::get('/home', 'HomeController@index')->name('home');
