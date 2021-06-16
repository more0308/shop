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
Route::get('locale/{locale}', 'HomeController@changeLocale')->name('locale');
Route::middleware(['set_locale'])->group(function (){

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/');
});



Auth::routes();

Route::name('product.')->namespace('Product')->prefix('/product')->group(function ()
{

    Route::get('/{id}', 'ProductController@show')->name('show');
    Route::post('/comment', 'ProductController@comment')->name('comment');
    Route::get('/payment/show', 'ProductController@paymentGet')->name('payment.get');
    Route::post('/payment/show', 'ProductController@paymentPost')->name('payment.post');
    Route::post('/orderAdd', 'ProductController@orderAdd')->name('order.add');
    Route::post('/orderDelete', 'ProductController@orderDelete')->name('order.delete');
});

Route::name('admin.')->namespace('Admin')->middleware('is_admin')->prefix('/admin')->group(function ()
{
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/product/show/{id}', 'AdminController@productShow')->name('product.show');
    Route::get('/comment/show', 'CommentController@commentAll')->name('comment');
    Route::post('/comment/good', 'CommentController@commentGood')->name('comment.good');
    Route::post('/comment/bad', 'CommentController@commentBad')->name('comment.bad');
    Route::post('/comment/badAll', 'CommentController@commentBadAll')->name('comment.badall');
    Route::post('/product', 'AdminController@productUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'AdminController@productDelete')->name('product.delete');
    Route::get('/product/create', 'AdminController@productCreateGet')->name('product.create');
    Route::post('/product/create/post', 'AdminController@productCreatePost')->name('product.create.post');
});

});
