<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\DependenciaMesaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\APIsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');





Route::get('registro', [EventoController::class, 'registro_index']);


// Route::get('registro/apertura', [EventoController::class, 'registro_apertura_index']);

Route::get('registro/apertura/saliente', [EventoController::class, 'registro_apertura_saliente_index']);

Route::get('registro/apertura/entrante', [EventoController::class, 'registro_apertura_entrante_index']);

Route::get('registro/apertura/internos', [EventoController::class, 'registro_apertura_internos_index']);

Route::get('registro/mesa', [EventoController::class, 'registro_mesa_index']);

Route::get('registro/mesa/saliente', [EventoController::class, 'registro_mesa_saliente_index']);

Route::get('registro/mesa/entrante', [EventoController::class, 'registro_mesa_entrante_index']);

Route::get('registro/mesa/internos', [EventoController::class, 'registro_mesa_internos_index']);





Route::post('evento/inauguracion/store', [EventoController::class, 'store']);

Route::post('evento/registro/saliente/store', [EventoController::class, 'store_saliente']);

Route::post('evento/registro/entrante/store', [EventoController::class, 'store_entrante']);

Route::post('evento/registro/internos/store', [EventoController::class, 'store_internos']);

Route::get('invitacion/{folio}/qr', [FormatoController::class, 'invitacion_PDF']);




Route::get('asistencia/evento', [EventoController::class, 'asistencia_index']);

Route::get('asistencia/{folio}/evento', [EventoController::class, 'attendanceStore']);

Route::get('api/dependencias',  [APIsController::class, 'dependencias_api']);

/**
 * Lista de rutas para los usuarios logueados.
 * Middleware Begin v0.1
 * */

Route::group(['middleware' => ['auth']],
    function() {
    
        // Route::get('formatos', 
        //     function() {
        //         return view('formatos.index');
        //     })->name('formatos');

        Route::get('infantes/padres',   [InfanteController::class, 'infante_datos_index']);
        
        Route::resource('usuarios',     UserController::class);

        Route::resource('roles',        RoleController::class);

        Route::resource('permisos',     PermissionController::class);

        Route::resource('eventos',      EventoController::class)->except('[store]');


        Route::get('mi/perfil', [HomeController::class, 'mi_perfil']);

        Route::get('perfil/datos', [HomeController::class, 'perfil_datos']);

        Route::post('mis/datos/update', [HomeController::class, 'updateData']);

        Route::post('mi/password/update', [HomeController::class, 'updatePassword']);
        

        Route::get('evento/inauguracion', [EventoController::class, 'inauguracion_index']);
        
        Route::get('evento/mesa/trabajo', [EventoController::class, 'mesa_trabajo_index']);

        Route::get('dependencia/mesa/trabajo', [DependenciaController::class, 'dependencia_mesa_trabajo_index']);

        Route::get('dependencia/{id_dependencia}/acuerdos/mesa', [DependenciaController::class, 'dependencia_acuerdos_mesa_index']);
        


        Route::post('acuerdos/mesa/trabajo', [DependenciaMesaController::class, 'store']);

        Route::delete('acuerdo/{id_dependencia_mesa}/mesa/trabajo', [DependenciaMesaController::class, 'destroy']);

        Route::get('acuerdos/anexos/{id_dependencia_mesa}/descargar', [DependenciaMesaController::class, 'download_file']);



        Route::post('evento/inauguracion/store-apertura', [EventoController::class, 'store_apertura']);

        Route::get('evento/{id_evento}/recovery', [EventoController::class, 'recovery']);

        Route::get('invitacion/{id_evento}/evento', [FormatoController::class, 'invitacion_individualPDF']);
        
        Route::get('asistencia/interna/{id_evento}/evento', [EventoController::class, 'attendanceEventStore']);

        Route::get('asistieron', [EventoController::class, 'asistieron_index']);


        /**
         * Listado de rutas API
         * */
        
        Route::get('api/usuarios', [UserController::class, 'usuarios_api']);

        Route::get('api/roles', [RoleController::class, 'roles_api']);

        Route::get('api/permisos', [PermissionController::class, 'permisos_api']);

        Route::get('api/inauguracion', [APIsController::class, 'inauguracion_api']);

        Route::get('api/mesa/trabajo', [APIsController::class, 'mesa_trabajo_api']);

        Route::get('api/dependencia/mesa/trabajo', [APIsController::class, 'dependencia_mesa_trabajo_api']);

        Route::get('api/acuerdos/mesa/trabajo', [APIsController::class, 'acuerdos_mesa_trabajo_api']);

    }
);

/**
 * Middleware End
 * */

