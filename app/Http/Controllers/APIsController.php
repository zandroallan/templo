<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clsDLDependencia;
use App\Models\clsDLDependenciaMesa;
use App\Models\clsDLEvento;
use Auth;

class APIsController extends Controller
{
    public function __construct() { }

    public static function dependencias_api(Request $vrequest)
     {
        // code...
        $vstatus=200;
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'sucess',
            'mensaje'=> 'Exito'
        ];
        try {            
            switch ($vrequest->input('method')) {
                case 'show':
                    $vrespuesta['respuesta']=clsDLDependencia::queryToDB(['id' => $vrequest->id_dependencia])->first();
                  break;
                case 'get':

                    $vrespuesta['respuesta']=clsDLDependencia::queryToDB(['visible'=>1])->get();
                  break;
                default:
                    $vrespuesta['mensaje']='Metodo de petición, no definido.';
                  break;
            }
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta=[
                'codigo'=> -1,
                'icono'=> 'error',
                'mensaje'=> $vexception->getMessage()
            ];
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public static function dependencia_mesa_trabajo_api(Request $vrequest)
     {
        // code...
        $vstatus=200;
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'sucess',
            'mensaje'=> 'Exito'
        ];
        try {            
            switch ($vrequest->input('method')) {
                case 'show':
                    $vrespuesta['respuesta']=clsDLDependencia::queryDependenciaMesaTrabajo(['id' => $vrequest->id_dependencia])->first();
                  break;
                case 'get':
                    $_filtro=[];
                    if ( Auth::User()->hasRole(['enlace-entrante', 'enlace-saliente'])) {
                        $_filtro['id_dependencia']=Auth::User()->id_dependencia;
                    }

                    $id_dependencia=$vrequest['id_dependencia'];
                    $entrante=$vrequest['entrante'];
                    $saliente=$vrequest['saliente'];
                    if ( isset($id_dependencia) ) $_filtro['id_dependencia']=$id_dependencia;
                    if ( isset($entrante) ) $_filtro['entrante']=$entrante;
                    if ( isset($saliente) ) $_filtro['saliente']=$saliente;

                    $vrespuesta['respuesta']=clsDLDependencia::queryDependenciaMesaTrabajo($_filtro)->get();
                  break;
                default:
                    $vrespuesta['mensaje']='Metodo de petición, no definido.';
                  break;
            }
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta=[
                'codigo'=> -1,
                'icono'=> 'error',
                'mensaje'=> $vexception->getMessage()
            ];
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public static function inauguracion_api(Request $vrequest)
     {
        // code...
        $vstatus=200;
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'sucess',
            'mensaje'=> 'Exito'
        ];
        try {            
            switch ($vrequest->input('method')) {
                case 'show':
                    $vrespuesta['respuesta']=clsDLDependencia::queryInauguracion(['id' => $vrequest->id_dependencia])->first();
                  break;
                case 'get':
                    $vrespuesta['respuesta']=clsDLDependencia::queryInauguracion([])->get();
                  break;
                default:
                    $vrespuesta['mensaje']='Metodo de petición, no definido.';
                  break;
            }
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta=[
                'codigo'=> -1,
                'icono'=> 'error',
                'mensaje'=> $vexception->getMessage()
            ];
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public static function mesa_trabajo_api(Request $vrequest)
     {
        // code...
        $vstatus=200;
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'sucess',
            'mensaje'=> 'Exito'
        ];
        try {            
            switch ($vrequest->input('method')) {
                case 'show':
                    $vrespuesta['respuesta']=clsDLDependencia::queryMesaTrabajo(['id' => $vrequest->id_dependencia])->first();
                  break;
                case 'get':
                    $vrespuesta['respuesta']=clsDLDependencia::queryMesaTrabajo([])->get();
                  break;
                default:
                    $vrespuesta['mensaje']='Metodo de petición, no definido.';
                  break;
            }
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta=[
                'codigo'=> -1,
                'icono'=> 'error',
                'mensaje'=> $vexception->getMessage()
            ];
        }
        return response()->json($vrespuesta, $vstatus);
     }
    
    public static function evento_api(Request $vrequest)
     {
        // code...
        $vstatus=200;
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'sucess',
            'mensaje'=> 'Exito'
        ];
        try {
            $filtro = [];   
            switch ($vrequest->input('method')) {
                case 'show':
                    $vrespuesta['respuesta']=clsDLEvento::queryToDB(['id' => $vrequest->id_evento])->first();
                  break;
                case 'get':
                    $asistencia = $vrequest->asistencia;
                    $id_dependencia = $vrequest->id_dependencia;
                    $evento = $vrequest->evento;
                    $saliente = $vrequest->saliente;
                    $entrante=$vrequest->entrante;
                    // $saliente=$vrequest->saliente;

                    if ( isset($asistencia) ) $filtro['asistencia']=$asistencia;
                    if ( isset($id_dependencia) ) $filtro['id_dependencia']=$id_dependencia;
                    if ( isset($evento) ) $filtro['evento']=$evento;
                    if ( isset($saliente) ) $filtro['_saliente']=$saliente;
                    if ( isset($entrante) ) $filtro['entrante']=$entrante;
                    // if ( isset($saliente) ) $filtro['saliente']=$saliente;

                    $vrespuesta['respuesta']=clsDLEvento::queryToDB($filtro)->get();
                  break;
                case 'deletes':                    
                    $vrespuesta['respuesta']=clsDLEvento::queryToDB($filtro)->withTrashed()->get();
                  break;
                default:
                    $vrespuesta['mensaje']='Metodo de petición, no definido.';
                  break;
            }
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta=[
                'codigo'=> -1,
                'icono'=> 'error',
                'mensaje'=> $vexception->getMessage()
            ];
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public static function acuerdos_mesa_trabajo_api(Request $vrequest)
     {
        // code...
        $vstatus=200;
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'sucess',
            'mensaje'=> 'Exito'
        ];
        try {            
            switch ($vrequest->input('method')) {
                case 'show':
                    $vrespuesta['respuesta']=clsDLDependenciaMesa::queryToDB(['id' => $vrequest->id_dependencia_mesa])->first();
                  break;
                case 'get':
                    $_filtro=[];
                                        
                    // $entrante=$vrequest['entrante'];
                    // $saliente=$vrequest['saliente'];
                    // if ( isset($id_dependencia) ) $_filtro['id_dependencia']=$id_dependencia;

                    $id_dependencia=$vrequest['id_dependencia'];
                    if ( isset($id_dependencia) ) $_filtro['id_dependencia']=$id_dependencia;
                    
                    if ( Auth::User()->hasRole(['enlace-entrante', 'enlace-saliente']) ) {
                        $_filtro['id_dependencia']=Auth::User()->id_dependencia;
                    }                 

                    $vrespuesta['respuesta']=clsDLDependenciaMesa::queryToDB($_filtro)->get();
                  break;
                default:
                    $vrespuesta['mensaje']='Metodo de petición, no definido.';
                  break;
            }
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta=[
                'codigo'=> -1,
                'icono'=> 'error',
                'mensaje'=> $vexception->getMessage()
            ];
        }
        return response()->json($vrespuesta, $vstatus);
     }
}