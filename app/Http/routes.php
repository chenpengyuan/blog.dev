<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'PostsController@showContact' );

Route::get('post/{category}/{date}/{id}','PostsController@showPost');

Route::get('error',function(){
    return view('errors.503');
});

// Route::get('post/{id}','PostsController@index'); //controllers

// Route::resource('posts','PostsController');

// Route::get('/about', function () {
//     return "Page: About";
// });

// Route::get('/contact', function () {
//     return "Page: Contact";
// });

// Route::get('/post/{id}/{name}', function ($id,$name) {
//     return "Page: Contact" . $id .",Name:" . $name;
// });

// // Route::get('/demo', function () {
// //     //return view('welcome');
// //     return "Hello World";
// // });
