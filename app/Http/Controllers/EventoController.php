<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Classes\clsCorreoPlantilla;
use App\Http\Classes\clsCorreo;
use App\Models\clsDLEvento;
use App\Models\clsDLDependencia;
use QrCode;
use Auth;
use DB;


class EventoController extends Controller
{
    public function __construct() { }

    public function index()
     {
        return view('evento.index');
     }

    public function registro_index()
     {
        return view('evento.registro.registro');
     }

    public function registro_apertura_index()
     {
        return view('evento.registro.apertura');
     }

    public function registro_apertura_saliente_index()
     {
        return view('evento.registro.apertura-saliente');
     }

    public function registro_apertura_entrante_index()
     {
        return view('evento.registro.apertura-entrante');
     }

    public function registro_apertura_internos_index()
     {
        return view('evento.registro.apertura-internos');
     }



    public function registro_mesa_index()
     {
        return view('evento.registro.registro-mesa');
     }

    public function registro_mesa_saliente_index()
     {
        return view('evento.registro.mesa-saliente');
     }

    public function registro_mesa_entrante_index()
     {
        return view('evento.registro.mesa-entrante');
     }

    public function registro_mesa_internos_index()
     {
        return view('evento.registro.mesa-internos');
     }

    public function asistencia_index()
     {
        return view('evento.qr');
     }
     
    


    public function inauguracion_index()
     {
        return view('evento.inauguracion');
     }

    public function mesa_trabajo_index()
     {
        return view('evento.mesa-trabajo');
     }

