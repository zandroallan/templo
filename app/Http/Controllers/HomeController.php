<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\clsDLProfesor;
use App\Models\clsDLAlumno;
use App\Models\User;
use Auth;
use Hash;
use DB;

class HomeController extends Controller
 {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
        $this->middleware('auth');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
     {
        $id_send_parameter=0;
        // $id_persona=Auth::user()->id_persona;
        // if ( Auth::user()->hasRole('Root') ) {
            return view('layouts.home-root');
        // }
         
     }
       public function mi_perfil()
     {
        return view('perfil.index');
     }

    public function perfil_datos()
    {
        $vstatusHTTP=200;
        $vrespuesta=[];
        $vrespuesta=['numero'=> 1, 'respuesta'=> 'Datos de mi perfil.'];
        try {
            $vrespuesta['data']=User::mi_perfil()->first();
        }
        catch(Exception $vexception ) {
            $vstatusHTTP=500;
            $vrespuesta['message']=$vexception->getMessage();
        }
        return response()->json($vrespuesta, $vstatusHTTP);
    }

    public function updateData(Request $vrequest)
     {   
        $vstatus=200;
        $vrespuesta=['numero'=> 0, 'icon'=>'warning', 'respuesta'=> 'No se ha podido registrar los datos, intente de nuevo.'];

        $validator = Validator::make($vrequest->all(), [
            'name'=> ['required', 'string', 'max:255']
            // 'primer_apellido'=> ['required', 'string', 'max:60'],
            // 'segundo_apellido'=> ['required', 'string', 'max:60'],
            // 'curp'=> ['required', 'string', 'max:18'],
            // 'correo'=> ['required', 'string', 'max:80']
        ]);

        if ( $validator->fails() ) {
            return response()->json(['numero'=>0, 'icon'=>'warning', 'respuesta'=> $validator->errors()->toJson()], 202);
        }

        $vrespuesta=['numero'=> 1, 'icon'=>'success', 'respuesta'=> 'Datos registrados correctamente.'];
        DB::beginTransaction();
        try {
            $_new_data=true;
            $_Data_User=$vrequest->all();
            // $id_usuario=(int)$_Data_User['id'];

            $_new_data=false;
            $_MDL_Data_User=User::findOrFail(Auth::User()->id);

            $_url_file='/tools/perfiles/'. Auth::User()->id;
            $_imagen_form = $vrequest->file('imagen');
            if ( $vrequest->hasFile('imagen') ) {
                if ( $vrequest->file('imagen')->isValid() ) {
                    $_name_file_extention=$_imagen_form->getClientOriginalName();
                    $vrequest->file('imagen')->storeAs($_url_file, $_name_file_extention, 'fotos');

                    $_Data_User["foto"]= '/public'. $_url_file .'/'. $_name_file_extention;
                }
            }

            $_MDL_Data_User->fill($_Data_User)->save();
            DB::commit();
        }
        catch ( Exception $vexception ){
            $vstatus=500;
            $vrespuesta=['numero'=> 1, 'icon'=>'danger', 'respuesta'=> $vexception->getMessage()];
        }
        return response()->json($vrespuesta, $vstatus);
     }

    public function updatePassword(Request $vrequest)
     {   
        $vstatus=200;
        $vrespuesta=['numero'=> 0, 'icon'=>'warning', 'respuesta'=> 'No se ha podido actualizar la contraseña.'];

        $validator = Validator::make($vrequest->all(), [
            'password' => 'required|same:confirm-password'
        ]);

        if ( $validator->fails() ) {
            return response()->json(['numero'=>0, 'icon'=>'warning', 'respuesta'=> $validator->errors()->toJson()], 202);
        }

        $vrespuesta=['numero'=> 1, 'icon'=>'success', 'respuesta'=> 'Contraseña actualizado correctamente.'];
        DB::beginTransaction();
        try {
            $_MDL_Data_User=User::findOrFail(Auth::User()->id);

            $_Data_User=$vrequest->all();
            $_Data_User['password']=Hash::make($_Data_User['password']);
            $_Data_User['password_recover']=base64_encode($_Data_User['password']);
            
            $_MDL_Data_User->fill($_Data_User)->save();
            DB::commit();
        }
        catch ( Exception $vexception ){
            $vstatus=500;
            $vrespuesta=['numero'=> 1, 'icon'=>'danger', 'respuesta'=> $vexception->getMessage()];
        }
        return response()->json($vrespuesta, $vstatus);
     }
 }
