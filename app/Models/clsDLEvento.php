<?php
/*************************************************
Nombre: clsDLEvento.php
Descripción: Consultas a la tabla telefonia.
Creación: Juev 9 de Sept de 2021
**************************************************/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class clsDLEvento extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'p_evento';
    protected $fillable = [
        'id',
        'id_dependencia',
        'folio',
        'cargo',
        'nombre',        
        'telefono',
        'correo',
        'anio',
        //'asistencia',
        'asistencia_hora_inauguracion',
        'asistencia_hora_mesa',
        'correoEnviado',
        'representacion',
        'evento',
        'mesa_trabajo',
        'entrante',
        'saliente',
        'internos'
    ];

    protected $hidden = [ ];

    public static function queryToDB($vfiltros=[])
     {
        $result=clsDLEvento::select(
            'p_evento.id',
            'p_evento.id_dependencia',
            'p_evento.folio',
            'p_evento.cargo',
            'p_evento.nombre',
            'p_evento.telefono',
            'p_evento.correo',            
            'p_evento.anio',
            //'p_evento.asistencia',
            'p_evento.asistencia_hora_inauguracion',
            'p_evento.asistencia_hora_mesa',
            'p_evento.correoEnviado',
            'p_evento.representacion',
            'p_evento.evento',
            'p_evento.mesa_trabajo',
            'p_evento.entrante',
            'p_evento.saliente',
            'p_evento.internos',
            'p_evento.deleted_at',
            'c_dependencia.nombre as dependencia'
        )
        ->join('c_dependencia', 'p_evento.id_dependencia', '=', 'c_dependencia.id')
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id', $vfiltros)){
                $vsql->where('p_evento.id', $vfiltros['id']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_dependencia', $vfiltros)){
                $vsql->where('p_evento.id_dependencia', $vfiltros['id_dependencia']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('folio', $vfiltros)){
                $vsql->where('p_evento.folio', $vfiltros['folio']);
            }
        })        
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('telefono', $vfiltros)){
                $vsql->where('p_evento.telefono', $vfiltros['telefono']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('correo', $vfiltros)){
                $vsql->where('p_evento.correo', $vfiltros['correo']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('asistencia', $vfiltros)){
                $vsql->where('p_evento.asistencia', $vfiltros['asistencia']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('evento', $vfiltros)){
                $vsql->where('p_evento.evento', $vfiltros['evento']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('entrante', $vfiltros)){
                $vsql->where('p_evento.entrante', $vfiltros['entrante']);
            }
        })
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('saliente', $vfiltros)){
                $vsql->where('p_evento.saliente', $vfiltros['saliente']);
            }
        })        
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('_saliente', $vfiltros)){
                $vsql->where('p_evento.evento', 1)->orWhere('p_evento.saliente', 1);
            }
        })
        ->orderBy('p_evento.id', 'DESC');
        return $result;
     }
}