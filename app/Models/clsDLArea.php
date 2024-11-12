<?php
/*************************************************
Nombre: clsDLArea.php
Descripción: Consultas a la tabla c_area.

**************************************************/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class clsDLArea extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'c_area';
    protected $fillable = [
        'id',
        'id_area',
        'area'
    ];

    protected $hidden = [ ];

    public static function queryToDB($vfiltros=[])
     {
        return clsDLArea::select(
            'c_area.id',
            'c_area.id_padre',
            'c_area.area'
        )
        ->groupBy('c_area.id'); 
     }
}