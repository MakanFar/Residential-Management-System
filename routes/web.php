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
    return view('welcome');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    
    




    
});

// for tenants
Route::group(['middleware' => ['auth', 'role:tenant']], function() { 
    Route::get('/dashboard/tenantprofile', 'App\Http\Controllers\DashboardController@tenantprofile')->name('dashboard.tenantprofile');
    Route::get('/dashboard/tenantbill', 'App\Http\Controllers\TenantBillController@index')->name('dashboard.tenantbill');
    Route::get('payment/{id}', [ "uses" => 'App\Http\Controllers\TenantBillController@payment',"as" => 'payment']);
    Route::post('/dashboard/payment', 'App\Http\Controllers\TenantBillController@pay')->name('dashboard.payment');
    Route::post('/dashboard/tenantprofile','App\Http\Controllers\UserController@update')->name('dashboard.tenantprofile');
    
});

// for managers
Route::group(['middleware' => ['auth', 'role:management']], function() { 
    Route::get('/dashboard/managerprofile', 'App\Http\Controllers\DashboardController@managerprofile')->name('dashboard.managerprofile');
    Route::post('/dashboard/managerprofile','App\Http\Controllers\UserController@update')->name('dashboard.managerprofile');
    Route::get('/dashboard/managerbill', 'App\Http\Controllers\ManagerBillController@index')->name('dashboard.managerbill');
    Route::get('edit/{id}', [ "uses" => 'App\Http\Controllers\ManagerBillController@edit',"as" => 'edit']);
    Route::post('/dashboard/editbill', 'App\Http\Controllers\ManagerBillController@update')->name('dashboard.editbill');
    Route::get('add', [ "uses" => 'App\Http\Controllers\ManagerBillController@add',"as" => 'add']);
    Route::post('/dashboard/addbill', 'App\Http\Controllers\ManagerBillController@create')->name('dashboard.addbill');
    Route::get('/dashboard/tenantmanager', 'App\Http\Controllers\TenantManagerController@index')->name('dashboard.tenantmanager');
    Route::get('edittenant/{id}', [ "uses" => 'App\Http\Controllers\TenantManagerController@edittenant',"as" => 'edittenant']);
    Route::post('/dashboard/edittenant', 'App\Http\Controllers\TenantManagerController@update')->name('dashboard.edittenant');
    Route::delete('deleteBill/{id}', [ "uses" => 'App\Http\Controllers\ManagerBillController@deleteBill',"as" => 'deleteBill']);
    Route::delete('deleteTenant/{id}', [ "uses" => 'App\Http\Controllers\TenantManagerController@deleteTenant',"as" => 'deleteTenant']);
    Route::delete('deleteManager/{id}', [ "uses" => 'App\Http\Controllers\UserController@deleteManager',"as" => 'deleteManager']);
});





require __DIR__.'/auth.php';