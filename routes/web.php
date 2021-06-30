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

// Route::get('/', function () {
//     return view('welcome');
// });

// front end controller start
Route::get('/', [
    'uses' => 'App\Http\Controllers\frontendController@index',
    'as'   => '/'
]);

Route::get('/service-post', [
    'uses' => 'App\Http\Controllers\frontendController@servicePost',
    'as'   => 'service-post'
]);


// front end controller end

// provider controller start

Route::get('/new-provider', [
    'uses' => 'App\Http\Controllers\ProviderController@newProvider',
    'as'   => 'new-provider'
]);

Route::get('/provider-login', [
    'uses' => 'App\Http\Controllers\ProviderController@login',
    'as'   => 'provider-login'
]);

Route::post('/add-provider', [
    'uses' => 'App\Http\Controllers\ProviderController@addProvider',
    'as'   => 'add-provider'
]);

Route::post('/check-provider', [
    'uses' => 'App\Http\Controllers\ProviderController@check',
    'as'   => 'check-provider'
]);

Route::post('/provider-logout', [
    'uses' => 'App\Http\Controllers\ProviderController@logout',
    'as'   => 'provider-logout'
]);

// provider controller end

// customer controller start

Route::get('/new-customer', [
    'uses' => 'App\Http\Controllers\CustomerController@new',
    'as'   => 'new-customer'
]);

Route::get('/customer-login', [
    'uses' => 'App\Http\Controllers\CustomerController@login',
    'as'   => 'customer-login'
]);

Route::post('/add-customer', [
    'uses' => 'App\Http\Controllers\CustomerController@add',
    'as'   => 'add-customer'
]);

Route::post('/check-customer', [
    'uses' => 'App\Http\Controllers\CustomerController@check',
    'as'   => 'check-customer'
]);

Route::post('/customer-logout', [
    'uses' => 'App\Http\Controllers\CustomerController@logout',
    'as'   => 'customer-logout'
]);

// customer controller end

// post controller start

Route::get('/create-post', [
    'uses' => 'App\Http\Controllers\PostController@index',
    'as'   => 'create-post'
]);

Route::get('/view-post', [
    'uses' => 'App\Http\Controllers\PostController@view',
    'as'   => 'view-post'
]);

Route::get('/admin-approve', [
    'uses' => 'App\Http\Controllers\PostController@adminApprove',
    'as'   => 'admin-approve'
]);

Route::get('/post-details/{id}', [
    'uses' => 'App\Http\Controllers\PostController@details',
    'as'   => 'post-details'
]);

Route::get('/message/{id}', [
    'uses' => 'App\Http\Controllers\PostController@getMessage',
    'as'   => 'message'
]);

Route::post('/messages', [
    'uses' => 'App\Http\Controllers\PostController@sendMessage',
    'as'   => 'messages'
]);

Route::get('/post-details-customer/{id}', [
    'uses' => 'App\Http\Controllers\PostController@detailsCustomer',
    'as'   => 'post-details-customer'
]);

Route::post('/add-post', [
    'uses' => 'App\Http\Controllers\PostController@add',
    'as'   => 'add-post'
]);

// post controller end

// dashboard controller start

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard', [
    'uses' => 'App\Http\Controllers\DashboardController@index',
    'as'   => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified']
]);

// dashboard controller end

// service controller start

Route::get('/add-service', [
    'uses' => 'App\Http\Controllers\ServiceController@addService',
    'as'   => 'add-service',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/manage-service', [
    'uses' => 'App\Http\Controllers\ServiceController@manageService',
    'as'   => 'manage-service',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/manage-post', [
    'uses' => 'App\Http\Controllers\ServiceController@managePost',
    'as'   => 'manage-post',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/manage-posts', [
    'uses' => 'App\Http\Controllers\ServiceController@managePosts',
    'as'   => 'manage-posts',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/approve-deal/{id}', [
    'uses' => 'App\Http\Controllers\ServiceController@approveDeal',
    'as'   => 'approve-deal',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/approve-post/{id}', [
    'uses' => 'App\Http\Controllers\ServiceController@approvePost',
    'as'   => 'approve-post',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/see-messages/{id}', [
    'uses' => 'App\Http\Controllers\ServiceController@dealMessage',
    'as'   => 'see-messages',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::post('/new-service', [
    'uses' => 'App\Http\Controllers\ServiceController@newService',
    'as'   => 'new-service',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::post('/update-service', [
    'uses' => 'App\Http\Controllers\ServiceController@updateService',
    'as'   => 'update-service',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::post('/update-post', [
    'uses' => 'App\Http\Controllers\ServiceController@updatePost',
    'as'   => 'update-post',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/edit-service/{id}', [
    'uses' => 'App\Http\Controllers\ServiceController@editService',
    'as'   => 'edit-service',
    'middleware' => ['auth:sanctum', 'verified']
]);

Route::get('/delete-service/{id}', [
    'uses' => 'App\Http\Controllers\ServiceController@deleteService',
    'as'   => 'delete-service',
    'middleware' => ['auth:sanctum', 'verified']
]);

// service controller end
