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
Route::prefix('/admin')->middleware('admin')->group(function(){
    Route::get('/','App\Http\Controllers\AdminController@index' )->name('admin.index');

    Route::get('/report/manager', 'App\Http\Controllers\ReportController@reportManagerSelect')->name('report.manager.select');
    Route::post('/report/manager', 'App\Http\Controllers\ReportController@reportManager')->name('report.manager');

    Route::get('/report/client', 'App\Http\Controllers\ReportController@reportClientSelect')->name('report.client.select');
    Route::post('/report/client', 'App\Http\Controllers\ReportController@reportClient')->name('report.client');

    Route::get('/report/pickpoint', 'App\Http\Controllers\ReportController@reportPickpointSelect')->name('report.pickpoint.select');
    Route::post('/report/pickpoint', 'App\Http\Controllers\ReportController@reportPickpoint')->name('report.pickpoint');

    Route::get('/report/car', 'App\Http\Controllers\ReportController@reportCarSelect')->name('report.car.select');
    Route::post('/report/car', 'App\Http\Controllers\ReportController@reportCar')->name('report.car');

    Route::get('/cars','App\Http\Controllers\CarController@index')->name('car.index');
    Route::get('/car/create', 'App\Http\Controllers\CarController@create')->name('car.create');
    Route::post('/car/create', 'App\Http\Controllers\CarController@store')->name('car.store');
    Route::get('/car/delete/{id}','App\Http\Controllers\CarController@delete')->name('car.delete');
    Route::get('/car/edit/{id}','App\Http\Controllers\CarController@show')->name('car.show');
    Route::post('/car/edit','App\Http\Controllers\CarController@update')->name('car.update');

    Route::get('/pickpoint', 'App\Http\Controllers\PickpointController@index')->name('pickpoint.index');
    Route::get('/pickpoint/create', 'App\Http\Controllers\PickpointController@create')->name('pickpoint.create');
    Route::post('/pickpoint/create', 'App\Http\Controllers\PickpointController@store')->name('pickpoint.store');
    Route::get('/pickpoint/delete/{id}','App\Http\Controllers\PickpointController@delete')->name('pickpoint.delete');
    Route::get('/pickpoint/edit/{id}','App\Http\Controllers\PickpointController@show')->name('pickpoint.show');
    Route::post('/pickpoint/edit','App\Http\Controllers\PickpointController@update')->name('pickpoint.update');

    Route::get('/users/managers', 'App\Http\Controllers\UserController@showManagers')->name('user.index.managers');
    Route::get('/users/managers/delete/{id}','App\Http\Controllers\UserController@deleteManager')->name('user.delete.manager');
    Route::get('/users/managers/edit/{id}', 'App\Http\Controllers\UserController@editManagerShow')->name('user.show.manager');
    Route::post('/users/managers/edit', 'App\Http\Controllers\UserController@editManager')->name('user.edit.manager');

    Route::get('/users/clients', 'App\Http\Controllers\UserController@showClients')->name('user.index.clients');
    Route::get('/users/clients/delete/{id}', 'App\Http\Controllers\UserController@deleteClient')->name('user.delete.client');
    Route::get('/users/clients/edit/{id}', 'App\Http\Controllers\UserController@editClientShow')->name('user.show.client');
    Route::post('/users/clients/edit', 'App\Http\Controllers\UserController@editClient')->name('user.edit.client');
    Route::get('/users/newmanager/{id}', 'App\Http\Controllers\UserController@toManagerShow')->name('show.newmanager');
    Route::post('/users/newmanager', 'App\Http\Controllers\UserController@addManager')->name('addmanager');
});

Route::prefix('/manager')->middleware('manager')->group(function(){
    Route::get('/','App\Http\Controllers\ManagerController@index')->name('manager.index');
    Route::get('/rentcar','App\Http\Controllers\ManagerController@rentCarIndex')->name('manager.rentcar.show');
    Route::post('/rentcar','App\Http\Controllers\ManagerController@rentCar')->name('manager.rentcar');
    Route::get('/stoprent', 'App\Http\Controllers\ManagerController@stopRentIndex')->name('manager.stoprent.index');
    Route::get('/stoprent/{id}','App\Http\Controllers\ManagerController@stopRent')->name('manager.stoprent');
});

Route::get('/','App\Http\Controllers\FrontController@index')->name('home');
Route::get('/pickpoint/{id}', 'App\Http\Controllers\FrontController@pickpointShow')->name('pickpoint.show');
Route::get('/pickpoint/car/{id}','App\Http\Controllers\FrontController@bookCar')->name('car.book');

Route::middleware('guest')->group(function (){
    Route::get('/register', 'App\Http\Controllers\UserController@register')->name('user.register');
    Route::post('/register', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/login','App\Http\Controllers\UserController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\UserController@check')->name('user.check');
});

Route::get('/logout','App\Http\Controllers\UserController@logout')->name('user.logout')->middleware('auth');

