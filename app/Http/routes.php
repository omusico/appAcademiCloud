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






//SEGURIDAADES
//GRUPOS DE OPCIONES
//tabla: secu_grupo_opciones
Route::group(['middleware' => ['auth']], function() {
    Route::get('seguridades/grupos_opciones', 'Seguridades\CatalogoGrupoOpcionesController@index');
    Route::get('seguridades/grupos_opciones/buscar_registros_dt','Seguridades\CatalogoGrupoOpcionesController@buscar_registros_dt');
    Route::get('seguridades/grupos_opciones/crear', 'Seguridades\CatalogoGrupoOpcionesController@crear');
    Route::post('seguridades/grupos_opciones/grabar_nuevo', 'Seguridades\CatalogoGrupoOpcionesController@grabar_nuevo');
    Route::get('seguridades/grupos_opciones/editar/{id}', 'Seguridades\CatalogoGrupoOpcionesController@editar');
    Route::post('seguridades/grupos_opciones/grabar_actualizar', 'Seguridades\CatalogoGrupoOpcionesController@grabar_actualizar');
    Route::get('seguridades/grupos_opciones/eliminar/{id}', 'Seguridades\CatalogoGrupoOpcionesController@eliminar');
    Route::post('seguridades/grupos_opciones/grabar_eliminar', 'Seguridades\CatalogoGrupoOpcionesController@grabar_eliminar');
});
//MODULOS DE SISTEMA
//tabla: secu_grupo_opciones
Route::group(['middleware' => ['auth']], function() {
    Route::get('seguridades/modulos_sistema/listar/{grupo_opciones_id}', 'Seguridades\CatalogoModuloSistemaController@index');
    Route::get('seguridades/modulos_sistema/buscar_registros_dt/{grupo_opciones_id}','Seguridades\CatalogoModuloSistemaController@buscar_registros_dt');
    Route::get('seguridades/modulos_sistema/crear/{grupo_opciones_id}', 'Seguridades\CatalogoModuloSistemaController@crear');
    Route::post('seguridades/modulos_sistema/grabar_nuevo', 'Seguridades\CatalogoModuloSistemaController@grabar_nuevo');
    Route::get('seguridades/modulos_sistema/editar/{id}', 'Seguridades\CatalogoModuloSistemaController@editar');
    Route::post('seguridades/modulos_sistema/grabar_actualizar', 'Seguridades\CatalogoModuloSistemaController@grabar_actualizar');
    Route::get('seguridades/modulos_sistema/eliminar/{id}', 'Seguridades\CatalogoModuloSistemaController@eliminar');
    Route::post('seguridades/modulos_sistema/grabar_eliminar', 'Seguridades\CatalogoModuloSistemaController@grabar_eliminar');
});
//PERMISOS POR ACCIONES DE CADA MODULO
//tabla: secu_modulo_sistema_accion
Route::group(['middleware' => ['auth']], function() {
    Route::get('seguridades/modulos_acciones/listar/{modulo_sistema_id}', 'Seguridades\CatalogoModuloAccionesController@index');
    Route::get('seguridades/modulos_acciones/buscar_registros_dt/{modulo_sistema_id}','Seguridades\CatalogoModuloAccionesController@buscar_registros_dt');
    Route::get('seguridades/modulos_acciones/crear/{modulo_sistema_id}', 'Seguridades\CatalogoModuloAccionesController@crear');
    Route::post('seguridades/modulos_acciones/grabar_nuevo', 'Seguridades\CatalogoModuloAccionesController@grabar_nuevo');
    Route::get('seguridades/modulos_acciones/editar/{id}', 'Seguridades\CatalogoModuloAccionesController@editar');
    Route::post('seguridades/modulos_acciones/grabar_actualizar', 'Seguridades\CatalogoModuloAccionesController@grabar_actualizar');
    Route::get('seguridades/modulos_acciones/eliminar/{id}', 'Seguridades\CatalogoModuloAccionesController@eliminar');
    Route::post('seguridades/modulos_acciones/grabar_eliminar', 'Seguridades\CatalogoModuloAccionesController@grabar_eliminar');
});
//ROLES DEL APP
//tabla: secu_rol
Route::group(['middleware' => ['auth']], function() {
    Route::get('seguridades/roles', 'Seguridades\CatalogoRolesController@index');
    Route::get('seguridades/roles/buscar_registros_dt','Seguridades\CatalogoRolesController@buscar_registros_dt');
    Route::get('seguridades/roles/crear', 'Seguridades\CatalogoRolesController@crear');
    Route::post('seguridades/roles/grabar_nuevo', 'Seguridades\CatalogoRolesController@grabar_nuevo');
    Route::get('seguridades/roles/editar/{id}', 'Seguridades\CatalogoRolesController@editar');
    Route::post('seguridades/roles/grabar_actualizar', 'Seguridades\CatalogoRolesController@grabar_actualizar');
    Route::get('seguridades/roles/eliminar/{id}', 'Seguridades\CatalogoRolesController@eliminar');
    Route::post('seguridades/roles/grabar_eliminar', 'Seguridades\CatalogoRolesController@grabar_eliminar');
});
//PERMISOS POR ROL
//tabla: secu_rol_modulo
Route::group(['middleware' => ['auth']], function() {
    Route::get('seguridades/rol_permisos/listar/{rol_id}', 'Seguridades\CatalogoRolesPermisosController@index');
    Route::get('seguridades/rol_permisos/buscar_permisos/{rol_id}','Seguridades\CatalogoRolesPermisosController@buscar_permisos_por_rol');
    Route::get('seguridades/rol_permisos/buscar_modulos/{rol_id}','Seguridades\CatalogoRolesPermisosController@buscar_modulos_disponibles');
    Route::post('seguridades/rol_permisos/grabar_nuevo', 'Seguridades\CatalogoRolesPermisosController@grabar_nuevo');
    Route::post('seguridades/rol_permisos/grabar_eliminar', 'Seguridades\CatalogoRolesPermisosController@grabar_eliminar');
});

