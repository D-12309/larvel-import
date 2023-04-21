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

Route::get('/', 'ImportController@getImport')->name('import');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');


Route::get('/', array('as'=> 'front.home', 'uses' => 'ItemController@itemView'));
Route::post('/update-items', array('as'=> 'update.items', 'uses' => 'ItemController@updateItems'));

Route::get('update_task', 'ImportController@update_task')->name('update_task');
Route::get('test', 'ImportController@index');