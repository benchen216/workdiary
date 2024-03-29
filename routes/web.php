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

Route::get('/', "HomeController@index");

Route::get("/customer","CustomerController@index")->name("customer.index");
Route::get("/work-col-def","WorkOrderController@col_def")->name("workorder.col_def");
Route::post("/work-col-def","WorkOrderController@col_def_save")->name("workorder.col_def_save");
#Route::post("/work-col-def",function(){return view("workorder.col_def");})->name("workorder.col_def_save");
//Route::post('/workorders/{id}', 'WorkOrderController@show')->name('workorder.show');
Route::get('/workorders/add',"WorkOrderController@add")->name("workorder.add");
Route::get('/workorders/show/{id}', 'WorkOrderController@show')->name('workorder.show');
Route::get('/workorders/{id}', 'WorkOrderController@edit')->name('workorder.edit');
Route::delete('/workorders/{id}','WorkOrderController@destroy')->name('workorder.destroy');
Route::put('/workorders/{id}','WorkOrderController@update')->name('workorder.update');
Route::post('/workorders',"WorkOrderController@store")->name("workorder.store");
Route::get('/workorders',"WorkOrderController@index")->name("workorder.index");

Route::post('/workers',"WorkerController@add")->name("worker.add");
Route::get('/workers',"WorkerController@index")->name("worker.index");
Route::put('/workers/{id}',"WorkerController@update")->name("worker.update");

Route::get('/workitem',"WorkItemController@index")->name("workitem.index");
Route::post('/workitem',"WorkItemController@store")->name("workitem.store");
Route::get('/workitem_class',"WorkItemController@class_show")->name("workitem.class_show");
Route::post('/workitem_class',"WorkItemController@class_store")->name("workitem.class_store");

//Route::get('/xx',"HomeController@index");

Auth::routes([
    'register' => false
]);
Route::get('change-password', 'ChangePasswordController@index')->name('change.password');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