    # Inauguracion
    public function store(Request $vrequest)
     {
        $otros=0;
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';

        $vdatoValidar=[];
        switch ((int)$vrequest['id_dependencia']) {
            case 68:
                // code...
                $vdatoValidar['id_dependencia']='required';
                $vdatoValidar['nombre']='required';
                $vdatoValidar['telefono']='required';
                $vdatoValidar['correo']='required';
                $otros=1;
              break;
            case 69:
                // code...
                $vdatoValidar['id_dependencia']='required';
                $vdatoValidar['nombre']='required';
                $vdatoValidar['telefono']='required';
                $vdatoValidar['cargo']='required';
                $vdatoValidar['correo']='required';
                $otros=1;
              break;             
            default:
                // code...
                $vdatoValidar['id_dependencia']='required';
                $vdatoValidar['nombre']='required|array|min:2';
                $vdatoValidar['telefono']='required|array|min:2';
                $vdatoValidar['cargo']='required|array|min:2';
                $vdatoValidar['correo']='required|array|min:2';
              break;
        }

        $validator = Validator::make($vrequest->all(), $vdatoValidar);
        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'mensaje'=> 'Favor de llenar los datos correctamente.'], 202);
        }

        $vdatosRequest=$vrequest->all();
        DB::beginTransaction();
        try {
            if ( $otros == 0 ) {
                $_datosEvento=clsDLEvento::queryToDB(['id_dependencia'=> trim($vdatosRequest['id_dependencia']), 'evento'=>1])->first();
                if ( !isset($_datosEvento) ) {
                    $_id=0;
                    $total=count($vdatosRequest['nombre']);
                    for ($i=0; $i < $total; $i++) {

                        // $_datosEventoCorreo=clsDLEvento::queryToDB(['correo'=>$vrequest['correo'][$i]])->get();
                        // if ( count($_datosEventoCorreo) > 0 ) {
                        //     $vrespuesta['codigo']=0;
                        //     $vrespuesta['mensaje']='Ya ya forma parte del registro del evento.';
                        // }
                        // else {
                            $vdatosRequest['anio']=date('y');
                            $vdatosRequest['folio']=date('mdyHis') . $i;
                            $vdatosRequest['nombre']=$vrequest['nombre'][$i];
                            $vdatosRequest['telefono']=$vrequest['telefono'][$i];
                            $vdatosRequest['correo']=$vrequest['correo'][$i];
                            $vdatosRequest['cargo']=$vrequest['cargo'][$i];
                            $vdatosRequest['evento']=1;
                            
                            $vflEvento=new clsDLEvento;
                            $vflEvento->fill($vdatosRequest)->save();
                            $_id=$vflEvento->id;

                            $vrespuesta['folio'. $i]=$vflEvento->folio;
                            $vrespuesta['nombre'. $i]=$vflEvento->nombre;

                            $this->sendEmailInvitado($_id);
                        // }
                    }
                }
                else {
                    $vflDependencia=clsDLDependencia::findOrFail((int)$vdatosRequest['id_dependencia']);
                    $vrespuesta['codigo']=0;
                    $vrespuesta['mensaje']='Ya se envió la invitación a, '. $vflDependencia->nombre .', con esta invitación también formara parte de las mesas de trabajo.';
                    $vrespuesta['query']=$_datosEvento;
                }
            }
            else {
                $_datosEventoCorreo=clsDLEvento::queryToDB(['correo'=>$vrequest['correo']])->get();
                if ( count($_datosEventoCorreo) > 0 ) {
                    $vrespuesta['codigo']=0;
                    $vrespuesta['mensaje']='Ya ya forma parte del registro del evento.';
                }
                else {
                    $_id=0;
                    $vdatosRequest['anio']=date('y');
                    $vdatosRequest['folio']=date('mdyHis');
                    $vdatosRequest['evento']=1;

                    if ( (int)$vrequest['id_dependencia'] == 69 ) {
                        $vdatosRequest['internos']=1;
                    }
                    
                    $vflEvento=new clsDLEvento;
                    $vflEvento->fill($vdatosRequest)->save();
                    $_id=$vflEvento->id;

                    $vrespuesta['folio']=$vflEvento->folio;
                    $vrespuesta['nombre']=$vflEvento->nombre;

                    $this->sendEmailInvitado($_id); 
                } 
            }
            
            DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }


    public function store_apertura(Request $vrequest)
     {
        $otros=0;
        $representacion = 0;
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';

        $chkRepresentacion = $vrequest->input('representacion');
        if(isset($chkRepresentacion))
            $representacion = 1;         

        $vdatosRequest=$vrequest->all();
         DB::beginTransaction();
        try {
                $cargo=$vrequest['cargo_otro'];
                if (isset($cargo) && $cargo != '') {
                    $vdatosRequest['cargo']=$cargo;
                }

                $vdatosRequest['asistencia_hora_mesa']=date('H:i:s');

                $vdatosRequest['representacion']=$representacion;             

                switch ((int)$vrequest['id_dependencia']) {
                    case 68: 
                        $vdatosRequest['entrante']= 1;
                        break;
                    case 69:
                        $vdatosRequest['internos']= 1;
                        break;
                    default:
                        $vdatosRequest['salientes']= 1;
                        break;
                }
                
                $vflEvento=new clsDLEvento;
                $vflEvento->fill($vdatosRequest)->save();

                DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function store_saliente(Request $vrequest)
     {
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';

        $vdatoValidar=[];
        $vdatoValidar['id_dependencia']='required';
        $vdatoValidar['nombre']='required';
        $vdatoValidar['telefono']='required';
        $vdatoValidar['cargo']='required';
        $vdatoValidar['correo']='required';

        $validator = Validator::make($vrequest->all(), $vdatoValidar);
        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'mensaje'=> 'Favor de llenar los datos correctamente.'], 202);
        }

        $vdatosRequest=$vrequest->all();
        DB::beginTransaction();
        try {
            $query['id_dependencia']=(int)$vdatosRequest['id_dependencia'];
            $query['_saliente']=1;
            // $query['correo']=$vdatosRequest['correo'];

            $_datosEvento=clsDLEvento::queryToDB($query)->get();
            // $_datosEventoExiste=
            if ( (int)count($_datosEvento) <= 9 ) {

                $_datosEventoCorreo=clsDLEvento::queryToDB(['correo'=>$vdatosRequest['correo']])->get();
                if ( count($_datosEventoCorreo) > 0 ) {
                    $vrespuesta['codigo']=0;
                    $vrespuesta['mensaje']='Ya forma parte del registro del evento.';
                }
                else {
                    $_id=0;
                    $vdatosRequest['anio']=date('y');
                    $vdatosRequest['folio']=date('mdyHis');
                    $vdatosRequest['nombre']=$vrequest['nombre'];
                    $vdatosRequest['telefono']=$vrequest['telefono'];
                    $vdatosRequest['correo']=$vrequest['correo'];

                    $cargo=$vrequest['cargo_otro'];
                    if (isset($cargo) && $cargo != '') {
                        $vdatosRequest['cargo']=$cargo;
                    }
                    
                    $vdatosRequest['mesa_trabajo']=1;
                    
                    $vflEvento=new clsDLEvento;
                    $vflEvento->fill($vdatosRequest)->save();
                    $_id=$vflEvento->id;

                    $vrespuesta['folio']=$vflEvento->folio;
                    $vrespuesta['nombre']=$vflEvento->nombre;

                    $this->sendEmailInvitado($_id, 1);
                }                                    
            }
            else {
                $vflDependencia=clsDLDependencia::findOrFail((int)$vdatosRequest['id_dependencia']);
                $vrespuesta['codigo']=0;
                $vrespuesta['mensaje']='Ya existen '. count($_datosEvento) .' registros en, '. $vflDependencia->nombre .', o ya forma parte del registro.';
            }
            DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function store_entrante(Request $vrequest)
     {
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';

        $vdatoValidar=[];
        $vdatoValidar['id_dependencia']='required';
        $vdatoValidar['nombre']='required';
        $vdatoValidar['telefono']='required';
        $vdatoValidar['correo']='required';

        $validator = Validator::make($vrequest->all(), $vdatoValidar);
        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'mensaje'=> 'Favor de llenar los datos correctamente.'], 202);
        }

        $vdatosRequest=$vrequest->all();
        DB::beginTransaction();
        try {
            $query['id_dependencia']=(int)$vdatosRequest['id_dependencia'];
            $query['_saliente']=1;
            // $query['correo']=$vdatosRequest['correo'];

            $_datosEvento=clsDLEvento::queryToDB($query)->get();
            if ( (int)count($_datosEvento) <= 4 ) {

                $_datosEventoCorreo=clsDLEvento::queryToDB(['correo'=>$vdatosRequest['correo']])->get();
                if ( count($_datosEventoCorreo) > 0 ) {
                    $vrespuesta['codigo']=0;
                    $vrespuesta['mensaje']='Ya forma parte del registro del evento.';
                }
                else {
                    $_id=0;
                    $vdatosRequest['anio']=date('y');
                    $vdatosRequest['folio']=date('mdyHis');
                    $vdatosRequest['nombre']=$vrequest['nombre'];
                    $vdatosRequest['telefono']=$vrequest['telefono'];
                    $vdatosRequest['correo']=$vrequest['correo'];
                    $vdatosRequest['entrante']=1;
                    $vdatosRequest['mesa_trabajo']=1;
                    
                    $vflEvento=new clsDLEvento;
                    $vflEvento->fill($vdatosRequest)->save();
                    $_id=$vflEvento->id;
                    
                    $vrespuesta['folio']=$vflEvento->folio;
                    $vrespuesta['nombre']=$vflEvento->nombre;

                    $this->sendEmailInvitado($_id, 1);

                }              
            }
            else {
                $vflDependencia=clsDLDependencia::findOrFail((int)$vdatosRequest['id_dependencia']);
                $vrespuesta['codigo']=0;
                $vrespuesta['mensaje']='Ya existen '. count($_datosEvento) .' registros en, '. $vflDependencia->nombre .', o ya forma parte del registro.';
            }
            DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function store_internos(Request $vrequest)
     {
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';

        $vdatoValidar=[];
        $vdatoValidar['nombre']='required';
        $vdatoValidar['telefono']='required';
        $vdatoValidar['correo']='required';
        $vdatoValidar['cargo']='required';

        $validator = Validator::make($vrequest->all(), $vdatoValidar);
        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'mensaje'=> 'Favor de llenar los datos correctamente.'], 202);
        }

        $vdatosRequest=$vrequest->all();
        DB::beginTransaction();
        try {
            $_datosEventoCorreo=clsDLEvento::queryToDB(['correo'=>$vdatosRequest['correo']])->get();
            if ( count($_datosEventoCorreo) > 0 ) {
                $vrespuesta['codigo']=0;
                $vrespuesta['mensaje']='Ya forma parte del registro del evento.';
            }
            else {
                $_id=0;
                $vdatosRequest['anio']=date('y');
                $vdatosRequest['folio']=date('mdyHis');
                $vdatosRequest['nombre']=$vrequest['nombre'];
                $vdatosRequest['telefono']=$vrequest['telefono'];
                $vdatosRequest['correo']=$vrequest['correo'];
                $vdatosRequest['id_dependencia']=69;
                $vdatosRequest['internos']=1;
                
                $vflEvento=new clsDLEvento;
                $vflEvento->fill($vdatosRequest)->save();
                $_id=$vflEvento->id;

                $vrespuesta['folio']=$vflEvento->folio;
                $vrespuesta['nombre']=$vflEvento->nombre;

                $this->sendEmailInvitado($_id, 1);
            }
                                
            
            DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function sendEmailInvitado($vid, $tipo=0)
     {
        /**
         * Sandro Alan Gómez Aceituno
         * Metodo para enviar un correo electrónico de invitación al evento X.
         * 19 de Julio de 2022
         * */

        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='Exito.';
        try { 

            $vflEvento=clsDLEvento::findOrFail($vid);
            # Begin Envio de Correo Electrónico.
            $datosEnviarCorreo=array();
            $datosEnviarCorreo['asunto']='Invitación a evento';
            $datosEnviarCorreo['correoDestinatario']=$vflEvento->correo;
            $datosEnviarCorreo['nombreDestinatario']=$vflEvento->nombre;
            if ( $tipo == 0) {
                $datosEnviarCorreo['cuerpo']=clsCorreoPlantilla::invitacionInauguracion(['nombre'=>$vflEvento->nombre, 'folio'=>$vflEvento->folio]);
            }
            else {
                $datosEnviarCorreo['cuerpo']=clsCorreoPlantilla::invitacionMesaTrabajo(['nombre'=>$vflEvento->nombre, 'folio'=>$vflEvento->folio]);
            }        

            // $vformato=new FormatoController();
            // $attachment=$vformato->invitacionPDF($vid); 

            $vstatusCorreo=0;
            $vstatusCorreo=clsCorreo::sendEmail($datosEnviarCorreo, 0);
            if ($vstatusCorreo == 1) {
                $vrespuesta['mensaje']='Invitación enviada exitosamente al correo <b>'. $vflEvento->correo .'</b>.';
                $vflEvento->correoEnviado=1;
                $vflEvento->save();
            }
            # End Code
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function attendanceStore($vfolio)
     {
        /**
         * Sandro Alan Gómez Aceituno
         * Metodo para guardas las asistencias de los invitados al evento.
         * 05 de Septiembre de 2024
         * */

        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='La asistencia ha sido registrada exitosamente.';
        $vdatosRequest=[];
        try {
            
                $vdatosEvento=clsDLEvento::queryToDB(['folio'=> trim($vfolio)])->first();
                if ( isset($vdatosEvento) ) {

                    //$vdatosRequest['asistencia']=1;
                    //$vdatosRequest['asistencia_hora']=date('H:i:s');

                    $vflEvento=clsDLEvento::findOrFail($vdatosEvento->id);
                    


                    if ( (int)$vflEvento->evento == 1 ) {
                        $vdatosRequest['asistencia_hora_inauguracion']=date('H:i:s');
                    }
                    if ( (int)$vflEvento->mesa_trabajo == 1 ) {
                        $vdatosRequest['asistencia_hora_mesa']=date('H:i:s');
                    }
                    if ( (int)$vflEvento->internos == 1 ) {
                        $vdatosRequest['asistencia_hora_mesa']=date('H:i:s');
                    }

                    $dependencia=clsDLDependencia::findOrFail($vflEvento->id_dependencia);

                    $vflEvento->fill($vdatosRequest)->save();
                    $vrespuesta['data']=$vflEvento;
                    $vrespuesta['dependencia']=$dependencia->nombre;


                }
                else {
                    $vrespuesta['codigo']=0;
                    $vrespuesta['mensaje']='No se encuentra ningún registro con este folio <b>'. $vfolio .'</b>, verifique o intente de nuevo.';
                }
                      
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function attendanceEventStore($id)
     {
        /**
         * Sandro Alan Gómez Aceituno
         * Metodo para guardas las asistencias de los invitados al evento.
         * 05 de Septiembre de 2024
         * */

        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['icono']='success';
        $vrespuesta['mensaje']='La asistencia ha sido registrada exitosamente.';
        $vdatosRequest=[];
        try {
            $vflEvento=clsDLEvento::findOrFail($id);
            //if ( !isset($vflEvento->asistencia_hora) ) {
                if ( (int)$vflEvento->evento == 1 ) {
                    $vdatosRequest['asistencia_hora_inauguracion']=date('H:i:s');
                }
                if ( (int)$vflEvento->mesa_trabajo == 1 ) {
                    $vdatosRequest['asistencia_hora_mesa']=date('H:i:s');
                }
                if ( (int)$vflEvento->internos == 1 ) {
                    $vdatosRequest['asistencia_hora_mesa']=date('H:i:s');
                }
                                
                $vflEvento->fill($vdatosRequest)->save();
                $vrespuesta['data']=$vflEvento;
            //}
            //else {
            //    $vrespuesta['codigo']=0;
            //    $vrespuesta['icono']='warning';
            //    $vrespuesta['mensaje']='El invitado ya se encuentra en el evento.';
            //}
        }
        catch( Exception $vexception ) {
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['icono']='danger';
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }



    /* Resgistro de persona especiales */

    public function especiales_store(Request $vrequest)
     {
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=1;
        $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';

        $vdatoValidar=[];
        $vdatoValidar['nombre']='required|string';
        $vdatoValidar['telefono']='required|string';
        $vdatoValidar['correo']='required|string|email|max:255';
        $vdatoValidar['cargo']='required|string';
        $vdatoValidar['procedencia']='required|string';

        $validator = Validator::make($vrequest->all(), $vdatoValidar);
        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'mensaje'=> 'Favor de llenar los datos correctamente.'], 202);
        }

        $vdatosRequest=$vrequest->all();
        DB::beginTransaction();
        try {
            $_datosEvento=clsDLEvento::queryToDB(['correo'=> trim($vdatosRequest['correo'])])->first();
            if ( !isset($_datosEvento) ) {
               
                $vdatosRequest['anio']=date('y');
                $vdatosRequest['folio']='INEV'. date('mdyHis');

                $sendEmail=1;
                if ( isset($vdatosRequest['sendEmail']) ) {
                    $sendEmail=$vdatosRequest['sendEmail'];
                    $vdatosRequest['asistencia']=1;
                    $vdatosRequest['asistencia_hora']=date('H:i:s');
                }

                $vflEvento=new clsDLEvento;
                $vflEvento->fill($vdatosRequest)->save();    

                if ( isset($vdatosRequest['correo']) ) {
                    if ( $sendEmail == 1 ) {
                        $this->sendEmailInvitado($vflEvento->id, false);
                    }
                }                
            }
            else {
                $vrespuesta['codigo']=0;
                $vrespuesta['mensaje']='Estos datos ya han sido registrados con anterioridad.';
                $vrespuesta['query']=$_datosEvento;
            }
            DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['mensaje']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function destroy($id)
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 01 de Noviembre de 2024
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
       
        $vstatus=200;
        $vfiltro=array();
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'success',
            'mensaje'=> 'El registro ha sido eliminado correctamente.'
        ];
        try {            
            $registro= clsDLEvento::find($id);
            $registro->id_usuario_elimino= Auth::user()->id;
            $registro->save();

            $registro->delete();
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

    public function recovery($id)
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 01 de Noviembre de 2024
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
       
        $vstatus=200;
        $vfiltro=array();
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'success',
            'mensaje'=> 'El registro ha sido recuperado correctamente.'
        ];
        try {            
            $registro= clsDLEvento::withTrashed()->find($id); //withTrashed()->get();;
            $registro->deleted_at=NULL;
            $registro->save();
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