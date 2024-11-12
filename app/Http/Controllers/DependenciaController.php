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

class DependenciaController extends Controller
{
    public function __construct() { }

    public function dependencia_mesa_trabajo_index()
     {
        return view('mesa.index');
     }

    public function dependencia_acuerdos_mesa_index($id)
     {
        return view('mesa.show', ['id_dependencia'=>$id]);
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

                        $this->sendEmailInvitado($_id);
                    }
                }
                else {
                    $vflDependencia=clsDLDependencia::findOrFail((int)$vdatosRequest['id_dependencia']);
                    $vrespuesta['codigo']=0;
                    $vrespuesta['mensaje']='Ya se envió la invitación a, '. $vflDependencia->nombre .'.';
                    $vrespuesta['query']=$_datosEvento;
                }
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

                $this->sendEmailInvitado($_id);  
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

}