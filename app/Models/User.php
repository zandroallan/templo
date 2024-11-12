<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $dates = ['deleted_at'];
    protected $table = 'users';

    protected $fillable = [
        'name', 
        'id_dependencia',     
        'email',
        'foto',
        'password',
        'password_remember',
        'decrypt_password',
        'theme'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function queryToDB($vfiltros=[])
     {
        $vqueryToDB=User::select(
            'users.*'
            // 'c_dependencia.dependencia'
        );
        $vqueryToDB=$vqueryToDB->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id');

        if ( array_key_exists('id', $vfiltros) ) {
            $vdatoFiltro=$vfiltros["id"];
            $vqueryToDB=$vqueryToDB->where( function($sql) use ($vdatoFiltro) {
                $sql->where('users.id', $vdatoFiltro);
            });
        }
        if ( array_key_exists('id_dependencia', $vfiltros) ) {
            $vdatoFiltro=$vfiltros["id_dependencia"];
            $vqueryToDB=$vqueryToDB->where( function($sql) use ($vdatoFiltro) {
                $sql->where('users.id_dependencia', $vdatoFiltro);
            });
        }

        if ( Auth::User()->hasRole(['coordinador-entrante', 'coordinador-saliente'])) {
            $vqueryToDB->where('model_has_roles.role_id', 2)->orWhere('model_has_roles.role_id', 3);
        }

        $vqueryToDB=$vqueryToDB->orderBy('users.id', 'DESC');
        return $vqueryToDB;
     }

    public static function mi_perfil()
     {
        return User::select(
            'users.id',
            'users.id_dependencia',
            'c_dependencia.nombre as area',
            'users.name',
            'users.email',
            'users.foto as imagen'
        )
        ->join('c_dependencia', 'users.id_dependencia', '=', 'c_dependencia.id')
        ->where('users.id', Auth::User()->id);
     }
}
