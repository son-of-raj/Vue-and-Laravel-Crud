<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/post/create', 'ProductController@store');
Route::get('/post/edit/{id}', 'ProductController@edit');
Route::post('/post/update/{id}', 'ProductController@update');
Route::delete('/post/delete/{id}', 'ProductController@delete');
Route::get('/posts', 'ProductController@index');