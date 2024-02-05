<?php namespace Mberizzo\Acsitewinners\Models;

use Illuminate\Support\Carbon;
use Model;

/**
 * Model
 */
class Winner extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mberizzo_acsitewinners_winners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha',
        'cuota',
        'producto',
        'nombre',
        'provincia',
        'valor',
        'nrosorteo',
        'monto_entregado',
        'proximo_sorteo',
        'categoria',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = title_case($value);
    }

    public function setProvinciaAttribute($value)
    {
        $this->attributes['provincia'] = title_case($value);
    }

    public function getYearList()
    {
        return $this->selectRaw('DATE_FORMAT(fecha, "%Y") as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();
    }
}
