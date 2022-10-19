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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    echo "hello Word";
});

Route::get('/name/{name}', function ($name) {
    return "Hello " . $name ;
});

Route::get('/data/{data?}', function ($data = "Kosong") {
    return "Isi Parameter " . $data ;
});

Route::get('/name/{name}', function ($name) {
    return "Hello " . $name ;
})->where('name', '[A-Za-z]+');

Route::get('/nama/{nama}/{nrp}', function ($nama,$nrp) {
    return "Nama " . $nama . "<br>" . "NRP " . $nrp ;
})->where('nama', '[A-Za-z]+') ->where('nrp', '[0-9]+') ;

//Route Controller
Route::get('/person','PersonController@index');

//Parsing Data
Route::get('/person/show/{param}','PersonController@show');

//Pemanggilan Resource Controller
Route::resource('/student','StudentController');