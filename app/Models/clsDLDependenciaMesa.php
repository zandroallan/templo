<?php
/*************************************************
Nombre: clsDLDependenciaMesa.php
Descripción: Consultas a la tabla c_dependencia_mesa.

**************************************************/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class clsDLDependenciaMesa extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'p_dependencia_mesa';
    protected $fillable = [
        'id',
        'id_dependencia',
        'id_users',
        'id_users_elimino',
        'asunto',
        'descripcion',
        'fecha',
        'path',
        'archivo'
    ];

    protected $hidden = [ ];

    public static function queryToDB($vfiltros=[])
     {
        return clsDLDependenciaMesa::select(
            'p_dependencia_mesa.id',
            'p_dependencia_mesa.id_dependencia',
            'p_dependencia_mesa.id_users',
            'p_dependencia_mesa.asunto',
            'p_dependencia_mesa.descripcion',
            'p_dependencia_mesa.fecha',
            'p_dependencia_mesa.path',
            'p_dependencia_mesa.archivo'
        )
        ->join('c_dependencia', 'p_dependencia_mesa.id_dependencia', '=', 'c_dependencia.id')
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id', $vfiltros))
                $vsql->where('p_dependencia_mesa.id', $vfiltros['id']);
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_dependencia', $vfiltros))
                $vsql->where('p_dependencia_mesa.id_dependencia', $vfiltros['id_dependencia']);
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_users', $vfiltros))
                $vsql->where('p_dependencia_mesa.id_users', $vfiltros['id_users']);
        })
        ->groupBy('p_dependencia_mesa.id'); 
     }
}