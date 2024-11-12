<?php
/*************************************************
Nombre: clsDLDependencia.php
Descripción: Consultas a la tabla c_dependencia.

**************************************************/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class clsDLDependencia extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'c_dependencia';
    protected $fillable = [
        'id',
        'acronimo',
        'nombre',
        'dia',
        'hora',
        'visible'
    ];

    protected $hidden = [ ];

    public static function queryToDB($vfiltros=[])
     {
        return clsDLDependencia::select(
            'c_dependencia.id',
            'c_dependencia.acronimo',
            'c_dependencia.nombre',
            'c_dependencia.dia',
            'c_dependencia.hora'
        )
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('visible', $vfiltros))
                $vsql->where('c_dependencia.visible', $vfiltros['visible']);
        })
        ->groupBy('c_dependencia.id'); 
     }

    public static function queryInauguracion($vfiltros=[])
     {
        return clsDLDependencia::select(
            'c_dependencia.id',
            'c_dependencia.acronimo',
            'c_dependencia.nombre',
            'c_dependencia.dia',
            'c_dependencia.hora',
            DB::raw('
                (
                    SELECT count(DISTINCT p_evento.folio)
                    FROM p_evento                    
                    WHERE p_evento.id_dependencia=c_dependencia.id
                        AND p_evento.evento=1
                        AND p_evento.deleted_at IS NULL
                ) as total_inauguracion
            ')
        )
        // ->leftJoin('c_municipio', 'c_municipio.id', '=', 'c_localidad.id_municipio')
        // ->leftJoin('c_delegacion', 'c_municipio.id_delegacion', '=', 'c_delegacion.id')
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_dependencia', $vfiltros))
                $vsql->where('c_dependencia.id', '=', $vfiltros['id_dependencia']);
        })
        ->orderBy('c_dependencia.id', 'ASC');
     }

    public static function queryDependenciaMesaTrabajo($vfiltros=[])
     {
        return clsDLDependencia::select(
            'c_dependencia.id',
            'c_dependencia.acronimo',
            'c_dependencia.nombre',
            'c_dependencia.dia',
            'c_dependencia.hora',
            DB::raw('
                (
                    SELECT count(DISTINCT p_dependencia_mesa.id)
                    FROM p_dependencia_mesa                    
                    WHERE p_dependencia_mesa.id_dependencia=c_dependencia.id
                        AND p_dependencia_mesa.deleted_at IS NULL
                ) as total_acuerdos
            ')
        )
        // ->leftJoin('c_municipio', 'c_municipio.id', '=', 'c_localidad.id_municipio')
        // ->leftJoin('c_delegacion', 'c_municipio.id_delegacion', '=', 'c_delegacion.id')
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_dependencia', $vfiltros))
                $vsql->where('c_dependencia.id',  $vfiltros['id_dependencia']);
        })
        ->orderBy('c_dependencia.id', 'ASC');
     }

    public static function queryMesaTrabajo($vfiltros=[])
     {
        return clsDLDependencia::select(
            'c_dependencia.id',
            'c_dependencia.acronimo',
            'c_dependencia.nombre',
            'c_dependencia.dia',
            'c_dependencia.hora',
            DB::raw('
                (
                    SELECT count(DISTINCT p_evento.folio)
                    FROM p_evento                    
                    WHERE p_evento.id_dependencia=c_dependencia.id
                        AND p_evento.deleted_at IS NULL
                        AND ( p_evento.evento=1
                        OR p_evento.saliente=1 )
                ) as total_mesa_saliente
            '),
            DB::raw('
                (
                    SELECT count(p_evento.id)
                    FROM p_evento                    
                    WHERE p_evento.id_dependencia=c_dependencia.id
                    AND p_evento.deleted_at IS NULL
                    AND p_evento.entrante=1
                ) as total_mesa_entrante
            ')
        )
        // ->leftJoin('c_municipio', 'c_municipio.id', '=', 'c_localidad.id_municipio')
        // ->leftJoin('c_delegacion', 'c_municipio.id_delegacion', '=', 'c_delegacion.id')
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_dependencia', $vfiltros))
                $vsql->where('c_dependencia.id', '=', $vfiltros['id_dependencia']);
        })
        // ->where(function($vsql) use ($vfiltros){
        //     if(array_key_exists('entrante', $vfiltros))
        //         $vsql->where('p_evento.entrante', '=', $vfiltros['entrante']);
        // })
        // ->where(function($vsql) use ($vfiltros){
        //     if(array_key_exists('saliente', $vfiltros))
        //         $vsql->where('p_evento.saliente', '=', $vfiltros['saliente']);
        // })
        ->orderBy('c_dependencia.hora', 'ASC')
        ->orderBy('c_dependencia.dia', 'ASC');
     }

    public static function queryComentarios($vfiltros=[])
     {
        return clsDLDependencia::select(
            'c_dependencia.id',
            'c_dependencia.acronimo',
            'c_dependencia.nombre',
            'c_dependencia.dia',
            'c_dependencia.hora',
            DB::raw('
                (
                    SELECT count(DISTINCT p_evento.folio)
                    FROM p_evento
                    WHERE p_evento.id_dependencia=c_dependencia.id
                        AND p_evento.deleted_at IS NULL
                        AND ( p_evento.evento=1
                        OR p_evento.saliente=1 )
                ) as total_mesa_saliente
            '),
            DB::raw('
                (
                    SELECT count( p_evento.folio)
                    FROM p_evento                    
                    WHERE p_evento.id_dependencia=c_dependencia.id
                        AND p_evento.deleted_at IS NULL
                        AND p_evento.entrante=1
                ) as total_mesa_entrante
            ')
        )
        // ->leftJoin('c_municipio', 'c_municipio.id', '=', 'c_localidad.id_municipio')
        // ->leftJoin('c_delegacion', 'c_municipio.id_delegacion', '=', 'c_delegacion.id')
        ->where(function($vsql) use ($vfiltros){
            if(array_key_exists('id_dependencia', $vfiltros))
                $vsql->where('c_dependencia.id', '=', $vfiltros['id_dependencia']);
        })
        // ->where(function($vsql) use ($vfiltros){
        //     if(array_key_exists('entrante', $vfiltros))
        //         $vsql->where('p_evento.entrante', '=', $vfiltros['entrante']);
        // })
        // ->where(function($vsql) use ($vfiltros){
        //     if(array_key_exists('saliente', $vfiltros))
        //         $vsql->where('p_evento.saliente', '=', $vfiltros['saliente']);
        // })
        ->orderBy('c_dependencia.hora', 'ASC')
        ->orderBy('c_dependencia.dia', 'ASC');
     }
}