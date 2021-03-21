<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
/*
Route::get('/create', function () {
    return view('products.create', ['create' => Product::all()]);
});
*/

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/payments', 'App\Http\Controllers\PagesController@payments');
Route::get('/checkout', 'App\Http\Controllers\PagesController@checkout');

Route::resource('products', 'App\Http\Controllers\ProductsController');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index');
