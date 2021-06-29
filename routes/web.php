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

// Route::get('post', function () {
//     return view('index');
// });
 
// Route::resource('student','StudentsController');

// Route::group(['middleware' => ['web']], function(){
    Route::resource('post','PostController');

    Route::POST('addPost','PostController@addPost'); 
    
// });

Route::get('student','StudentsController@index');
// Route::get('studentload','StudentsController@loadajax');

Route::post('/studentadd','StudentsController@store');

Route::put('/studentupdate/{id}','StudentsController@update');

Route::delete('/studentdelete/{id}','StudentsController@delete');

 
Route::resource('customers','CustomerController');
Route::get('customers/{id}/edit/','CustomerController@edit');


Route::resource('vendors','VendorController');
Route::get('vendors/{id}/edit/','VendorController@edit');

Route::resource('castomers','CastomerController');
Route::get('castomers/{id}/edit/','CastomerController@edit');


// Perfect web solutions

Route::get('/', function(){
    return view('welcome');
});
// Route::get('todo/edit/{id}', 'TodoController@edit' );



Route::middleware('ajax.check')->group(function(){
    // Route::get('test', function(){
    //     return response()->json(['data' => 'Hello']);
    // });
    Route::get('tasks', 'TodoController@index' );
    Route::get('todo/create', 'TodoController@create' );
    Route::get('todo/edit/{id}', 'TodoController@edit' );

    Route::get('todo/destroy/{id}', 'TodoController@destroy' );
    Route::post('todo/update', 'TodoController@update' );
    Route::post('todo/save', 'TodoController@save' );

});


// Practice  CRUD

Route::get('/', function(){
    return view('welcomes');
});

Route::middleware('check.ajax')->group(function(){
    //     Route::get('test', function(){
    //     return response()->json(['data' => 'Hello']);
    // });

    Route::get('tasks','TodolistController@index');
    Route::get('todolist/create','TodolistController@create');
    Route::post('todolist/save','TodolistController@save');
    Route::get('todolist/edit/{id}','TodolistController@edit');
    Route::post('todolist/update','TodolistController@update');
    Route::get('todolist/destroy/{id}','TodolistController@destroy');

});


// Practice  no 2  CRUD

Route::get('/', function(){
    return view('welcomess');
});


Route::middleware('checked.ajax')->group(function(){
//   Route::get('test', function(){
//       return respomse()->json(['data' => 'Hello']);
//   });

Route::get('tasks','TodoslistController@index');
Route::get('todoslist/create','TodoslistController@create');
Route::post('todoslist/save','TodoslistController@save');
Route::get('todoslist/edit/{id}','TodoslistController@edit');
Route::post('todoslist/update','TodoslistController@update');
Route::get('todoslist/destroy/{id}','TodoslistController@destroy');

});



// Practice  no 2  CRUD


Route::get('/',function(){
    return view('welcomesss');
});



Route::middleware('checkd.ajax')->group(function(){
    // Route::get('test',function(){
    //     return response()->json(['hello']);
    // });

      Route::get('tasks','TodoworklistController@index');
      Route::get('todoworklist/create','TodoworklistController@create');
      Route::post('todoworklist/save','TodoworklistController@save');
      Route::get('todoworklist/edit/{id}','TodoworklistController@edit');
      Route::post('todoworklist/update','TodoworklistController@update');
      Route::get('todoworklist/destroy/{id}','TodoworklistController@destroy');

});

Route::get('/',function(){
    return view('welcomessss');
});

Route::get('tasks','TodosworklistController@index');



// stud 


// Route::get('/stud','StudController@index');
// Route::post('/studadd','StudController@store');
// Route::put('/studupdate/{id}','StudController@update');
// Route::delete('/studdelete/{id}','StudController@delete');


Route::resource('ajax-posts', 'ajaxcrud\AjaxPostController');
// Route::delete('delete-multiple-records', 'ajaxcrud\AjaxPostDelController@deleteMultipleRecords')->name('posts.multiple-delete');

// Route::get('ajax-posts', 'ajaxcrud\AjaxPostController@index');
// Route::post('ajax-posts/store', 'ajaxcrud\AjaxPostController@store');
// Route::get('ajax-posts/edit/{id}', 'ajaxcrud\AjaxPostController@edit');
// Route::post('ajax-posts/update', 'ajaxcrud\AjaxPostController@update');

// Route::delete('ajax-posts/destroy/{id}', 'ajaxcrud\AjaxPostController@destroy');
Route::delete('delete-multiple-records', 'ajaxcrud\AjaxPostController@deleteMultipleRecords')->name('ajax-posts.multiple-delete');






