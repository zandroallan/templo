<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIsController;
// use App\Http\Controllers\DependenciaController;
// use App\Http\Controllers\UsuarioDependenciaController;
// use App\Http\Controllers\SesionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
  
	Route::get('areas', [APIsController::class, 'areas_api']);

	Route::get('infantes', [APIsController::class, 'infantes_api']);
	
	Route::get('infantes/padres', [APIsController::class, 'infantes_padres_api']);

	Route::get('infantes/datos', [APIsController::class, 'infantes_datos_api']);

	Route::get('telefonia', [APIsController::class, 'telefonia_api']);

	Route::get('eventos', [APIsController::class, 'evento_api']);

	// Route::get('roles', [UserController::class, 'roles_api']);

	// Route::get('poderes', [DependenciaController::class, 'poderes_api']);

	// Route::get('dependencias', [DependenciaController::class, 'dependencias_api']);

	// Route::get('sesiones', [SesionController::class, 'sesiones_api']);

	// Route::get('usuario/dependencias', [UsuarioDependenciaController::class, 'usuarios_dependencias_api']);

	// Route::get('dependencia/selected', [UsuarioDependenciaController::class, 'organismoSelectet']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
