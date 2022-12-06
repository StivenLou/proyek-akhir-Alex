<?php

use Illuminate\Support\Facades\Route;
use App\Student;

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
Route::get('/person','PersonController@index')->name('person.index');

//Parsing Data
Route::get('/person/show/{param}','PersonController@show');

//Pemanggilan Resource Controller
Route::resource('/student','StudentController');

//Route View Home.blade
Route::get('/homepage', function () {
    return view('home');
});

//Route View Home.blade Parsing Data
Route::get('/homepage', function () {
    return view('home', ["name" => "Alexander S. M"]);
});

Route::get('/person/sendData','PersonController@sendData');

Route::get('/person/data','PersonController@data');

Route::get('/person/my-academic/{task}/{quiz}/{mid_term}/{final}/','PersonController@myCourse');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('person/create', 'PersonController@create')->name('person.create');

Route::post('person/store', 'PersonController@store')->name('person.store');

Route::get('student/index', function() {
    // Eloquen ORM untuk Select All Data
    $students = Student::all();

    // Memecah Object students ke dalam student
    foreach($students as $student) {
        echo "<br />Nama : ". $student->name;
        echo "<br />NRP : ". $student->code;
        echo "<br />Kelas : ". $student->group;
    }
});

Route::get('student/index','StudentController@index');
