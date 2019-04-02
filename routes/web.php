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


//Julio Rutas
Route::get('/consultaUsuarios', function () {
    return view('consultaUsuarios');
});

Route::get('/modicarUsuarios', function () {
    return view('modicarUsuarios');
});
Route::get('/formularioTrabajador',function(){
	return view('formularioTrabajador');
});

Route::get('/formularioTrabajador','TrabajadorController@validacion');
Route::get('/formularioUsuarios','UsuarioController@validacion');

Route::get('/consultaUsuarios','Controlador@consulta');

Route::delete('/eliminarUsuarios/{id}', array ('as'=>'id','uses'=>'Controlador@destroy'));

Route::get('/datosModificar/{id}', array ('as'=>'id','uses'=>'Controlador@datosModificar'));
Route::post('/modificarUsuarios/{id}','Controlador@update');


Route::post('/saveTrabajador','TrabajadorController@store');

Route::post('/guardarUsuario','ClienteController@store');


Route::get('/control/{usuario}/{contrasena}','login@login');
Route::get('/login','login@consulta');
Route::get('/recuperarContrasena',function(){
	return view('recuperarContrasena');
});
Route::get('/control2/{usuario}/{pregunta}/{respuesta}','login@recuperar');


Route::get('/recuperar/{idusuarios}','login@update');

Route::put('/recuperar/{idusuarios}','login@updatecontra');
///

//Maria Rutas

Route::post('/modificandorespuesta/{id}','PreguntasAdmin@update');

Route::post('/savePregunta','Controlador@store');


Route::post('/modificandorespuesta/{id}','PreguntasAdmin@update');

Route::post('/save','UsuarioController@store');
Route::get('/consultaUsuarios','UsuarioController@consulta');
Route::delete('/eliminarUsuarios/{id}', 'UsuarioController@destroy');

Route::get('/datosModificar/{id}','UsuarioController@datosModificar');
Route::post('/modificarUsuarios/{id}','UsuarioController@update');
Route::get('/menuUser', function () {
    return view('menuUser');
});


/*lili rutas*/


Route::delete('/delete/{id}', 'PreguntasAdmin@destroy');

Route::get('/preguntastrabajador','PreguntasAdmin@index');

Route::get('/verrespuesta','PreguntasAdmin@respuesta');

Route::post('/guardarrespuesta','PreguntasAdmin@store');

Route::get('/editarrespuesta/{id}','PreguntasAdmin@preeditar');

Route::get('/modificar/{id}','PreguntasAdmin@modificar');

Route::get('/menuadmin', function () {
    return view('menuadmin');
});


