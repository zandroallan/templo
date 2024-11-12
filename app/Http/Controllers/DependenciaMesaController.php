<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Classes\clsCorreoPlantilla;
use App\Http\Classes\clsCorreo;
use App\Models\clsDLEvento;
use App\Models\clsDLDependenciaMesa;
use QrCode;
use Auth;
use DB;

class DependenciaMesaController extends Controller
{
    public function __construct() { }

    # Inauguracion
    public function store(Request $vrequest)
     {
        $otros=0;
        $vstatus=200;
        $vrespuesta=array();
        $vrespuesta['codigo']=0;
        $vrespuesta['icono']='warning';
        $vrespuesta['mensaje']='El registro no ha podido ser guardado, intente de nuevo.';

        $vdatoValidar=[];
        $vdatoValidar['id_dependencia']='required';
        $vdatoValidar['fecha']='required';
        $vdatoValidar['asunto']='required';
        $vdatoValidar['descripcion']='required';

        $validator = Validator::make($vrequest->all(), $vdatoValidar);
        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'mensaje'=> 'Favor de llenar los datos correctamente.'], 202);
        }

        $_Data_MDL_Dependencia_Mesa=$vrequest->all();
        $_id_dependencia_mesa=(int)$_Data_MDL_Dependencia_Mesa['id'];
        DB::beginTransaction();
        try {

            $vrutaCarpeta= '/files/'. date('Y') .'/'. $vrequest->id_dependencia;
            $files = $vrequest->file('files');
            if ($vrequest->hasFile('files')) {
                if ($vrequest->file('files')->isValid()) {
                    $vnombreArchivoExtension=$files->getClientOriginalName();
                    $vrequest->file('files')->storeAs($vrutaCarpeta, $vnombreArchivoExtension);                  
                    
                    $_Data_MDL_Dependencia_Mesa["path"]=$vrutaCarpeta .'/'. $vnombreArchivoExtension;
                }
            }
            $_Data_MDL_Dependencia_Mesa["fecha"]=self::anio_mes_dia($_Data_MDL_Dependencia_Mesa['fecha']);
            $_Data_MDL_Dependencia_Mesa["id_users"]=Auth::User()->id;

            if ( $_id_dependencia_mesa != 0) {
                $_MDL_Dependencia_Mesa=clsDLDependenciaMesa::findOrFail($_id_dependencia_mesa);
                $vrespuesta['mensaje']='El registro ha sido modificado exitosamente.';
            }
            else {
                $_MDL_Dependencia_Mesa=new clsDLDependenciaMesa;
                $vrespuesta['mensaje']='El registro ha sido guardado exitosamente.';
            }
            
            $_MDL_Dependencia_Mesa->fill($_Data_MDL_Dependencia_Mesa)->save();

            $vrespuesta['codigo']=1;
            $vrespuesta['icono']='success';
            
            
            DB::commit();
        }
        catch( Exception $vexception ) {
            DB::rollback();
            $vstatus=500;
            $vrespuesta['codigo']=-1;
            $vrespuesta['icono']='danger';
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
            $_MDL_Dependencia_Mesa= clsDLDependenciaMesa::findOrFail($id);
            $_MDL_Dependencia_Mesa->id_users_elimino=Auth::user()->id;
            $_MDL_Dependencia_Mesa->save();

            $_MDL_Dependencia_Mesa->delete();
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

    public function download_file($id)
     {
        /*
         * Funcion para descargar los anexos que se cargan en los acuerdos
         * 07 de Noviembre de 2024
         */

        $_MDL_Dependencia_Mesa=clsDLDependenciaMesa::findOrFail($id);
        $pathFile=storage_path() .'/app'. $_MDL_Dependencia_Mesa->path;

        // dd($pathFile);
        // exit();

        if ( File::exists($pathFile) ) {
            return response()->download($pathFile);
        }
     }

    public function anio_mes_dia($date, $type=0)
     {
        if ( ($date=='') || ($date=='0000-00-00') ) {
            return '';
        }
        if( $type==1 ) {
            $char='-';
            $charto='/';
        }
        if( $type==2 ) {
            $char='-';
            $charto='-';
        }
        else {
            $char='/';
            $charto='-';
        }

        $vector_fecha=explode($char,$date);
        $aux=$vector_fecha[2];
        $vector_fecha[2]=$vector_fecha[0];
        $vector_fecha[0]=$aux;
        return str_replace(' ', '', implode($charto, $vector_fecha));
     }
}