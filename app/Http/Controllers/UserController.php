<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Auth;
use Hash;
use DB;

class UserController extends Controller
{
    public function usuarios_api(Request $vrequest)
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 07 de Febrero de 2023
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response json
         */

        $vstatus=200;
        $vfiltro=array();
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'success',
            'mensaje'=> 'Exito'
        ];
        try {            
            switch ($vrequest->input('method')) {
                case 'show':
                    $queryUsuarios=User::find($vrequest->id_usuario);
                    $queryUsuarios['roles']=$queryUsuarios->roles()->pluck('name');

                    $_MDL_Roles=[];
                    if ( Auth::User()->hasRole(['coordinador-saliente'])) {
                        $_MDL_Roles=Role::select('id', 'name')->where('id', 2)->orWhere('id', 3)->orWhere('id', 5)->get();
                    }
                    else {
                        $_MDL_Roles=Role::select('id', 'name')->get();
                    }

                    $vrespuesta['roles']=$_MDL_Roles;
                    $vrespuesta['usuarios']=$queryUsuarios;
                  break;
                case 'get':
                    $arrayUsuarios=array();
                    $arrayFiltros=array();
                    // if ( !Auth::user()->hasRole('Profesor') ) 
                    //     $arrayFiltros['id_persona']=Auth::user()->id_persona;

                    if ( Auth::User()->hasRole(['enlace-entrante', 'enlace-saliente'])) {
                        $arrayFiltros['id_dependencia']=Auth::User()->id_dependencia;
                    }

                    $queryUsuarios=User::queryToDB($arrayFiltros)->get();
                    foreach ( $queryUsuarios as $usuarios ) {
                        $usuarios['roles']=$usuarios->roles()->pluck('name');
                        array_push($arrayUsuarios, $usuarios);
                    }
                    $vrespuesta['usuarios']=$arrayUsuarios;

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

    public function roles_api()
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 07 de Febrero de 2023
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response json
         */

        $vstatus=200;
        $vfiltro=array();
        $vrespuesta=[
            'codigo'=> 1,
            'icono'=> 'success',
            'mensaje'=> 'Exito'
        ];
        try {
            $vrespuesta['roles'] = Role::select('id', 'name')->get();
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

    public function index(Request $request)
     {
        $data = User::orderBy('id','DESC')->paginate(5);

        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
     }
    
    public function create()
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 07 de Febrero de 2023
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */

        return view('users.create');
     }

    public function store(Request $request)
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 07 de Febrero de 2023
         * Show the form for creating a new resource.
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        $vstatus=201;
        $vfiltro=array();
        $vrespuesta=[
            'codigo'=> 0,
            'icono'=> 'warning',
            'mensaje'=> 'El usuario no se ha podido registrar, intente de nuevo.'
        ];

        $validator=Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            // 'id_dependencia' => 'required|integer|gt:0'
        ]);

        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'icono'=>'warning', 'mensaje'=> $validator->errors()->toJson()], 201);
        }

        try {            
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['password_remember'] = $input['password'];

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

            $vrespuesta=[
                'codigo'=> 1,
                'icono'=> 'success',
                'mensaje'=> 'Usuario agregado satisfactoriamente.'
            ];
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
        $user = User::find($id);
        return view('users.show',compact('user'));
     }


    public function edit($id_usuario)
     {
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        return view('users.edit', 
            [ 'id_user' => $id_usuario ]
        );

     }

    public function update(Request $request, $id_usuario)
     {
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        $vstatus=201;
        $vfiltro=array();
        $vrespuesta=[
            'codigo'=> 0,
            'icono'=> 'warning',
            'mensaje'=> 'Los datos del usuario no se han podido actualizar.'
        ];

        $validator=Validator::make($request->all(), [
            'id_dependencia' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id_usuario,
            'roles' => 'required'
        ]);

        if ( $validator->fails() ) {
            return response()->json(['codigo'=>0, 'icono'=>'warning', 'mensaje'=> $validator->errors()->toJson()], 201);
        }
        try { 
            $input = $request->all();

            $vdlUsuario = User::find($id_usuario);
            $vdlUsuario->update($input);
            DB::table('model_has_roles')->where('model_id', $id_usuario)->delete();

            $vdlUsuario->assignRole($request->input('roles'));

            $vrespuesta=[
                'codigo'=> 1,
                'icono'=> 'success',
                'mensaje'=> 'Usuario agregado satisfactoriamente.'
            ];
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

    public function destroy($id_usuario)
     {
        /**
         * Sandro Alan Gomez Aceituno
         * 07 de Febrero de 2023
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
            'mensaje'=> 'Usuario eliminado satisfactoriamente.'
        ];
        try {            
            User::find($id_usuario)->delete();
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