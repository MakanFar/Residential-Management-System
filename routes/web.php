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
    Route::get('/dashboard/payment', 'App\Http\Controllers\TenantBillController@payment')->name('dashboard.payment');
    
    Route::post('/dashboard/tenantprofile','App\Http\Controllers\UserController@update')->name('dashboard.tenantprofile');
    
});

// for managers
Route::group(['middleware' => ['auth', 'role:management']], function() { 
    Route::get('/dashboard/managerprofile', 'App\Http\Controllers\DashboardController@managerprofile')->name('dashboard.managerprofile');
    Route::post('/dashboard/managerprofile','App\Http\Controllers\UserController@update')->name('dashboard.managerprofile');
    
});





require __DIR__.'/auth.php';