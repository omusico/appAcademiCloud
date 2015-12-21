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


//RUTAS DE ACCESO PUBLICAS POR INICIO DE SESION
Route::get('/', 'Acceso\AccesoController@login');
Route::post('iniciar_sesion', 'Acceso\AccesoController@iniciar_sesion');

Route::get('reseteo', 'Acceso\AccesoController@reseteo');
Route::post('resetear_clave', 'Acceso\AccesoController@resetear_clave');


//RUTAS DE ACCESO PRIVADAS
Route::group(['middleware' => ['auth']], function() {
    Route::get('inicio', 'Acceso\AccesoController@inicio');
    Route::get('cerrar_sesion', 'Acceso\AccesoController@cerrar_sesion');

    Route::get('usuario/actualizacion_clave', 'Acceso\AccesoController@actualizacion_clave');
    Route::post('usuario/actualizar_clave', 'Acceso\AccesoController@actualizar_clave');
});

