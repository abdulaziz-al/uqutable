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

Auth::routes();

Route::get('/cer','adminController@index');
Route::post('/cer','adminController@store')->name('reg');
route::get('/shownote/{id}','adminController@shownote');
route::post('/shownote/{id}','adminController@savenote');



route::get('/stupage','stuController@showstupage')->name('Stupage');
route::get('/Schedulepage','stuController@showSchedul');
route::get('/Scheduleadmin/{name}','adminController@showSchedul');

Route::get('/request/{id}','stuController@index');
Route::post('/request/{id}','stuController@store');

route::resource('/courses','coursesController');

///////////////////////////////////////////////////////////////////////////////


Route::get('product-list', 'adminController@list')->name('product.list');
Route::post('product-import', 'adminController@productsImport')->name('product.import');
Route::get('product-export/{type}', 'adminController@productsExport')->name('product.export');


//////////////////////////////////////////////////////////////////////////////////////

route::get('/drpage','DrController@index');
route::get('/showstureason','stuController@show');

route::get('/showdrreason/{name}','Drcontroller@showreason')->name('Drshow.index');
Route::post('/showdrreason/{id}','DrController@rejection')->name('rejection');
route::get('/deletereason/{name}','Drcontroller@destroy');

route::get('/showReqcode','Drcontroller@showcode')->name('recode.index');
route::get('/showReqdr/{id}','Drcontroller@showReq');

route::get('/allrequest','adminController@showallrequest')->name('allReq');

route::post('/code/{id}','Drcontroller@store')->name('code');
route::post('/recode/{id}','Drcontroller@restore')->name('recode');
route::post('/accadmin/{id}','adminController@accstu');



Auth::routes();


