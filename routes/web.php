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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', 'AboutController@index');

Route::get('/', 'TodosController@index');

// Page detail untuk setiap 'todo'
Route::get('/todo/{todoid}', 'TodosController@show'); // '{}' untuk menerima parameter dari uri

// Page buat todo baru
Route::get('/new-todo', 'TodosController@new');

// Post method dari form untuk simpan todo
Route::post('/insert', 'TodosController@insert');
	
// Page edit todo, ngelempar id todo dari view todo detail (show)
Route::get('/todo/{todoid}/edit', 'TodosController@edit');

Route::post('/todo/{todoid}/update', 'TodosController@update');

// Delete todo
Route::get('/todo/{todoid}/delete', 'TodosController@delete');

// Set todo's completed to true
Route::get('/complete/{todoid}', 'TodosController@complete');
