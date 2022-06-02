<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/tomaMuestras', 'muestrasController');

Route::get('/vistaTomaMuestras/{id_muestra}', 'muestrasController@verMas');

Route::view('/tomaMuestraAgregar', 'paginas.tomaMuestraAgregar');

Route::resource('/Vista_Municipios', 'MunicipioController');

Route::get('/municipios/{id_departamento}', 'MunicipioController@consultarMunicipios');

Route::resource('/departamento', 'DepartamentoController');
Route::get('/departamentoShow/{id}', 'DepartamentoController@show');

Route::get('/buscarMuestra/{textoMuestra}', 'muestrasController@buscarMuestra');

Route::get('/registro_resultado_muestra/{id_muestra}', 'resultController@v_registro_resultado_muestra');
Route::post('/v_resultadoStore', 'resultadoController@store');
Route::post('/resultadoUpdate/{id_resultado}', 'resultadoController@update');

Route::resource('/resultado', 'resultController');

Route::get('/consultarResultado/{id_muestra}', 'resultController@consultar_muestra_en_resultado');


Route::resource('/encargado_muestra', 'encargado_muestraController');

Route::view('/registrarEncargado_muestra', 'paginas.registrarEncargado_muestra');

Route::get('/encargado_muestraBuscar/{cadena}', 'encargado_muestraController@buscarEncargado');


Route::view('/registrarUsuario_cliente', 'paginas.registrarUsuario_cliente');

Route::resource('/usuario_cliente', 'usuario_clienteController');
Route::get('/usuario_clienteBuscar/{cadena}', 'usuario_clienteController@buscarUsuario');

Route::post('/register', 'UsersController@store');

Route::resource('/resultado', 'resultadoController');

Route::get('/resultadoVerMas/{id_resultado}', 'resultadoController@verMas');

Route::view('/registrarResultado', 'paginas.registrarResultado');

Route::get('/resultadoBuscar', 'resultadoController@buscarResultado');
Route::get('/resultadoBuscar/{cadena}', 'resultadoController@buscarResultado');

Route::resource('/parametro', 'parametroController');

Route::view('/registrarParametro', 'paginas.registrarParametro');

Route::get('/parametroBuscar/{cadena}', 'parametroController@buscarParametro');

Route::resource('/users', 'usersController');

Route::view('/registrarUsers', 'paginas.registrarUsers');

Route::get('/usersBuscar/{cadena}', 'usersController@buscarUsers');

Route::get('/resultado-list-excel', 'resultadoController@exportExcel')->name('resultado.excel');


Route::get('/contactoForm/{id}', 'contactoController@index')->name('contact');


Route::post('sendbasicemail','MailController@basic_email');

