<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Role extends Model
 {
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
        'guard_name',
    ];

    protected $hidden = [
        //'id',
    ];

    public static function queryToDB($vfiltros=[])
     {
        $vqueryToDB=Role::select(
            'roles.*'
        );
        $vqueryToDB=$vqueryToDB->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id');

        if(array_key_exists('model_id', $vfiltros)) {
            $vdatoFiltro=$vfiltros["model_id"];
            $vqueryToDB=$vqueryToDB->where( function($sql) use ($vdatoFiltro) {
                $sql->where('model_has_roles.model_id', $vdatoFiltro);
            });
        }
        return $vqueryToDB;
     }
 }