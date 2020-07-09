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

Route::get('/', "MoviesController@home")->middleware("auth");

Route::get('/titulos', "MoviesController@movies")->middleware("auth");

Route::get('/detail/{id}', "MoviesController@detail")->middleware("auth");

Route::get('/addMovie',function(){
    return view("addMovie");
})->middleware("admin");

Route::post('/addMovie',"MoviesController@addMovie")->middleware("admin");

Route::post('/deleteMovie','MoviesController@deleteMovie')->middleware("admin");

Route::get('/all-movies','MoviesController@listMoviesAPI')->middleware("auth");

Route::get('/editMovie/{id}','MoviesController@editMovie')->middleware("admin");

Route::resource('Movies', 'MoviesController');

Route::get('/denied', ['as' => 'denied', function() {
    return view('denied');
}]);

Auth::routes();

Route::get('/home', 'MoviesController@home')->name('home');
