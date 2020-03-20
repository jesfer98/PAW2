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
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/land',function () {
    return view('landing');
});

Route::get('/index',function () {
    return view('index');
});

//Route::get('/perfil',function () {
//    return view('perfil');
//});

Route::get('/perfil', 'userController@ind2')->name('usu');

Route::post('/subir','userController@store')->name('subir');

Route::get('/usuarios',function () {
    return view('usuarios');
});

Route::get('/usuarios','userController@ind3')->name('list');

Route::get('/buscador',function () {
    return view('buscador');
});

Route::get('/archivo',function () {
    return view('archivo');
});

Route::get('/visita',function () {
    return view('visita');
});

Route::get('/producto',function () {
    return view('producto');
});

Route::get('/welcome', 'WelcomeController@index')->name('welcome');

Route::get('/producto', 'ContController@index')->name('prd');

Route::post('Cant', 'ContController@most');

//Route::resource('Cont', 'ContController');

Route::post('Uudp/{id}', 'userController@update');

Route::post('PubA', 'ContController@publicarArt');

Route::post('BorA', 'ContController@borrarArt');

Route::post('EdiA', 'ContController@paraed');
Route::post('modA', 'ContController@modificarArt');


Route::get('/editorProd',function () {
    return view('editorProd');
});

//Route::resource('student','StudentController');

//Route::get('contenido',function () {
//   return view('ContController@create');
//});
