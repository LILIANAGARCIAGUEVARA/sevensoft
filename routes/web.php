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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/preguntas', function () {
    return view('preguntasClientes');
});

Route::get('/consultaUsuarios', function () {
    return view('consultaUsuarios');
});

Route::get('/modicarUsuarios', function () {
    return view('modicarUsuarios');
});

Route::post('/modificandorespuesta/{id}','PreguntasAdmin@update');

Route::post('/save','UsuarioController@store');
Route::get('/consultaUsuarios','UsuarioController@consulta');
Route::delete('/eliminarUsuarios/{id}', 'UsuarioController@destroy');

Route::get('/datosModificar/{id}','UsuarioController@datosModificar');
Route::post('/modificarUsuarios/{id}','UsuarioController@update');

Route::delete('/delete/{id}', 'PreguntasAdmin@destroy');

Route::get('/preguntastrabajador','PreguntasAdmin@index');

Route::get('/verrespuesta','PreguntasAdmin@respuesta');

Route::post('/guardarrespuesta','PreguntasAdmin@store');

Route::get('/editarrespuesta/{id}','PreguntasAdmin@preeditar');

Route::get('/modificar/{id}','PreguntasAdmin@modificar');

Route::get('/menuadmin', function () {
    return view('menuadmin');
});

Route::get('/formularioUsuarios', 'UsuarioController@formulario');
Route::get('/login','UsuarioController@login');

