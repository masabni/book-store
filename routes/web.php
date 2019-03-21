<?php


Route::get('/', 'ProductsController@index');
Route::resource('products', 'ProductsController');
Route::get('/sub-category', 'ProductsController@getSubCategory');
Route::get('/blank', function () {
    return view('product.blank');
});
